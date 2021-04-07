<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserLogin;
use App\Providers\RouteServiceProvider;
use App\Services\Interfaces\UserLoginServiceInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $userLoginService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserLoginServiceInterface $userLoginService)
    {
        $this->middleware('guest')->except('logout');
        $this->userLoginService = $userLoginService;
    }

    public function showLoginForm(Request $request)
    {
        $logInToken = Cookie::get('sso_token');
        $origin = $request->get('origin');
        if (!is_null($logInToken)) {
            $userLogin = UserLogin::where('login_token', $logInToken)->first();
            if (is_null($userLogin)) {
                return view('auth.login')->with(['origin' => $origin]);
            }
            return redirect()
                ->to($origin . '?token=' . 'you_logged_in')
                ->send();
        }
        return view('auth.login')->with(['origin' => $origin]);
    }

    protected function authenticated(Request $request, $user)
    {
        $this->userLoginService->store([
            'user_id' => $user->id,
            'login_token' => 'you_logged_in'
        ]);
        $origin = $request->get('origin');

        return redirect()
                ->to($origin . '?token=' . 'you_logged_in')
                ->withCookie(cookie()->forever('sso_token', 'you_logged_in'))
                ->send();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        $cookie = Cookie::forget('sso_token');

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login')->withCookie($cookie);
    }
}
