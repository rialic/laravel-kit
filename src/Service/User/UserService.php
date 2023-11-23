<?php

namespace App\Service\User;

use App\Repository\Interfaces\UserInterface as UserRepository;
use App\Service\Base\ServiceResource;

class UserService extends ServiceResource
{
  protected $storeInputs = [
    'name',
    'email',
    'password',
  ];

  protected $updateInputs = [
    'name',
    'email',
    'password',
  ];

  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }
}
