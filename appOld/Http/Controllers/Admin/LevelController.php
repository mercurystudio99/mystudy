<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        removeContentLocale();

        //$this->authorize('admin_categories_list'); //is ko baad mei dekhuga

        $levels = Level::orderBy('id', 'desc')
            ->paginate(10);
        $data = [
            'pageTitle' => trans('admin/pages/levels.levels_list_page_title'),
            'levels' => $levels
        ];

        return view('admin.levels.lists', $data);
    }
    public function create()
    {
        // $this->authorize('admin_categories_create');


        $data = [
            'pageTitle' => trans('admin/main.level_new_page_title'),
        ];

        return view('admin.levels.create', $data);
    }
    public function store(Request $request)
    {
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'status' => 'required'
        ]);

        $data = $request->all();

        $level = Level::create([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'status' => $data['status'],
        ]);

        cache()->forget(Level::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/levels');
    }
    public function edit(Request $request, $id)
    {
        // $this->authorize('admin_categories_edit');

        // $category = Category::findOrFail($id);
        $level = Level::where('id',$id)->first();
        // $subCategories = Category::where('parent_id', $category->id)
        //     ->orderBy('order', 'asc')
        //     ->get();

        $locale = $request->get('locale', app()->getLocale());
        storeContentLocale($locale, $level->getTable(), $level->id);

        $data = [
            'pageTitle' => trans('admin/main.level_new_page_title'),
            'level' => $level
        ];

        return view('admin.levels.create', $data);
    }
    public function update(Request $request, $id)
    {
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'status' => 'required'
        ]);

        $data = $request->all();

        $level = Level::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'status' => $data['status'],
        ]);

        cache()->forget(Level::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/levels');
    }
    public function destroy(Request $request, $id)
    {
        // $this->authorize('admin_categories_delete');

        $level = Level::findOrFail($id);
        $level->delete();
        // $parent = !empty($category->parent_id) ? $category->parent_id : null;

        // if (!empty($category)) {
        //     Category::where('parent_id', $category->id)
        //         ->delete();

        //     $category->delete();
        // }

        cache()->forget(Level::$cacheKey);

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => 'Level successfully deleted',
            'status' => 'success'
        ];

        return !empty($parent) ? back()->with(['toast' => $toastData]) : redirect(getAdminPanelUrl() . '/locations')->with(['toast' => $toastData]);
    }
}
