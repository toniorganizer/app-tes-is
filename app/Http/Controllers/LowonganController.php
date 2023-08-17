<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiLowongan;
use Illuminate\Console\View\Components\Info;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InformasiLowongan::get();
        return view('Dashboard.admin.pekerjaan_data', [
            'sub_title' => 'Data Pekerjaan',
            'title' => 'Data',
            'data' => $data
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
        // dd($request->informasi);
        
        $this->validate($request, [
            'pemberi_id' => 'required',
            'informasi' => 'required|min:5',
            'perusahaan' => 'required|min:5',
            'salary' => 'required|min:5',
            'bidang' => 'required|min:5',
            'jenis_lowongan' => 'required|min:5',
            'pendidikan' => 'required|min:5',
            'pengalaman' => 'required|min:5',
            'keterampilan' => 'required|min:5',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $foto = $request->file('foto');
        $foto->storeAs('public/informasi-lowongan', $foto->hashName());


        InformasiLowongan::create([
            'pemberi_informasi_id' => $request->pemberi_id,
            'judul_lowongan' => $request->informasi,
            'perusahaan' => $request->perusahaan,
            'salary' => $request->salary,
            'bidang' => $request->bidang,
            'jenis_lowongan' => $request->jenis_lowongan,
            'pendidikan' => $request->pendidikan,
            'pengalaman' => $request->pengalaman,
            'keterampilan' => $request->keterampilan,
            'deskripsi' => $request->deskripsi,
            'verifikasi' => 0,
            'foto_lowongan' => $foto->hashName(),
        ]);

        return redirect('/lowongan')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $data = InformasiLowongan::findOrFail($id);
        return view('Dashboard.admin.detail_informasi_lowongan', [
            'sub_title' => 'Data Informasi Lowongan',
            'title' => 'Data',
            'data' => $data
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
        $this->validate($request, [
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = InformasiLowongan::findOrFail($id);
        dd($data->verifikasi);

        if($request->hasFile('foto')){

            $foto = $request->file('foto');
            $foto->storeAs('public/informasi-lowongan', $foto->hashName());
            Storage::delete('public/informasi-lowongan/'. $data->foto_lowongan);

            $data->update([
                'pemberi_informasi_id' => $request->pemberi_id,
                'judul_lowongan' => $request->informasi,
                'perusahaan' => $request->perusahaan,
                'salary' => $request->salary,
                'bidang' => $request->bidang,
                'jenis_lowongan' => $request->jenis_lowongan,
                'pendidikan' => $request->pendidikan,
                'pengalaman' => $request->pengalaman,
                'keterampilan' => $request->keterampilan,
                'deskripsi' => $request->deskripsi,
                'foto_lowongan' => $foto->hashName(),
            ]);
        }else{
            $data->update([
                'pemberi_informasi_id' => $request->pemberi_id,
                'judul_lowongan' => $request->informasi,
                'perusahaan' => $request->perusahaan,
                'salary' => $request->salary,
                'bidang' => $request->bidang,
                'jenis_lowongan' => $request->jenis_lowongan,
                'pendidikan' => $request->pendidikan,
                'pengalaman' => $request->pengalaman,
                'keterampilan' => $request->keterampilan,
                'deskripsi' => $request->deskripsi
            ]);
        }
        
        return redirect('/lowongan/' . $id)->with('success', 'Data Berhasil Disimpan!');
    }

    public function verifikasiLowongan(Request $request, $id){

        $data = InformasiLowongan::findOrFail($id);

         $data->update([
            'verifikasi' => $request->verifikasi,
         ]);

        return redirect('/lowongan/' . $id)->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = InformasiLowongan::findOrFail($id);
        Storage::delete('public/informasi-lowongan/'. $data->foto);
        $data->delete();
        return redirect('/lowongan')->with('success', 'Data Berhasil Dihapus!');
    }

}
