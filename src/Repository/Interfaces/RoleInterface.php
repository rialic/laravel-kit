<?php

namespace App\Repository\Interfaces;

interface RoleInterface
{
  public function filterByName($query, $data, $field);
}
