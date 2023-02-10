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
    //
    public function index()
    {

        return view('busRoutes.index', [
            'busRoutes' => Routes::latest()->paginate('6'),
            'locations' => Location::get(),
            'operators' => Operator::get(),
        ]);
    }

    public function store(Request $request)
    {

        if ($request->toWhere != $request->fromWhere) {

            $this->validationCheck($request);
            $data = $this->requestedData($request);
            Routes::create($data);

            //reverse
            if ($request->has('reverse')) {
                $reverseData = $this->createReverseRoute($request);
                Routes::create($reverseData);
            }

            return redirect()->route('busRoutes#index');
        } else {
            return redirect()->route('busRoutes#index')->with('message', 'From Where and To Where must not be same');
        }
    }

    public function edit(Routes $route)
    {
        $location = Location::get();

        return view('busRoutes.edit', compact('route', 'location'));
    }


    public function update(Request $request, Routes $route)
    {
        $this->validationCheck($request);
        $data = $this->requestedData($request);

        $route->update($data);

        return redirect()->route('busRoutes#index');
    }

    public function destory(Routes $route)
    {
        $route->delete();
        return redirect()->route('busRoutes#index');
    }

    public function filter(Request $request)
    {

        // $filterData = Routes::when(request('searchItem'), function ($query) {
        //     $query->where('from_where', 'like', '%' . request('searchItem') . '%')
        //         ->orWhere('to_where', 'like', '%' . request('searchItem') . '%');
        // })
        //     ->orderBy('id', 'desc')->paginate(5);
        // $filterData->appends(request()->all());
        // dd($filterData->toArray());
    }


    //PRIVATE FUNCTIONS

    private function validationCheck($request)
    {
        $request->validate([
            'toWhere' => 'required',
            'fromWhere' => 'required',
            'departureTime' => 'required',
            'arriveTime' => 'required',
            'class' => 'required',
        ]);
    }
    private function requestedData($request)
    {

        return ([
            'to_where' => $request->toWhere,
            'from_where' => $request->fromWhere,
            'departure_time' => $request->departureTime,
            'arrive_time' => $request->arriveTime,
            'class' => $request->class,

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
            'class' => $request->class,
        ];
    }
}
