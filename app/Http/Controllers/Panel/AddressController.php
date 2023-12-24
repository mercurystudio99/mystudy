<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Location;

class AddressController extends Controller
{
    public function index() {
        $user = auth()->user();
        if ($user->isUser()) {
            abort(404);
        }

        $query = Address::where(function ($query) use ($user) {
            $query->where('addresses.user_id', $user->id);
        })->get();

        $data = [
            'pageTitle' => 'Addresses',
            'records' => $query,
        ];

        return view('web.default.panel.addresses.index', $data);
    }
    public function create()
    {
        $locations = Location::all();
        // $countries = Location::select('country')->distinct()->pluck('country');
        $countries = Location::select('country')->distinct()->get();

        $addresses = Address::all();
        // $this->authorize('admin_categories_create');


        $data = [
            'pageTitle' => 'New Address',
            'addresses' => $addresses,
            'locations' => $locations,
            'countries' => $countries,
        ];

        return view('web.default.panel.addresses.create', $data);
    }
    public function store(Request $request)
    {
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'address1' => 'required|min:3|max:128',
            'country_id' => 'required',
            'district_id' => 'required',
            'locality_id' => 'required',
            'status' => 'required'
        ]);
        $location_id = Location::where('locality',$request->locality_id)->value('id');
        $data = $request->all();
        $user = auth()->user()->id;
        $record = Address::create([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'address1' => $data['address1'],
            'user_id' => $user,
            'location_id' => $location_id,
            'status' => $data['status']
        ]);

        cache()->forget(Address::$cacheKey);

        removeContentLocale();

        return response()->json([
            'code' => 200,
        ]);
    }
    public function edit(Request $request, $id){
        $record = Address::where('id',$id)->first();
        // $countries = Location::select('id', 'country')->groupBy('country', 'id')->get();
        $countries = Location::select('country')->distinct()->get();
        $locations = Location::all();
        $data = [
            'pageTitle' => 'Address',
            'locations' => $locations,
            'record' => $record,
            'countries' => $countries,
        ];
        return view('web.default.panel.addresses.create', $data);
    }
    public function update(Request $request, $id)
    {
      
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'address1' => 'required|min:3|max:128',
            'country_id' => 'required',
            'district_id' => 'required',
            'locality_id' => 'required',
            'status' => 'required'
        ]);
        $location_id = Location::where('locality',$request->locality_id)->value('id');
        $data = $request->all();
        $user = auth()->user()->id;
        $record = Address::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'address1' => $data['address1'],
            'user_id' => $user,
            'location_id' => $location_id,
            'status' => $data['status']
        ]);

        cache()->forget(Address::$cacheKey);

        removeContentLocale();

        return response()->json([
            'code' => 200,
        ]);
    }
    public function destroy(Request $request, $id)
    {
        // $this->authorize('admin_categories_delete');

        $record = Address::findOrFail($id);
        $record->delete();

        return response()->json([
            'code' => 200,
        ]);
    }
    public function getDistrict(Request $request){
        $districts = Location::select('district')
        ->where('country', $request->country_id) // Assuming 'country_id' is the foreign key linking districts to countries
        ->distinct()->get();
        return $districts;
        return response()->json(['message' => 'Record fetched successfully', 'districts' => $districts]);

    }

    public function getLocality(Request $request){
        $locality = Location::select('locality')
        ->where('district', $request->district_id) // Assuming 'country_id' is the foreign key linking districts to countries
        ->distinct()->get();
        return $locality;
        return response()->json(['message' => 'Record fetched successfully', 'locality' => $locality]);

    }

    public function getSubLocality(Request $request){
        $sublocality = Location::select('id', 'sub_locality')
        ->where('id', $request->locality_id) // Assuming 'country_id' is the foreign key linking districts to countries
        ->groupBy('sub_locality', 'id')
        ->get();
        return $sublocality;
        return response()->json(['message' => 'Record fetched successfully', 'sublocality' => $sublocality]);

    }
}
