<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller
{
    // location index
    public function index()
    {
        return view('locations.index', [
            'locations' => Location::latest()->filter(request(['searchText']))->paginate('6'),
            'searchText' => request('searchText')
        ]);
    }

    //creating location
    public  function store(Request $request)
    {
        $this->validationCheck($request);
        $data = $this->requestData($request);
        Location::create($data);
        return redirect()->route('locations#index')->with('addMessage', 'Location Added Successfully.');
    }

    //deleting location
    public function destory(Location $location)
    {
        $location->delete();
        return redirect()->route('locations#index')->with('deleteMessage', 'Location Deleted Successfully.');
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
