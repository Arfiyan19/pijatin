<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    //post login form
    public function login(Request $request)
    {
        // dd($request->all());
        $this->validateLogin($request);
        if ($this->attemptLogin($request)) {
            return $this->authenticated($request, $this->guard()->user());
        }
        return $this->sendFailedLoginResponse($request);
    }
    //logout

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard')->with('success', 'Selamat datang, ' . $user->role);
        } elseif ($user->role === 'superadmin') {
            return redirect('/superadmin/dashboard')->with('success', 'Selamat datang, ' . $user->role);
        }
        //role customer
        Auth::logout();
        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = ['email' => trans('auth.failed')];
        $user = User::where('email', $request->email)->first();

        if ($user && ($user->role === 'admin' || $user->role === 'superadmin')) {
            session()->flash('errorMessage', 'Email atau password salah!');
            return redirect()->back()->withInput();
        } else {
            session()->flash('errorMessage', 'Anda tidak memiliki hak akses untuk melakukan tindakan ini!');
            return redirect('/login')->withErrors($errors);
        }
    }
}
