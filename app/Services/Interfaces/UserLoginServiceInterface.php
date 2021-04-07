<?php

namespace App\Services\Interfaces;

interface UserLoginServiceInterface
{
    public function store(array $data);
    public function findByLoginToken($token, $origin);
    public function deleteToken($token);
}
