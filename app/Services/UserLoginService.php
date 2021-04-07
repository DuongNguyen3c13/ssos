<?php

namespace App\Services;

use App\Models\UserLogin;
use App\Services\Interfaces\UserLoginServiceInterface;

class UserLoginService implements UserLoginServiceInterface
{
    public function store(array $data)
    {
        UserLogin::create($data);
    }

    public function findByLoginToken($token, $origin)
    {
        $userLogin = UserLogin::where('login_token', $token)->first();
        if (is_null($userLogin)) {
            return fail('404', $token);
        }
        return success(json_encode(['sso_token' => $token]), $origin);
    }

    public function deleteToken($token)
    {
        UserLogin::where('login_token', $token)->delete();
    }
}
