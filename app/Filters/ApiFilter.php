<?php

namespace App\Filters;

use Illuminate\Http\Request; // we need access to the request

class ApiFilter {
  // The first rule to handling user input is: DON'T TRUST USER INPUT
  protected $safeParams = [];

  protected $columnMap = [];

  protected $operatorMap = [];

  public function transform(Request $request) {
    $eloQuery = [];

    foreach ($this->safeParams as $param => $operators) {
      $query = $request->query($param);

      if(!isset($query)) {
        continue;
      }

      $column = $this->columnMap[$param] ?? $param;

      foreach ($operators as $operator) {
        if(isset($query[$operator])) {
          $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        }
      }
    }

    return $eloQuery;
  }
}