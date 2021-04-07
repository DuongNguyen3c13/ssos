<?php

namespace App\Guards;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class SSOGuard implements Guard
{
    protected $request;
    protected $provider;
    protected $user;

    public function __construct(UserProvider $provider, Request $request)
    {
        $this->request = $request;
        $this->provider = $provider;
        $this->user = null;
    }

    public function check()
    {
        return $this->validate();
    }

    public function guest()
    {
        return !$this->check();
    }

    public function user()
    {
        if (! is_null($this->user)) {
            return $this->user;
        }
    }

    public function id()
    {
        if ($user = $this->user()) {
            return $this->user()->id;
        }
    }

    /**
     * Get the JSON params from the current request
     *
     * @return string
     */
    public function getCookieFromRequest()
    {
        return $this->request->cookie('sso_token');
    }

    public function validate(array $credentials = [])
    {
        if (empty($credentials)) {
            $token = $this->getCookieFromRequest();
            if (empty($token)) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function setUser(Authenticatable $user)
    {
        $this->user = $user;

        return $this;
    }
}
