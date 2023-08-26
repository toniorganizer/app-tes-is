<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lamar;
use App\Models\PencariKerja;
use Illuminate\Http\Request;
use App\Charts\CountJobChart;
use App\Charts\MonthlyJobChart;
use App\Models\InformasiLowongan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(MonthlyJobChart $chart, CountJobChart $jobcount)
    {

        $data = InformasiLowongan::count();
        $lamar = Lamar::where('id_pelamar', Auth::user()->email)->count();
        return view('Dashboard.admin.index_admin', [
            'chart' => $chart->build(), 
            'jobcount' => $jobcount->build(),
            'title' => 'Dashboard',
            'sub_title' => 'Dashboard',
            'jumlah_loker' => $data,
            'jumlah_lamaran' => $lamar
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
        $data = PencariKerja::join('users','users.email','=','pencari_kerjas.email_pk')->where('email_pk', $id)->first();
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
}
