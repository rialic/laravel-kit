<?php

namespace App\Repository;

use App\Models\Permission;
use App\Repository\Base\DBRepository;
use App\Repository\Interfaces\PermissionInterface;

class PermissionRepository extends DBRepository implements PermissionInterface
{
    protected function model()
    {
        return Permission::class;
    }
}