<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //get all location
    public function getAllLocation()
    {
        return response()->json([
            'locations' => Location::get()
        ]);
    }
}
