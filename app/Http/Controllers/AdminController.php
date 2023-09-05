<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lamar;
use App\Models\Alumni;
use App\Models\BursaKerja;
use App\Exports\UjiLaporan;
use App\Models\PencariKerja;
use Illuminate\Http\Request;
use App\Charts\CountJobChart;
use App\Charts\MonthlyJobChart;
use App\Models\PemberiInformasi;
use App\Models\InformasiLowongan;
use Illuminate\Support\Facades\DB;
use App\Models\PemangkuKepentingan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(MonthlyJobChart $chart, CountJobChart $jobcount)
    {

        $data = InformasiLowongan::count();
        $lamar = Lamar::where('id_pelamar', Auth::user()->email)->count();
        $alumni = Alumni::join('users', 'users.email','=','alumnis.pencari_kerja_id')
        ->join('bursa_kerjas', 'bursa_kerjas.id_bkk','=','alumnis.bkk_id')
        ->where('email_sekolah', Auth::user()->email)->count();
        $alumni_bekerja = Alumni::join('users', 'users.email','=','alumnis.pencari_kerja_id')
        ->join('bursa_kerjas', 'bursa_kerjas.id_bkk','=','alumnis.bkk_id')
        ->where('email_sekolah', Auth::user()->email)
        ->where('status_bekerja', 'Sudah Bekerja')->count();
        $user = User::count();
        $pencari_kerja = PencariKerja::count();
        $ak1 = PencariKerja::where('email_pk', Auth::user()->email)->first();

        return view('Dashboard.admin.index_admin', [
            'chart' => $chart->build(), 
            'jobcount' => $jobcount->build(),
            'title' => 'Dashboard',
            'sub_title' => 'Dashboard',
            'jumlah_loker' => $data,
            'jumlah_alumni' => $alumni,
            'alumni_bekerja' => $alumni_bekerja,
            'user' => $user,
            'pencari_kerja' => $pencari_kerja,
            'jumlah_lamaran' => $lamar,
            'status_ak1' => $ak1
        ]);
    }

    public function show()
    {
        echo "Ini halaman data pada admin";
    }

    public function userData(){
        $data = User::get();
        return view('Dashboard.admin.user_data', [
            'sub_title' => 'Data User',
            'title' => 'Data',
            'data' => $data
        ]);
    }

    public function tenagaKerjaData(){
        $data = PencariKerja::get();
        return view('Dashboard.admin.tenaga_kerja_data', [
            'sub_title' => 'Data Tenaga Kerja',
            'title' => 'Data',
            'data' => $data
        ]);
    }

    public function pekerjaanData(){
        $data = InformasiLowongan::get();
        return view('Dashboard.admin.pekerjaan_data', [
            'sub_title' => 'Data Pekerjaan',
            'title' => 'Data',
            'data' => $data
        ]);
    }

    public function tambahTenagaKerja(Request $request){

        $this->validate($request, [
            'username' => 'required|min:5',
            'nama' => 'required|min:5',
            'email' => 'required|min:5|unique:users|email',
            'alamat' => 'required|min:5',
            'pendidikan' => 'required|min:5',
            'keterampilan' => 'required|min:5',
            'tentang' => 'required|min:5',
            'no_hp' => 'required|min:5',
            'password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required|same:password',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public/user', $foto->hashName());

        PencariKerja::create([
            'nama_lengkap' => $request->nama,
            'email_pk' => $request->email,
            'bkk_id' => 0,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan,
            'keterampilan' => $request->keterampilan,
            'tentang' => $request->tentang,
            'no_hp' => $request->no_hp,
            'tgl_expired' => now()->addMonth(6),
            'status_ak1' => 'Aktif',
            'foto_pencari_kerja' => $foto->hashName(),
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->nama,
            'email' => $request->email,
            'level' => 2,
            'status_tracer' => 0,
            'password' => Hash::make($request->password),
            'foto_user' => $foto->hashName(),
        ]);

        return redirect('/tenaga-kerja-data')->with('success', 'Data Berhasil Disimpan!');

    }

    public function hapusTenagaKerja($id){
        
        $id_user = DB::table('pencari_kerjas')->where('email_pk',$id)->first();
        $data = DB::table('pencari_kerjas')->where('id_pencari_kerja', $id_user->id_pencari_kerja)->first();
        Storage::delete('public/user/' . $data->foto_pencari_kerja);
        DB::table('users')->where('email',$id)->delete();
        DB::table('pencari_kerjas')->where('email_pk',$id)->delete();

        return redirect('/tenaga-kerja-data')->with('success', 'Data Berhasil Dihapus!');

    }

    public function profilTenagaKerja($id){
        $data = PencariKerja::join('users','users.email','=','pencari_kerjas.email_pk')->join('alumnis', 'alumnis.pencari_kerja_id','=','pencari_kerjas.email_pk')->where('email_pk', $id)->first();
        return view('Dashboard.admin.profil_tenaga_kerja', [
            'sub_title' => 'Profile',
            'title' => 'Profile',
            'data' => $data
        ]);
    }

    public function editTenagaKerja($id){
        $data = PencariKerja::where('id_pencari_kerja', $id)->first();
        return view('Dashboard.admin.tenaga_kerja_data', [
            'sub_title' => 'Data Tenaga Kerja',
            'title' => 'Data',
            'data' => $data
        ]);
    }

    
    public function edit_deskripsi_lowongan($id)
    {
        $data = InformasiLowongan::where('id_informasi_lowongan', $id)->first();
        return view('Dashboard.admin.edit-deskripsi-lowongan', [
            'sub_title' => 'Edit Deskripsi Lowongan',
            'title' => 'Data',
            'data' => $data
        ]);
    }

    public function update_deskripsi_lowongan(Request $request){

        InformasiLowongan::where('id_informasi_lowongan', $request->id)->update([
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('edit-deskripsi/'. $request->id)->with('success', 'Data Berhasil Disimpan!');
    }


    public function registerUser(Request $request){
        $this->validate($request, [
            'username' => 'required|min:5|unique:users',
            'nama_user' => 'required|min:5',
            'email' => 'required|min:5|unique:users|email',
            'password' => 'required|same:ulangi_password|min:6',
            'ulangi_password' => 'required|same:password'
        ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'username.min' => 'Username minimal berisi 5 karakter',
                'username.unique' => 'Username yang anda masukan sudah terdaftar',
                'nama_user.required' => 'Nama User tidak boleh kosong',
                'nama_user.min' => 'Nama User minimal berisi 5 karakter',
                'email.required' => 'Email User tidak boleh kosong',
                'email.unique' => 'Email User yang anda masukan sudah terdaftar',
                'email_user.min' => 'Email User minimal berisi 5 karakter',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal berisi 6 karakter',
                'password.same' => 'Password harus sama dengan konfirmasi password',
                'ulangi_password.same' => 'Konfirmasi password harus sama dengan password',
            ]
        );

        if($request->level == 2){
            PencariKerja::create([
                'nama_lengkap' => $request->nama_user,
                'email_pk' => $request->email,
                'bkk_id' => 0,
                'alamat' => '-',
                'pendidikan' => '-',
                'keterampilan' => '-',
                'tentang' => '-',
                'no_hp' => '-',
                'tgl_expired' => now()->addMonth(6),
                'status_ak1' => 'Aktif',
                'foto_pencari_kerja' => 'default.jpg',
            ]);
    
            User::create([
                'username' => $request->username,
                'name' => $request->nama_user,
                'email' => $request->email,
                'level' => 2,
                'status_tracer' => 0,
                'password' => Hash::make($request->password),
                'foto_user' => 'default.jpg',
            ]);
        }elseif($request->level == 3){
            PemangkuKepentingan::create([
                'nama_lembaga' => $request->nama_user,
                'bidang_lembaga' => '-',
                'email_lembaga' =>  $request->email,
                'website_lembaga' => '-',
                'instagram_lembaga' => '-',
                'facebook_lembaga' => '-',
                'telepon_lembaga' => '-',
                'alamat_lembaga' => '-',
                'foto_lembaga' => 'default.jpg',
            ]);
    
            User::create([
                'username' => $request->username,
                'name' => $request->nama_user,
                'email' => $request->email,
                'level' => 3,
                'status_tracer' => 0,
                'password' => Hash::make($request->password),
                'foto_user' => 'default.jpg',
            ]);
        }elseif($request->level == 4){
            PemberiInformasi::create([
                'nama_instansi' => $request->nama_user,
                'bidang_instansi' => '-',
                'email_instansi' =>  $request->email,
                'website_instansi' => '-',
                'instagram_instansi' => '-',
                'facebook_instansi' => '-',
                'telepon_instansi' => '-',
                'alamat' => '-',
                'deskripsi' => '-',
                'foto_instansi' => 'default.jpg',
            ]);
    
            User::create([
                'username' => $request->username,
                'name' => $request->nama_user,
                'email' => $request->email,
                'level' => 4,
                'status_tracer' => 0,
                'password' => Hash::make($request->password),
                'foto_user' => 'default.jpg',
            ]);
        }else{
            BursaKerja::create([
                'nama_sekolah' => $request->nama_user,
                'email_sekolah' =>  $request->email,
                'website_sekolah' => '-',
                'instagram_sekolah' => '-',
                'facebook_sekolah' => '-',
                'telepon_sekolah' => '-',
                'alamat_sekolah' => '-',
                'foto_sekolah' => 'default.jpg',
            ]);
    
            User::create([
                'username' => $request->username,
                'name' => $request->nama_user,
                'email' => $request->email,
                'level' => 5,
                'status_tracer' => 0,
                'password' => Hash::make($request->password),
                'foto_user' => 'default.jpg',
            ]);
        }

        return redirect('/user-data')->with('success', 'Data Berhasil Disimpan!');
    }

    public function testLaporan(){
        $data = PencariKerja::join('alumnis', 'alumnis.pencari_kerja_id','=','pencari_kerjas.email_pk')->get();
        
        return Excel::download(new UjiLaporan($data), 'uji-coba.xlsx');
    }

    public function Laporan(){
        $data = PencariKerja::get();
        return view('Dashboard.admin.laporan', [
            'sub_title' => 'Laporan',
            'title' => 'Data',
            'data' => $data
        ]);
    }
}
