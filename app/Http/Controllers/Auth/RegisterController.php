<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Profil;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Alamat;
use App\Models\Terapis;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verification'; //ini yang diubah
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function RegisterIndex()
    {
        return view('customer.auth.register');
    }
    public function RegisterPost(Request $request)
    {
        // kode aktivasi 
        $activation_code = rand(1000, 9999);
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:16',
            'name' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'name.required' => 'Nama Harus di isi',
            'nik.required' => 'NIK Harus di isi',
            'no_hp.required' => 'Nomor Telepon Harus di isi',
            'password.required' => 'Password Harus di isi',
            'password_confirmation.required' => 'Password Konfirmasi Harus di isi',
            'password.confirmed' => 'Konfirmasi Password tidak cocok dengan Password',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email yang anda masukan sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('RegisterPost')->withErrors($validator)->withInput();
        }
        if ($request->role == 'terapis') {
            return dd('ini terapis');
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
            // dd([
            //     $customers,
            //     $user,
            //     $tableAlamatKosong
            // ]);
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


    protected function create(array $data)
    {
        // return dd($data);

        $activation_code = rand(1000, 9999);
        $user = User::create([
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'role'              => $data['role'],
            'activation_code'   => $activation_code,
        ]);
        if ($data['role'] == 'customer') {
            $customers = Customers::create([
                'nama' => $data['name'],
                'jenis_kelamin' => 'Laki-Laki',
                'status' => 'active',
                'no_hp' => '6281234567890',
                'nik' => '1234567890123456',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-01-01',
                'foto' => 'foto.jpg',
                'foto_ktp' => 'foto_ktp.jpg',
                'user_id' => User::latest()->first()->id,
            ]);
            $tableAlamatKosong = Alamat::create([
                'user_id' => User::latest()->first()->id,
                'alamat' => 'alamat kosong',
                'provinsi' => 'provinsi kosong',
                'kota' => 'kota kosong',
                'kecamatan' => 'kecamatan kosong',
                'kelurahan' => 'kelurahan kosong',
                'kode_pos' => 'kode pos kosong',
                'alamat_lengkap' => 'alamat lengkap kosong',
                'status' => 'active',
            ]);
        }
        Mail::to($data['email'])->send(new VerificationMail($activation_code));
        $messege = 'Email sudah terkirim,Cek Kotak Masuk Email Anda';
        return $user;
    }
}
