<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class OperatorFilter extends ApiFilter
{
    protected $allowedParams = [
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
}
