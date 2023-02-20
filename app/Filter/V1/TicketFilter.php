<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class TicketFilter extends ApiFilter
{
    protected $allowedParams = [
        'fromWhere' => ['eq'],
        'toWhere' => ['eq'],
        'date' => ['eq'],
        'ticketClass' => ['eq'],
        'operatorName' => ['eq'],
        'ticketCode' => ['eq'],
        'ticketId' => ['eq']

    ];

    protected $columnMap = [
        'fromWhere' => 'from_where',
        'toWhere' => 'to_where',
        'ticketClass' => 'class',
        'operatorName' => 'operator_name',
        'ticketCode' => 'ticket_code',
        'ticketId' => 'ticket_id'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'or' => '||',
        'and' => '&'
    ];
}
