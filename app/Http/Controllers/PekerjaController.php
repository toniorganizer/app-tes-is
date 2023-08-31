<?php

namespace App\Http\Controllers;

use App\Models\BKK;
use App\Models\User;
use App\Models\Lamar;
use App\Models\Alumni;
use App\Models\BursaKerja;
use App\Models\PencariKerja;
use Illuminate\Http\Request;
use App\Models\PemberiInformasi;
use App\Models\InformasiLowongan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InformasiLowongan::leftJoin('lamars','lamars.id_informasi','=','informasi_lowongans.id_informasi_lowongan')->select('id_informasi', 'judul_lowongan','id_informasi_lowongan','perusahaan','foto_lowongan', 'verifikasi', DB::raw('count(id_informasi) as jumlah_pelamar'))->groupBy('id_informasi', 'judul_lowongan','id_informasi_lowongan','perusahaan','foto_lowongan', 'verifikasi')->get();

        return view('Dashboard.pencari_kerja.data-lowongan', [
            'sub_title' => 'Data Lowongan',
            'title' => 'Data',
            // 'datainfo' => $datainfo,
            'data' => $data,
            // 'items' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PencariKerja::join('lamars', 'lamars.id_pelamar','=','pencari_kerjas.email_pk')
                ->join('informasi_lowongans','informasi_lowongans.id_informasi_lowongan','=','lamars.id_informasi')
                ->where('email_pk',$id)->get();
        return view('Dashboard.pencari_kerja.status-daftar', [
            'sub_title' => 'Status Daftar',
            'title' => 'Data',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $this->validate($request, [
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = PencariKerja::where('email_pk', $request->email_pk)->first();
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto->storeAs('public/user', $foto->hashName());

            Storage::delete('public/user/' . $data->foto_pencari_kerja);

        PencariKerja::where('email_pk', $request->email_pk)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'pendidikan_terakhir' => $request->pendidikan,
            'keterampilan' => $request->keterampilan,
            'tentang' => $request->tentang,
            'no_hp' => $request->no_hp,
            'foto_pencari_kerja' => $foto->hashName(),
        ]);

        User::where('email', $request->email_pk)->update([
            'name' => $request->nama_lengkap,
            'foto_user' => $foto->hashName(),
        ]);
        }else{
            PencariKerja::where('email_pk', $request->email_pk)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'alamat' => $request->alamat,
                'pendidikan_terakhir' => $request->pendidikan,
                'keterampilan' => $request->keterampilan,
                'tentang' => $request->tentang,
                'no_hp' => $request->no_hp
            ]);
    
            User::where('email', $request->email_pk)->update([
                'name' => $request->nama_lengkap,
            ]);
        }

        return redirect('profil-tenaga-kerja/'. $request->email_pk)->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function DetailLowongan($id){
        $data = InformasiLowongan::where('id_informasi_lowongan',$id)->first();
        $item = InformasiLowongan::join('users', 'users.id_user','=','informasi_lowongans.pemberi_informasi_id')->join('pemberi_informasis', 'pemberi_informasis.email_instansi','=', 'users.email')->first();

        $exists = DB::table('lamars')
        ->where('id_pelamar', Auth::user()->email)
        ->where('id_informasi', $data->id_informasi_lowongan)
        ->exists();

        return view('dashboard.pencari_kerja.detail-lowongan',[
            'data' => $data,
            'item' => $item,
            'exists' => $exists, 
            'sub_title' => 'Data Lowongan',
            'title' => 'Data',
        ]);
    }

    public function lamarPekerjaan($id){
        $data = InformasiLowongan::where('id_informasi_lowongan', $id)->first();
        return view('dashboard.pencari_kerja.lamar-lowongan',[
            'data' => $data,
            'sub_title' => 'Lamar Lowongan',
            'title' => 'Data',
        ]);
    }

    public function lamarLowonganPekerjaan(Request $request){
        $this->validate($request, [
            'pesan' => 'required|min:15',
        ]);

        Lamar::create([
            'id_informasi' => $request->id_informasi,
            'id_pelamar' => $request->id_pelamar,
            'status' => 0,
            'pesan' => $request->pesan
        ]);

        return redirect('/home')->with('success', 'Selamat anda berhasil melakukan lamaran kerja');
    }

    public function tracerStudy(){
        $bkk = BursaKerja::get();

        return view('dashboard.pencari_kerja.tracer-study',[
            'bkk' => $bkk,
            'sub_title' => 'Tracer Study',
            'title' => 'Data',
        ]);

    }

    public function updateTracerStudy(Request $request){
        Alumni::create([
            'pencari_kerja_id' => $request->email_pk,
            'bkk_id' => $request->id_bkk,
            'jurusan' => $request->jurusan,
            'status_bekerja' => $request->status_bekerja,
            'tempat_kerja' => $request->tempat_kerja,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        User::where('id_user', $request->id_user)->update([
            'status_tracer' => $request->status
        ]);

        PencariKerja::where('email_pk', $request->email_pk)->update([
            'bkk_id' => $request->id_bkk
        ]);

        return redirect('/tracer-study')->with('success', 'Terima kasih, telah ikut serta dalam pendataan alumni.');

    }

    public function editDataTracer($id){
        $data = Alumni::where('pencari_kerja_id', $id)->first();
        $bkk = BursaKerja::get();

        return view('dashboard.pencari_kerja.edit-data-tracer',[
            'data' => $data,
            'bkk' => $bkk,
            'sub_title' => 'Edit Data Tracer Study',
            'title' => 'Data',
        ]);
    }

    public function updateDataTracer(Request $request){
        Alumni::where('pencari_kerja_id', $request->email_pk)->update([
            'jurusan' => $request->jurusan,
            'status_bekerja' => $request->status_bekerja,
            'tempat_kerja' => $request->tempat_kerja,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        User::where('id_user', $request->id_user)->update([
            'status_tracer' => $request->status
        ]);

        PencariKerja::where('email_pk', $request->email_pk)->update([
            'bkk_id' => $request->id_bkk
        ]);

        return redirect('/tracer-study')->with('success', 'Data berhasil diupdate.');

    }
}
