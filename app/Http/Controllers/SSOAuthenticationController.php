<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\UserLoginServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SSOAuthenticationController extends Controller
{
    protected $userLoginService;

    public function __construct(UserLoginServiceInterface $userLoginService)
    {
        $this->userLoginService = $userLoginService;
    }

    public function verifyToken(Request $request)
    {
        $token = $request->get('token');
        $origin = $request->get('origin');

        return $this->userLoginService->findByLoginToken($token, $origin);
    }

    public function logOut(Request $request)
    {
        $token = $request->get('token');
        $this->userLoginService->deleteToken($token);
    }
}
