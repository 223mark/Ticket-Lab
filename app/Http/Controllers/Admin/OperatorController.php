<?php

namespace App\Http\Controllers\Admin;

use App\Models\Operator;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use App\Models\TicketcodeList;
use Illuminate\Support\Facades\File;


class OperatorController extends Controller
{

    public function index()
    {
        return view('operators.index', [
            'data' => Operator::paginate('6'),
        ]);
    }


    public function store(Request $request)
    {
        $this->validationCheck($request);

        if ($request->hasFile('img')) {

            $data = $this->requestDataWithImage($request);
            Operator::create($data);
            return redirect()->route('operators#index');
        }

        $data = $this->requestDataWithoutImage($request);
        Operator::create($data);
        return redirect()->route('operators#index');
    }

    public function edit(Operator $operator)
    {
        return view('operators.edit', [
            'data' => $operator,
        ]);
    }

    public function update(Operator $operator, Request $request)
    {
        $this->validationCheck($request);

        if ($request->img != null) {
            //delet img from local
            $dbImg = $operator->img;
            File::delete(public_path() . '/img/OperatorImage/' . $dbImg);

            $updateData = $this->requestDataWithImage($request);
            $operator->update($updateData);
            return redirect()->route('operators#index');
        }
        $updateData = $this->requestDataWithoutImage($request);
        $operator->update($updateData);
        return redirect()->route('operators#index');
    }

    public function destory(Operator $operator)
    {
        $dbImg = $operator->img;
        if ($dbImg != null) {

            File::delete(public_path() . '/img/OperatorImage/' . $dbImg);
            $operator->delete();
            return redirect()->route('operators#index', [
                'success' => 'deleted successfully'
            ]);
        }
        $operator->delete();
        return redirect()->route('operators#index', [
            'success' => 'deleted successfully'
        ]);
    }

    //about ticket
    public function ticketCode($id)
    {

        $data = TicketcodeList::select('operators.*', 'ticketcode_lists.*')
            ->leftJoin('operators', 'ticketcode_lists.operator_id', 'operators.id')
            ->where('operator_id', $id)
            ->paginate('6');
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
