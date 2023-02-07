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
        $this->validationCheck($request);
        $data = $this->requestedData($request);

        Routes::create($data);
        return redirect()->route('busRoutes#index');
    }

    public function edit(Routes $route)
    {
        $location = Location::get();

        return view('busRoutes.edit', compact('route', 'location'));
    }


    public function update(Request $request, Routes $route)
    {

        $data = $this->requestedData($request);

        $route->update($data);

        return back();
    }

    public function destory(Routes $route)
    {
        $route->delete();
        return back();
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
            'price' => 'required',
            'departureTime' => 'required',
            'class' => 'required'
        ]);
    }
    private function requestedData($request)
    {

        return ([
            'to_where' => $request->toWhere,
            'from_where' => $request->fromWhere,
            //'operator_id' => $request->operatorId,
            'price' => $request->price . 'Ks',
            'departure_time' => $request->departureTime,
            'arrive_time' => $request->arriveTime,
            'class' => $request->class,

        ]);
    }
}
