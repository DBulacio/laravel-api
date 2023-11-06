<?php

namespace App\Filters\V1;

use Illuminate\Http\Request; // we need access to the request
use App\Filters\ApiFilter;

class CustomersFilter extends ApiFilter {
  // The first rule to handling user input is: DON'T TRUST USER INPUT
  protected $safeParams = [
    'name' => ['eq'],
    'type' => ['eq'],
    'email' => ['eq'],
    'address' => ['eq'],
    'city' => ['eq'],
    'state' => ['eq'],
    'postalCode' => ['eq', 'gt', 'lt'],
  ];

  protected $columnMap = [
    'postalCode' => 'postal_code'
  ];

  protected $operatorMap = [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>=',
  ];
}