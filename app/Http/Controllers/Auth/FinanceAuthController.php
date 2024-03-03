<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('keuangan.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            if ($user->role === 'finance') {
                $token = auth()->attempt($credentials);
                
                if ($token) {
                    session()->flash('successMessage', 'Login successful');
                    return redirect()->route('finance.dashboard');
                } else {
                    session()->flash('errorMessage', 'Unauthorized!');
                    return redirect()->route('finance.login');
                }
            } else {
                Auth::logout();
                session()->flash('errorMessage', 'Anda tidak memiliki hak akses untuk melakukan tindakan ini!');
                return redirect()->route('finance.login');
            }
        } else {
            session()->flash('errorMessage', 'Email atau password salah!');
            return redirect()->route('finance.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('finance.login'); 
    }

}
