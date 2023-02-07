<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller
{
    //
    public function index()
    {

        return view('locations.index', [
            'locations' => Location::latest()->paginate('6'),
        ]);
    }

    //creating location
    public  function store(Request $request)
    {
        $this->validationCheck($request);
        $data = $this->requestData($request);
        Location::create($data);
        return redirect()->route('locations#index');
    }

    public function destory(Location $location)
    {
        $location->delete();
        return back();
    }

    public function filter(Request $request)
    {

        $filterData = Location::when(request('searchText'), function ($query) {
            $query->where('location', 'like', '%' . request('searchText') . '%');
        })
            ->paginate('6');
        $filterData->appends($request->all());
        Session::put('searchText', $request->searchText);
        return view('locations.index')->with([
            'locations' => $filterData,
        ]);
    }

    //PRIVATE FUNCTION
    private function validationCheck($request)
    {
        $request->validate([
            'location' => 'required|unique:locations,location',
        ]);
    }
    private function requestData($request)
    {

        return
            [
                'location' => $request->location,

            ];
    }
}
