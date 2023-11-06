<?php

namespace App\Filters\V1;

use Illuminate\Http\Request; // we need access to the request
use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter {
  // The first rule to handling user input is: DON'T TRUST USER INPUT
  protected $safeParams = [
    'customerId' => ['eq'],
    'amount' => ['eq', 'gt', 'lt'],
    'status' => ['eq', 'ne'],
    'billedDate' => ['eq', 'gt', 'lt'],
    'paidDate' => ['eq', 'gt', 'lt'],
  ];

  protected $columnMap = [
    'customerId' => 'customer_id',
    'billedDate' => 'billed_date',
    'paidDate' => 'paid_date',
  ];

  protected $operatorMap = [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>=',
    'ne' => '!='
  ];
}