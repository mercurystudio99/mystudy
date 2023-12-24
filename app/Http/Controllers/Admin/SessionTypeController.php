<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SessionType;
use Illuminate\Http\Request;

class SessionTypeController extends Controller
{
    public function index()
    {
        removeContentLocale();

        //$this->authorize('admin_categories_list'); //is ko baad mei dekhuga

        $records = SessionType::orderBy('id', 'desc')
            ->paginate(10);
        $data = [
            'pageTitle' => 'SessionTypes',
            'records' => $records
        ];

        return view('admin.sessions-type.lists', $data);
    }
    public function create()
    {
        // $this->authorize('admin_categories_create');


        $data = [
            'pageTitle' => trans('admin/main.session_types_new_page_title'),
        ];

        return view('admin.sessions-type.create', $data);
    }
    
    public function store(Request $request)
    {
        $file = $request->file('image');
        if ($file) {
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
        }
        else{
            $fileName = null;
        }
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'description' => 'required|min:3|max:128',
            'status' => 'required'
        ]);

        $data = $request->all();

        $record = SessionType::create([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
            'image' => $fileName,
        ]);

        cache()->forget(SessionType::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/session-types');
    }

    public function edit(Request $request, $id)
    {
        // $this->authorize('admin_categories_edit');

        // $category = Category::findOrFail($id);
        $record = SessionType::where('id',$id)->first();
        // $subCategories = Category::where('parent_id', $category->id)
        //     ->orderBy('order', 'asc')
        //     ->get();

        $locale = $request->get('locale', app()->getLocale());
        storeContentLocale($locale, $record->getTable(), $record->id);

        $data = [
            'pageTitle' => 'SessionTypes',
            'sessiontype' => $record
        ];

        return view('admin.sessions-type.create', $data);
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'description' => 'required|min:3|max:128',
            'status' => 'required'
        ]);
        $data = $request->all();
        if($request->file('image')){
            $file = $request->file('image');
            if ($file) {
                $fileName   = time() . '.' . $file->getClientOriginalExtension();
                $file->move('images', $fileName);
            }
            else{
                $fileName = null;
            }
        $record = SessionType::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
            'image' => $fileName,
        ]);
        }
        else{
        $record = SessionType::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        }
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'title' => 'required|min:3|max:128'
        ]);

        

        cache()->forget(SessionType::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/session-types');
    }
    public function destroy(Request $request, $id)
    {
        // $this->authorize('admin_categories_delete');

        $record = SessionType::findOrFail($id);
        $record->delete();
        // $parent = !empty($category->parent_id) ? $category->parent_id : null;

        // if (!empty($category)) {
        //     Category::where('parent_id', $category->id)
        //         ->delete();

        //     $category->delete();
        // }

        cache()->forget(SessionType::$cacheKey);

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('update.session_type_successfully_deleted'),
            'status' => 'success'
        ];

        return !empty($parent) ? back()->with(['toast' => $toastData]) : redirect(getAdminPanelUrl() . '/session-types')->with(['toast' => $toastData]);
    }
}
