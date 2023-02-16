<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class GroupByTicketFilter extends ApiFilter
{
    protected $safeParams = [
        'fromWhere' => ['eq'],
        'toWhere' => ['eq'],
        'date' => ['eq'],
        'ticketClass' => ['eq'],
        'operatorName' => ['eq'],
        'operatorId' => ['eq'],
        'departureTime' => ['eq'],
    ];

    protected $columnMap = [
        'fromWhere' => 'from_where',
        'toWhere' => 'to_where',
        'ticketClass' => 'class',
        'operatorName' => 'operator_name',
        'operatorId' => 'operator_id',
        'departureTime' => 'departure_time'

    ];

    protected $operatorMap = [
        'eq' => '=',
        'or' => '||',
        'and' => '&'
    ];
}
