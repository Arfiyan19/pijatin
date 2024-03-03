<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Periksa juga apakah pengguna memiliki peran "finance"
            if (Auth::user()->role === 'finance') {
                // Jika pengguna sudah login dan memiliki peran "finance", lanjutkan ke halaman yang diminta
                return $next($request);
            }
        }

        // Jika tidak memenuhi syarat, arahkan kembali ke halaman login finance
        return redirect()->route('finance.login');
    }
}
