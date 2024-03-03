<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customers;
use App\Models\Terapis;
use App\Models\Alamat;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\DB;
use App\Models\Saldo;


class CustomersAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        $messege = [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter'
            //password salah
        ];
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ], $messege);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            if ($user->role === 'customer') {
                $token = auth()->attempt($credentials);

                if ($token) {
                    return redirect()->route('customers.dashboard')->with('success', 'Login Berhasil');
                } else {
                    session()->flash('errorMessage', 'Unauthorized!');
                    return redirect()->route('customers.login');
                }
            } elseif ($user->role == 'terapis') {
                $token = auth()->attempt($credentials);

                if ($token) {
                    return redirect()->route('terapis.dashboard')->with('success', 'Login Berhasil');
                } else {
                    session()->flash('errorMessage', 'Unauthorized!');
                    return redirect()->route('customers.login');
                }
            } else {
                Auth::logout();
                session()->flash('errorMessage', 'You do not have permission to access this resource!');
                return redirect()->route('customers.login');
            }
        } else {
            session()->flash('errorMessage', 'Email atau password salah!');
            return redirect()->route('customers.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->flash('successMessage', 'Logout Berhasil!');
        return redirect()->route('customers.login');
    }
    //pilih role
    public function pilihRole()
    {
        return view('customer.pilihrole');
    }

    public function RegisterIndex()
    {
        return view('customer.auth.register');
    }
    // RegisterCustomer{customers} 
    public function RegisterCustomer($customer)
    {
        $data = $customer;
        return view('customer.auth.register', compact('data'));
    }
    // RegisterCustomerPut
    public function RegisterCustomerPost(Request $request, $customer)
    {
        $activation_code = rand(1000, 9999);
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'name.required' => 'Nama Harus di isi',
            'no_hp.required' => 'Nomor Telepon Harus di isi',
            'password.required' => 'Password Harus di isi',
            'password_confirmation.required' => 'Password Konfirmasi Harus di isi',
            'password.confirmed' => 'Konfirmasi Password tidak cocok dengan Password',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email yang anda masukan sudah ada',
            'nik.required' => 'NIK harus di isi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus di isi',
        ]);
        if ($validator->fails()) {
            return redirect('daftar/customer')->withErrors($validator)->withInput();
        }
        $user = User::create([
            'email'             => $request->email,
            'password'          => Hash::make($request->password,),
            'role'              => $customer,
            'activation_code'   => $activation_code,
        ]);
        $customers = Customers::create([
            'nama' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => 'active',
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'tempat_lahir' => '-',
            'tanggal_lahir' => '2001-01-01',
            'foto' => 'foto.jpg',
            'foto_ktp' => 'foto_ktp.jpg',
            'user_id' => User::latest()->first()->id,
        ]);
        $tableAlamatKosong = Alamat::create([
            'user_id' => User::latest()->first()->id,
            'alamat_lengkap' => '-',
            'provinsi' => '-',
            'kota' => '-',
            'kecamatan' => '-',
            'kelurahan' => '-',
            'kode_pos' => '-',
            'latitude' => '-',
            'longitude' => '-',
        ]);
        Mail::to($request->email)->send(new VerificationMail($activation_code));
        $messege = 'Email sudah terkirim,Cek Kotak Masuk Email Anda';
        //auto login user
        $user = User::where('email', $request->email)->first();
        Auth::login($user);
        return redirect()->route('verification')->with('success', $messege);
    }
    //terapis
    public function RegisterTerapis($terapis)
    {
        $data = $terapis;
        return view('customer.auth.register', compact('data'));
    }
    // RegisterTerapisPost
    public function RegisterTerapisPost(Request $request, $terapis)
    {
        // kode aktivasi 
        $activation_code = rand(1000, 9999);
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'name.required' => 'Nama Harus di isi',
            'no_hp.required' => 'Nomor Telepon Harus di isi',
            'no_hp.max' => 'Nomor Telepon tidak boleh lebih dari 15 karakter',
            'password.required' => 'Password Harus di isi',
            'password_confirmation.required' => 'Password Konfirmasi Harus di isi',
            'password.confirmed' => 'Konfirmasi Password tidak cocok dengan Password',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email yang anda masukan sudah ada',
            'nik.required' => 'NIK harus di isi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus di isi',
        ]);

        if ($validator->fails()) {
            return redirect('daftar/terapis')->withErrors($validator)->withInput();
        }
        // return dd('ini terapis');
        $user = User::create([
            'email'             => $request->email,
            'password'          => Hash::make($request->password,),
            'role'              => $terapis,
            'activation_code'   => $activation_code,
        ]);
        $terapis = Terapis::create([
            'nama' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => 'active',
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'tempat_lahir' => '-',
            'tanggal_lahir' => '2001-01-01',
            'foto' => 'foto.jpg',
            'foto_ktp' => 'foto_ktp.jpg',
            //skck
            'foto_skck' => 'foto_skck.jpg',
            'user_id' => User::latest()->first()->id,
        ]);
        //insert saldo
        $tableSaldo = Saldo::create([
            'terapis_id' => Terapis::latest()->first()->id,
            'saldo' => 0,
        ]);
        $tableAlamatKosong = Alamat::create([
            'user_id' => User::latest()->first()->id,
            'alamat_lengkap' => '-',
            'provinsi' => '-',
            'kota' => '-',
            'kecamatan' => '-',
            'kelurahan' => '-',
            'kode_pos' => '-',
            'latitude' => '-',
            'longitude' => '-',
        ]);

        Mail::to($request->email)->send(new VerificationMail($activation_code));
        $messege = 'Email sudah terkirim,Cek Kotak Masuk Email Anda';
        //auto login user
        $user = User::where('email', $request->email)->first();
        Auth::login($user);
        return redirect()->route('verificationTerapis')->with('success', $messege);
    }

    public function RegisterPost(Request $request)
    {
        // kode aktivasi 
        $activation_code = rand(1000, 9999);
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'role' => 'required|in:customer,terapis'
        ], [
            'name.required' => 'Nama Harus di isi',
            'no_hp.required' => 'Nomor Telepon Harus di isi',
            'password.required' => 'Password Harus di isi',
            'password_confirmation.required' => 'Password Konfirmasi Harus di isi',
            'password.confirmed' => 'Konfirmasi Password tidak cocok dengan Password',
            'role.required' => 'Role Harus di isi',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email yang anda masukan sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('RegisterPost')->withErrors($validator)->withInput();
        }
        if ($request->role == 'terapis') {
            // return dd('ini terapis');
            $user = User::create([
                'email'             => $request->email,
                'password'          => Hash::make($request->password,),
                'role'              => $request->role,
                'activation_code'   => $activation_code,
            ]);
            $terapis = Terapis::create([
                'nama' => $request->name,
                'jenis_kelamin' => '-',
                'status' => 'active',
                'no_hp' => $request->no_hp,
                'nik' => '-',
                'tempat_lahir' => '-',
                'tanggal_lahir' => '2001-01-01',
                'foto' => 'default.jpg',
                'foto_ktp' => 'default.jpg',
                'user_id' => User::latest()->first()->id,
            ]);
            $tableAlamatKosong = Alamat::create([
                'user_id' => User::latest()->first()->id,
                'alamat_lengkap' => '-',
                'provinsi' => '-',
                'kota' => '-',
                'kecamatan' => '-',
                'kelurahan' => '-',
                'kode_pos' => '-',
                'latitude' => '-',
                'longitude' => '-',
            ]);

            Mail::to($request->email)->send(new VerificationMail($activation_code));
            $messege = 'Email sudah terkirim,Cek Kotak Masuk Email Anda';
            //auto login user
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect()->route('verification')->with('success', $messege);
        } else if ($request->role == 'customer') {
            $user = User::create([
                'email'             => $request->email,
                'password'          => Hash::make($request->password,),
                'role'              => $request->role,
                'activation_code'   => $activation_code,
            ]);
            $customers = Customers::create([
                'nama' => $request->name,
                'jenis_kelamin' => '-',
                'status' => 'active',
                'no_hp' => $request->no_hp,
                'nik' => '-',
                'tempat_lahir' => '-',
                'tanggal_lahir' => '2001-01-01',
                'foto' => 'default.jpg',
                'foto_ktp' => 'default.jpg',
                'user_id' => User::latest()->first()->id,
            ]);
            $tableAlamatKosong = Alamat::create([
                'user_id' => User::latest()->first()->id,
                'alamat_lengkap' => '-',
                'provinsi' => '-',
                'kota' => '-',
                'kecamatan' => '-',
                'kelurahan' => '-',
                'kode_pos' => '-',
                'latitude' => '-',
                'longitude' => '-',
            ]);

            Mail::to($request->email)->send(new VerificationMail($activation_code));
            $messege = 'Email sudah terkirim,Cek Kotak Masuk Email Anda';
            //auto login user
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect()->route('verification')->with('success', $messege);
        }
        // Registration logic goes here
        // ...

        // Return a success response or redirect to a success page
        // return redirect()->route('login')->with('success', 'Registration successful');
    }
}
