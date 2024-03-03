<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerapisAuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        session()->flash('successMessage', 'Logout Berhasil!');
        return redirect()->route('terapis.login');
    }
}
