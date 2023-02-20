<?php

namespace App\Http\Controllers\Admin;

use App\Models\Operator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusTicket;
use App\Models\Routes;
use App\Models\TicketcodeList;
use Illuminate\Support\Facades\File;


class OperatorController extends Controller
{
    //operator index
    public function index()
    {
        return view('operators.index', [
            'operators' => Operator::latest()->filter(request(['searchText']))->paginate('5'),
            'searchText' => request('searchText')
        ]);
    }

    //store new operator
    public function store(Request $request)
    {
        $this->validationCheck($request);


        if ($request->hasFile('img')) {

            $data = $this->requestDataWithImage($request);
            Operator::create($data);
            return redirect()->route('operators#index')->with('addMessage', 'Operator Added Successfully');
        }

        $data = $this->requestDataWithoutImage($request);
        Operator::create($data);
        return redirect()->route('operators#index')->with('addMessage', 'Operator Added Successfully');
    }

    //editpage operator
    public function edit(Operator $operator)
    {
        return view('operators.edit', compact('operator'));
    }

    //update operator
    public function update(Operator $operator, Request $request)
    {

        $this->validationCheck($request);

        if ($request->img != null) {
            //delet img from local
            $dbImg = $operator->img;
            File::delete(public_path() . '/img/OperatorImage/' . $dbImg);

            $updateData = $this->requestDataWithImage($request);
            $operator->update($updateData);
            return redirect()->route('operators#index')->with('updateMessage', 'Operator Updated Successfully');
        }
        $updateData = $this->requestDataWithoutImage($request);
        $operator->update($updateData);
        return redirect()->route('operators#index')->with('updateMessage', 'Operator Updated Successfully');
    }

    //destory operator
    public function destory(Operator $operator)
    {
        //delete img form local
        $dbImg = $operator->img;
        if ($dbImg != null) {

            File::delete(public_path() . '/img/OperatorImage/' . $dbImg);
            $operator->delete();
            return redirect()->route('operators#index')->with('deleteMessage', 'Operators Deleted Successfully');
        }

        $operator->delete();
        return redirect()->route('operators#index')->with('deleteMessage', 'Operators Deleted Successfully');
    }

    //deatil of operator
    public function deatil(Operator $operator)
    {

        return view('operators.detail', compact('operator'));
    }


    //related ticket page
    public function ticketCode($id)
    {

        $data = BusTicket::select('bus_tickets.*', 'operators.id as operatorId', 'operators.operator_name as operatorName', 'operators.img as operator_img', 'routes.from_where as from', 'routes.to_where as to')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->leftJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->groupBy('ticket_code')
            ->having('bus_tickets.operator_id', $id)
            ->latest()
            ->paginate('5');

        return view('operators.tickets.ticketCodeTable', [
            'ticketCode' => $data
        ]);
    }

    //PRIVATE FUNCTIONS
    private function validationCheck($request)
    {
        $validation = $request->validate([
            'operatorName' => 'required',
            'phoneOne' => 'required',
            'phoneTwo' => 'required',
            'description' => 'required',
            'email' => 'required',
        ]);
    }

    private function requestDataWithoutImage($request)
    {
        return
            [
                'operator_name' => $request->operatorName,
                'phone1' => $request->phoneOne,
                'phone2' => $request->phoneTwo,
                'email' => $request->email,
                'description' => $request->description,
            ];
    }
    private function requestDataWithImage($request)
    {

        $file = $request->img;
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move(public_path() . '/img/OperatorImage/', $fileName);
        return
            [
                'operator_name' => $request->operatorName,
                'phone1' => $request->phoneOne,
                'phone2' => $request->phoneTwo,
                'description' => $request->description,
                'email' => $request->email,
                'img' => $fileName
            ];
    }
}
