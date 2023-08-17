<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PencariKerja;
use Illuminate\Http\Request;
use App\Models\InformasiLowongan;
use App\Models\PemberiInformasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            // if ($user->level == 1) {
            //     return redirect()->intended('dashboard-admin');
            // } elseif ($user->level == 2) {
            //     return redirect()->intended('dashboard-pekerja');
            // }
            return redirect()->intended('/home');
        }

        return view('dashboard/auth/login');
    }

    public function login_action(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            // if ($user->level == 1) {
            //     return redirect()->intended('dashboard-admin');
            // } else {
            //     return redirect()->intended('dashboard-pekerja');
            // }
            if ($user) {
                return redirect()->intended('/home');
            }
            return redirect()->intended('/login');
        }
        return back()->with('error', 'Username atau password salah');

        // return back()->withErrors([
        //     'username' => 'Username atau password yang dimasukan tidak cocok dengan data yang ada',
        // ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function detail_lowongan($id){

        $data = InformasiLowongan::findOrFail($id);
        $item = InformasiLowongan::join('users','users.id','=','informasi_lowongans.pemberi_informasi_id')
        ->join('pemberi_informasis', 'pemberi_informasis.email_instansi','=','users.email')->first();
        return view('halaman-utama.detail-informasi', [
            'data' => $data,
            'item' => $item
        ]);

    }

    public function register_pekerja(Request $request){
        $this->validate($request, [
            'username' => 'required|min:5',
            'name' => 'required|min:5',
            'email' => 'required|min:5|unique:users|email',
            'password' => 'required|same:ulangi_password|min:6',
            'ulangi_password' => 'required|same:password'
        ]);

        PencariKerja::create([
            'nama_lengkap' => $request->name,
            'email_pk' => $request->email,
            'alamat' => 0,
            'pendidikan' => 0,
            'keterampilan' => 0,
            'tentang' => 0,
            'no_hp' => 0,
            'foto' => 'default.jpg',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'level' => 2,
            'password' => Hash::make($request->password),
            'foto' => 'default.jpg',
        ]);

        return redirect('/user-register')->with('success', 'Data Berhasil Disimpan, Silahkan lakukan login!');
    }

    public function register_perusahaan(Request $request){
        $this->validate($request, [
            'username' => 'required|min:5|unique:users',
            'nama_perusahaan' => 'required|min:5',
            'email' => 'required|min:5|unique:users|email',
            'password' => 'required|same:ulangi_password|min:6',
            'ulangi_password' => 'required|same:password'
        ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'username.min' => 'Username minimal berisi 5 karakter',
                'username.unique' => 'Username yang anda masukan sudah terdaftar',
                'nama_perusahaan.required' => 'Nama Perusahaan tidak boleh kosong',
                'nama_perusahaan.min' => 'Nama Perusahaan minimal berisi 5 karakter',
                'email.required' => 'Email Perusahaan tidak boleh kosong',
                'email.unique' => 'Email Perusahaan yang anda masukan sudah terdaftar',
                'nama-perusahaan.min' => 'Email Perusahaan minimal berisi 5 karakter',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal berisi 6 karakter',
                'password.same' => 'Password harus sama dengan konfirmasi password',
                'ulangi_password.same' => 'Konfirmasi password harus sama dengan password',
            ]
        );

        PemberiInformasi::create([
            'nama_instansi' => $request->nama_perusahaan,
            'bidang_instansi' => '-',
            'email_instansi' =>  $request->email,
            'website_instansi' => '-',
            'instagram_instansi' => '-',
            'facebook_instansi' => '-',
            'telepon_instansi' => '-',
            'alamat' => '-',
            'deskripsi' => '-',
            'foto' => 'default.jpg',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->nama_perusahaan,
            'email' => $request->email,
            'level' => 4,
            'password' => Hash::make($request->password),
            'foto' => 'default.jpg',
        ]);

        return redirect('/perusahaan-register')->with('success', 'Data Berhasil Disimpan, Silahkan lakukan login!');
    }
}
