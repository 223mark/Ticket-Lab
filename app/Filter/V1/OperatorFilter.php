<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class OperatorFilter extends ApiFilter
{
    protected $safeParams = [
        'email' => ['eq'],
        'operatorName' => ['eq'],

    ];

    protected $columnMap = [
        'operatorName' => 'operator_name'

    ];

    protected $operatorMap = [
        'eq' => '=',
        'or' => '||',
        'and' => '&'
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];
        //$operators?
        foreach ($this->safeParams as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;
            //filter operator
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
