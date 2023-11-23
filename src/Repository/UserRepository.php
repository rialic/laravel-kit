<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Base\DBRepository;
use App\Repository\Interfaces\UserInterface;

class UserRepository extends DBRepository implements UserInterface
{
    protected function model()
    {
        return User::class;
    }

    public function query($params = [])
    {
        $query = parent::query($params);

        return $query->with('roles.permissions');
    }

    public function filterByName($query, $data, $field)
    {
        return $query->where($this->getTableColumn($field), $data);
    }

    public function filterByEmail($query, $data, $field)
    {
        return $query->where($this->getTableColumn($field), $data);
    }
}