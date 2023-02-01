<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function index()
    {

        return view('locations.index', [
            'data' => Location::get()
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
