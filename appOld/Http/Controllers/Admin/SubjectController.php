<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubLevel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        removeContentLocale();

        //$this->authorize('admin_categories_list'); //is ko baad mei dekhuga

        $subjects = Subject::orderBy('id', 'desc')
            ->paginate(10);
        $data = [
            'pageTitle' => trans('admin/pages/levels.levels_list_page_title'),
            'subjects' => $subjects
        ];

        return view('admin.subjects.lists', $data);
    }
    public function create()
    {
        $sub_levels = SubLevel::all();
        // $this->authorize('admin_categories_create');


        $data = [
            'pageTitle' => trans('admin/main.level_new_page_title'),
            'sub_levels' => $sub_levels,
        ];

        return view('admin.subjects.create', $data);
    }
    public function store(Request $request)
    {
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
            'sublevel_id' => 'required'
        ]);

        $data = $request->all();

        $subject = Subject::create([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'status' => $data['status'],
            'sublevel_id' => $data['sublevel_id'],
        ]);

        cache()->forget(Subject::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/subjects');
    }
    public function edit(Request $request, $id)
    {
        $sub_levels = SubLevel::all();
        // $this->authorize('admin_categories_edit');

        // $category = Category::findOrFail($id);
        $subject = Subject::where('id',$id)->first();
        // $subCategories = Category::where('parent_id', $category->id)
        //     ->orderBy('order', 'asc')
        //     ->get();

        $locale = $request->get('locale', app()->getLocale());
        storeContentLocale($locale, $subject->getTable(), $subject->id);

        $data = [
            'pageTitle' => trans('admin/main.level_new_page_title'),
            'subject' => $subject,
            'sub_levels' => $sub_levels
        ];

        return view('admin.subjects.create', $data);
    }
    public function update(Request $request, $id)
    {
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
            'sublevel_id' => 'required'
        ]);

        $data = $request->all();

        $level = Subject::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'status' => $data['status'],
            'sublevel_id' => $data['sublevel_id'],
        ]);

        cache()->forget(Subject::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/subjects');
    }
    public function destroy(Request $request, $id)
    {
        // $this->authorize('admin_categories_delete');

        $level = Subject::findOrFail($id);
        $level->delete();
        // $parent = !empty($category->parent_id) ? $category->parent_id : null;

        // if (!empty($category)) {
        //     Category::where('parent_id', $category->id)
        //         ->delete();

        //     $category->delete();
        // }

        cache()->forget(Subject::$cacheKey);

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => 'Subject successfully deleted',
            'status' => 'success'
        ];

        return !empty($parent) ? back()->with(['toast' => $toastData]) : redirect(getAdminPanelUrl() . '/subjects')->with(['toast' => $toastData]);
    }
}
