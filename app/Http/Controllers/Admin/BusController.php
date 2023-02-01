<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bus;
use App\Models\Operator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{
    //
    public function index()
    {
        $busData = Bus::select('buses.*', 'operators.operator_name', 'operators.img as operator_image', 'operators.phone')
            ->leftJoin('operators', 'buses.operator_id', 'operators.id')
            ->get();
        return view('bus.index', [
            'operators' => Operator::all(),
            'data' => $busData
        ]);
    }

    public function store(Request $request)
    {
        $this->validationCheck($request);
        if ($request->hasFile('img')) {
            $data = $this->requestDataWithImage($request);
            Bus::create($data);
            return redirect()->route('buses#index');
        }
        $data = $this->requestDataWithoutImage($request);
        Bus::create($data);
        return redirect()->route('buses#index');
    }

    public function edit(Bus $bus)
    {
        return view('bus.edit', [
            'operators' => Operator::all(),
            'data' => $bus
        ]);
    }

    public function update(Request $request, Bus $bus)
    {
        $this->validationCheck($request);

        if ($request->bus_img != null) {
            //delet img from local
            $dbImg = $bus->bus_img;
            Storage::delete(public_path() . '/img/OperatorImage/' . $dbImg);

            $updateData = $this->requestDataWithImage($request);
            $bus->update($updateData);
            return redirect()->route('buses#index');
        }
        $updateData = $this->requestDataWithoutImage($request);
        $bus->update($updateData);
        return redirect()->route('buses#index');
    }

    private function validationCheck($request)
    {
        $request->validate([
            'operatorId' => 'required',
            'busNumber' => 'required',
            'status' => 'required',
            'driverName' => 'required',
            'totalSeat' => 'required'
            // 'img' => 'required'
        ]);
    }
    private function requestDataWithImage($request)
    {

        $file = $request->img;
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move(public_path() . '/img/BusImage/', $fileName);
        return
            [
                'operator_id' => $request->operatorId,
                'bus_number' => $request->busNumber,
                'status' => $request->status,
                'driver_name' => $request->driverName,
                'total_seats' => $request->totalSeat,
                'bus_img' => $fileName
            ];
    }

    public function requestDataWithoutImage($request)
    {
        return
            [
                'operator_id' => $request->operatorId,
                'bus_number' => $request->busNumber,
                'status' => $request->status,
                'driver_name' => $request->driverName,
                'total_seats' => $request->totalSeat,
            ];
    }
}
