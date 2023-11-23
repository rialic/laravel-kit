<?php

use App\Exceptions\InvalidParseFilterException;

if (!function_exists('parseFilters')) {
  function parseFilters(Array $data): array
  {
    $dataFilters = [];
    $hasDataFilters = isset($data) && !empty($data);

    if ($hasDataFilters) {
      foreach($data as $filter => $value){
        if(is_string($filter)) {
          $dataFilters["filter:$filter"] = $value;

          continue;
        }

        throw new InvalidParseFilterException();
        break;
      }

      return $dataFilters;
    }

    return [];
  }
}
