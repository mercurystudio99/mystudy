<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\SubLevel;
use Illuminate\Http\Request;

class SubLevelController extends Controller
{
    public function index()
    {
        removeContentLocale();

        //$this->authorize('admin_categories_list'); //is ko baad mei dekhuga

        $sub_levels = SubLevel::orderBy('id', 'desc')
            ->paginate(10);
        $data = [
            'pageTitle' => trans('admin/pages/levels.levels_list_page_title'),
            'sub_levels' => $sub_levels
        ];

        return view('admin.sub-levels.lists', $data);
    }
    public function create()
    {
        $levels = Level::all();
        // $this->authorize('admin_categories_create');


        $data = [
            'pageTitle' => trans('admin/main.level_new_page_title'),
            'levels' => $levels,
        ];

        return view('admin.sub-levels.create', $data);
    }
    public function store(Request $request)
    {
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
            'level_id' => 'required'
        ]);

        $data = $request->all();

        $level = SubLevel::create([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'status' => $data['status'],
            'level_id' => $data['level_id'],
        ]);

        cache()->forget(SubLevel::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/sublevels');
    }
    public function edit(Request $request, $id)
    {
        $levels = Level::all();
        // $this->authorize('admin_categories_edit');

        // $category = Category::findOrFail($id);
        $sub_level = SubLevel::where('id',$id)->first();
        // $subCategories = Category::where('parent_id', $category->id)
        //     ->orderBy('order', 'asc')
        //     ->get();

        $locale = $request->get('locale', app()->getLocale());
        storeContentLocale($locale, $sub_level->getTable(), $sub_level->id);

        $data = [
            'pageTitle' => trans('admin/main.level_new_page_title'),
            'sub_level' => $sub_level,
            'levels' => $levels
        ];

        return view('admin.sub-levels.create', $data);
    }
    public function update(Request $request, $id)
    {
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'status' => 'required',
            'level_id' => 'required'
        ]);

        $data = $request->all();

        $level = SubLevel::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'status' => $data['status'],
            'level_id' => $data['level_id'],
        ]);

        cache()->forget(SubLevel::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/sublevels');
    }
    public function destroy(Request $request, $id)
    {
        // $this->authorize('admin_categories_delete');

        $level = SubLevel::findOrFail($id);
        $level->delete();
        // $parent = !empty($category->parent_id) ? $category->parent_id : null;

        // if (!empty($category)) {
        //     Category::where('parent_id', $category->id)
        //         ->delete();

        //     $category->delete();
        // }

        cache()->forget(SubLevel::$cacheKey);

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => 'Sublevel successfully deleted',
            'status' => 'success'
        ];

        return !empty($parent) ? back()->with(['toast' => $toastData]) : redirect(getAdminPanelUrl() . '/sublevels')->with(['toast' => $toastData]);
    }
}
