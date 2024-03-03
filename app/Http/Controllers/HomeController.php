<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// customer models
use App\Models\Customers;
use App\Models\Terapis;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(CheckUserRole::class); //ini yang diubah
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home'); //ini yang diubah
    }
    public function adminHome()
    {
        // jumlahkan total customer
        $customer = Customers::count();
        // jumlahkan total terapis
        $terapis = Terapis::count();
        // jumlahkan total pemesanan cari berdasarkan status_pemesanan = sukses
        $pemesanan_sukses = Pemesanan::where('status_pemesanan', 'Sukses')->count();
        $pemesanan_batal = Pemesanan::where('status_pemesanan', 'Batal')->count();
        return view('backend.index', compact('customer', 'terapis', 'pemesanan_sukses', 'pemesanan_batal'));
    }
    //customerHome
    public function customerHome()
    {
        $user = auth()->user();
        return view('customer.home', compact('user'));
    }
    public function terapisHome()
    {
        $user = auth()->user();
        // dd('admin');
        return view('home');
    }
    //public function verifikasi()
    public function verification()
    {
        // return view('customer.verifikasi_code');
        return view('customer.auth.email-verif');
    }
    // postVerification
    public function postVerification(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        // dd($user);
        if ($user->activation_code == $request->verification_code) {
            $userData = User::where('id', $user->id)->first();
            $userData->email_verified_at = now();
            $userData->activation_code = null;
            $userData->save();
            if ($userData->role == 'terapis') {
                // dd('saya terapis woi');
                return redirect('/terapis/home')->with('success', 'Verifikasi Berhasil');
            } elseif ($userData->role == 'customer') {
                return redirect('/customers/home')->with('success', 'Verifikasi Berhasil');
            }
        } else {
            return redirect()->back()->with('error', 'Verifikasi Gagal');
        }
    }

    // /resend verifkasi 
    public function resendVerificationCode()
    {
        // dd('resend');
        $user = auth()->user();
        $user->activation_code = rand(1000, 9999);
        $user->save();
        // send email
        // VerificationMail
        Mail::to($user->email)->send(new VerificationMail($user->activation_code));
        return response()->json([
            'status' => 'success',
            'message' => 'Kode verifikasi berhasil dikirim ke email anda',
            'data' => $user->activation_code,
        ]);
    }
    public function verificationTerapis()
    {
        // dd(auth()->user());
        return view('customer.auth.email-verif-terapis');
    }
    // postVerification
    public function postVerificationTerapis(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        // dd($user);
        if ($user->activation_code == $request->verification_code) {
            $userData = User::where('id', $user->id)->first();
            $userData->email_verified_at = now();
            $userData->activation_code = null;
            $userData->save();
            if ($userData->role == 'terapis') {
                // dd('saya terapis woi');
                return redirect('/terapis/home')->with('success', 'Verifikasi Berhasil');
            } elseif ($userData->role == 'customer') {
                return redirect('/customers/home')->with('success', 'Verifikasi Berhasil');
            }
        } else {
            return redirect()->back()->with('error', 'Verifikasi Gagal');
        }
    }

    // /resend verifkasi 
    public function resendVerificationCodeTerapis()
    {
        $user = auth()->user();
        $user->activation_code = rand(1000, 9999);
        $user->save();
        // send email
        // VerificationMail
        Mail::to($user->email)->send(new VerificationMail($user->activation_code));
        return json_encode([
            'status' => 'success',
            'message' => 'Kode verifikasi berhasil dikirim ke email anda',
            'data' => $user->activation_code,
        ]);
    }
}
