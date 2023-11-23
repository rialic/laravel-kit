<?php

namespace App\Service\Role;

use App\Repository\Interfaces\RoleInterface as RoleRepository;
use App\Service\Base\ServiceResource;

class RoleService extends ServiceResource
{
  protected $storeInputs = [
    'name',
  ];

  protected $updateInputs = [
    'name',
  ];

  public function __construct(RoleRepository $repository)
  {
    $this->repository = $repository;
  }
}