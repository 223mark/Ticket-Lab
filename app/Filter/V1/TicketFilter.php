<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class TicketFilter extends ApiFilter
{
    protected $safeParams = [
        'fromWhere' => ['eq'],
        'toWhere' => ['eq'],
        'date' => ['eq'],
        'ticketClass' => ['eq'],
        'seatNumber' => ['eq'],
        'id' => ['eq']

    ];

    protected $columnMap = [
        'fromWhere' => 'from_where',
        'toWhere' => 'to_where',
        'ticketClass' => 'class',
        'seatNumber' => 'seat_number'

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
