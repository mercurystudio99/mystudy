<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Translation\CategoryTranslation;
class LocationController extends Controller
{
    public function index()
    {
        removeContentLocale();

        //$this->authorize('admin_categories_list'); //is ko baad mei dekhuga

        $locations = Location::orderBy('id', 'desc')
            ->paginate(10);
        $data = [
            'pageTitle' => trans('admin/pages/locations.locations_list_page_title'),
            'locations' => $locations
        ];

        return view('admin.locations.lists', $data);
    }

    public function create()
    {
        // $this->authorize('admin_categories_create');


        $data = [
            'pageTitle' => trans('admin/main.location_new_page_title'),
        ];

        return view('admin.locations.create', $data);
    }

    public function store(Request $request)
    {
        $this->authorize('admin_categories_create');

        $this->validate($request, [
            'country' => 'required|min:3|max:128',
            'district' => 'required|min:3|max:128',
            'locality' => 'required|min:3|max:128',
            'sub_locality' => 'required|min:3|max:128',
            'pin_code' => 'required|min:3|max:128',
            'longitude' => 'required|min:3|max:128',
            'latitude' => 'required|min:3|max:128'
        ]);

        $data = $request->all();

        $location = Location::create([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'country' => $data['country'],
            'district' => $data['district'],
            'locality' => $data['locality'],
            'sub_locality' => $data['sub_locality'],
            'pin_code' => $data['pin_code'],
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude'],
        ]);

        cache()->forget(Location::$cacheKey);

        removeContentLocale();

        return redirect(getAdminPanelUrl() . '/locations');
    }

    public function edit(Request $request, $id)
    {
        // $this->authorize('admin_categories_edit');

        // $category = Category::findOrFail($id);
        $location = Location::where('id',$id)->first();
        // $subCategories = Category::where('parent_id', $category->id)
        //     ->orderBy('order', 'asc')
        //     ->get();

        $locale = $request->get('locale', app()->getLocale());
        storeContentLocale($locale, $location->getTable(), $location->id);

        $data = [
            'pageTitle' => trans('admin/main.location_new_page_title'),
            'location' => $location
        ];

        return view('admin.locations.create', $data);
    }

    public function update(Request $request, $id)
    {
        // $this->authorize('admin_categories_edit');

        // $category = Category::findOrFail($id);

        // $this->validate($request, [
        //     'title' => 'required|min:3|max:255',
        //     'slug' => 'nullable|max:255|unique:categories,slug,' . $category->id,
        //     'icon' => 'required',
        // ]);

        $data = $request->all();

        // $category->update([
        //     'icon' => $data['icon'],
        //     'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
        //     'order' => $data['order'] ?? $category->order,
        // ]);
        $location = Location::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'country' => $data['country'],
            'district' => $data['district'],
            'locality' => $data['locality'],
            'sub_locality' => $data['sub_locality'],
            'pin_code' => $data['pin_code'],
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude'],
        ]);

        cache()->forget(Location::$cacheKey);

        removeContentLocale();

        // CategoryTranslation::updateOrCreate([
        //     'category_id' => $category->id,
        //     'locale' => mb_strtolower($data['locale']),
        // ], [
        //     'title' => $data['title'],
        // ]);

        // $hasSubCategories = (!empty($request->get('has_sub')) and $request->get('has_sub') == 'on');
        // $this->setSubCategory($category, $request->get('sub_categories'), $hasSubCategories, $data['locale']);


        return redirect(getAdminPanelUrl() . '/locations');
    }

    public function destroy(Request $request, $id)
    {
        // $this->authorize('admin_categories_delete');

        $location = Location::findOrFail($id);
        $location->delete();
        // $parent = !empty($category->parent_id) ? $category->parent_id : null;

        // if (!empty($category)) {
        //     Category::where('parent_id', $category->id)
        //         ->delete();

        //     $category->delete();
        // }

        cache()->forget(Location::$cacheKey);

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('update.location_successfully_deleted'),
            'status' => 'success'
        ];

        return !empty($parent) ? back()->with(['toast' => $toastData]) : redirect(getAdminPanelUrl() . '/locations')->with(['toast' => $toastData]);
    }

    public function search(Request $request)
    {
        $term = $request->get('term');

        $option = $request->get('option', null);

        $query = Category::select('id')
            ->whereTranslationLike('title', "%$term%");

        /*if (!empty($option)) {

        }*/

        $categories = $query->get();

        return response()->json($categories, 200);
    }

    public function setSubCategory(Category $category, $subCategories, $hasSubCategories, $locale)
    {
        $order = 1;
        $oldIds = [];

        if ($hasSubCategories and !empty($subCategories) and count($subCategories)) {
            foreach ($subCategories as $key => $subCategory) {
                $check = Category::where('id', $key)->first();

                if (is_numeric($key)) {
                    $oldIds[] = $key;
                }

                if (!empty($subCategory['title'])) {
                    $checkSlug = 0;
                    if (!empty($subCategory['slug'])) {
                        $checkSlug = Category::query()->where('slug', $subCategory['slug'])->count();
                    }

                    $slug = (!empty($subCategory['slug']) and ($checkSlug == 0 or ($checkSlug == 1 and $check->slug == $subCategory['slug']))) ? $subCategory['slug'] : Category::makeSlug($subCategory['title']);

                    if (!empty($check)) {
                        $check->update([
                            'order' => $order,
                            'icon' => $subCategory['icon'] ?? null,
                            'slug' => $slug,
                        ]);

                        CategoryTranslation::updateOrCreate([
                            'category_id' => $check->id,
                            'locale' => mb_strtolower($locale),
                        ], [
                            'title' => $subCategory['title'],
                        ]);
                    } else {

                        $new = Category::create([
                            'parent_id' => $category->id,
                            'slug' => $slug,
                            'icon' => $subCategory['icon'] ?? null,
                            'order' => $order,
                        ]);

                        CategoryTranslation::updateOrCreate([
                            'category_id' => $new->id,
                            'locale' => mb_strtolower($locale),
                        ], [
                            'title' => $subCategory['title'],
                        ]);

                        $oldIds[] = $new->id;
                    }

                    $order += 1;
                }
            }
        }

        Category::where('parent_id', $category->id)
            ->whereNotIn('id', $oldIds)
            ->delete();

        return true;
    }
}
