<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Operator;
use Illuminate\Http\Request;
use App\Filter\V1\OperatorFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OperatorResource;
use App\Http\Resources\V1\OperatorCollection;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $filter = new OperatorFilter();
        $queryItems = $filter->transform($request);

        //checking url qurey and data return
        if (count($queryItems) == 0) {
            return new OperatorCollection(Operator::paginate('5'));
        } else {
            //for pagination
            $operator = Operator::where($queryItems)->paginate('5');
            return new OperatorCollection($operator->appends($request->query()));
        }

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        //  return $operator;
        return new OperatorResource($operator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
