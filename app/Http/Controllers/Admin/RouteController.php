<?php

namespace App\Http\Controllers\Admin;

use App\Models\Routes;
use App\Models\Location;
use App\Models\Operator;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    //busroutes index
    public function index()
    {

        return view('busRoutes.index', [
            'busRoutes' => Routes::latest()->filter(request(['searchText']))->paginate('6'),
            'locations' => Location::get(),
            'operators' => Operator::get(),
            'searchText' => request('searchText')
        ]);
    }

    //create new busroute
    public function store(Request $request)
    {

        if ($request->toWhere !== $request->fromWhere) {

            $this->validationCheck($request);
            $data = $this->requestedData($request);
            Routes::create($data);

            //reverse
            if ($request->has('reverse')) {
                $reverseData = $this->createReverseRoute($request);
                Routes::create($reverseData);
            }

            return redirect()->route('busRoutes#index')->with('addMessage', 'Routes Created Successfully');
        } else {
            return redirect()->route('busRoutes#index')->with('unvalidMessage', 'from where and to where must not be same');
        }
    }

    //busroutes edit
    public function edit(Routes $route)
    {
        $location = Location::get();

        return view('busRoutes.edit', compact('route', 'location'));
    }

    //busroutes update
    public function update(Request $request, Routes $route)
    {
        // $this->validationCheck($request);
        $request->validate([

            'departureTime' => 'required',
            'arriveTime' => 'required',
        ]);

        $data = [
            'departure_time' => $request->departureTime,
            'arrive_time' => $request->arriveTime,
        ];
        $route->update($data);

        return redirect()->route('busRoutes#index')->with('updateMessage', 'Route Update Successfully');
    }


    //busroutes destory
    public function destory(Routes $route)
    {
        $route->delete();
        return redirect()->route('busRoutes#index')->with('deleteMessage', 'Route Deleted Successfully');
    }


    //PRIVATE FUNCTIONS

    private function validationCheck($request)
    {
        $request->validate([
            'toWhere' => 'required',
            'fromWhere' => 'required',
            'departureTime' => 'required',
            'arriveTime' => 'required',
        ]);
    }
    private function requestedData($request)
    {

        return ([
            'to_where' => $request->toWhere,
            'from_where' => $request->fromWhere,
            'departure_time' => $request->departureTime,
            'arrive_time' => $request->arriveTime,

        ]);
    }

    //create reverse route
    private function createReverseRoute($request)
    {
        return  [
            'from_where' => $request->toWhere,
            'to_where' => $request->fromWhere,
            'departure_time' => $request->departureTime,
            'arrive_time' => $request->arriveTime,

        ];
    }
}
