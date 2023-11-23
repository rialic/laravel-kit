<?php

namespace App\Service\Base;

interface ServiceInterface
{
  public function show($uuid);
  public function index();
  public function store();
  public function update($identity);
  public function delete($uuid);
}