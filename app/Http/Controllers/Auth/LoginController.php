<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        $field = 'email';

        $request->merge([$field => $request->input('email')]);

        $credentials = $request->only($field, 'password');

        $remember = request('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return redirect("login")->withInput()->with('error',  __('Email or password is incorrect'));
        }

        $user = User::where('email', $request->email)->first();

        if ($user->email_verification_status == STATUS_ACTIVE) {

            if ($user->status == 1) {
                Auth::logout();
                return redirect("login")->withInput()->with('error', __('Your account is suspended Please contact our support center'));
            } elseif ($user->deleted_at != null) {
                Auth::logout();
                return redirect("login")->withInput()->with('error', __('Your account has been deleted'));
            }

            if (isset($user) && ($user->status == STATUS_PENDING)) {
                Auth::logout();
                return redirect("login")->with('error', __('Your account is under approval. Please wait for approval'));
            } else if (isset($user) && ($user->status == 2)) {
                Auth::logout();
                return redirect("login")->withInput()->with('error', __('Your account is inactive. Please contact with admin'));
            } else {
                generateUserActivityLog('Sign In', $user->id);
                return redirect('login');
            }

        }
        return redirect('login');
    }
}
