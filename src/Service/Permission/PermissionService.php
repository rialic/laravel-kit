<?php

namespace App\Service\Permission;

use App\Repository\Interfaces\PermissionInterface as PermissionRepository;
use App\Service\Base\ServiceResource;

class PermissionService extends ServiceResource
{
  protected $storeInputs = [
    'name',
  ];

  protected $updateInputs = [
    'name',
  ];

  public function __construct(PermissionRepository $repository)
  {
    $this->repository = $repository;
  }
}