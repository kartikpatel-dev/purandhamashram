<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session, Redirect, Auth;

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

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        $login = request()->input('email');

        if (is_numeric($login)) {
            $field = 'mobile_number';
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'email';
        }

        request()->merge([$field => $login]);

        return $field;
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    /* public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active',
        ];
    } */
    protected function credentials(Request $request)
    {
        if (is_numeric($request->get('email'))) {
            return ['mobile_number' => $request->get('email'), 'password' => $request->get('password')];
        } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password' => $request->get('password')];
        }

        return ['email' => $request->get('email'), 'password' => $request->get('password')];
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->status == 'Deactivate') {
            Auth::logout();

            Session::flash('messageType', 'error');
            Session::flash('message', 'You account is not approved yet, please contact admin.');

            return redirect::route('login');
        }

        $roles = Auth::user()->role->pluck('slug')->toArray();
        if (!empty(Auth::user()->role) && (in_array('admin', $roles) || in_array('manager', $roles))) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('front.home');
        }
    }
}
