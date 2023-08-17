<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PemberiInformasi;
use App\Models\InformasiLowongan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PemberiInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(String $id)
    {
        // $data = PemberiInformasi::findOrFail($id);
        $data = PemberiInformasi::where('email_instansi', $id)->first();
        return view('Dashboard.pemberi_informasi.detail_instansi', [
            'sub_title' => 'Data Detail Instansi',
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
        $data = PemberiInformasi::findOrFail($id);
        return view('Dashboard.pemberi_informasi.edit-instansi', [
            'sub_title' => 'Edit data Instansi',
            'title' => 'Data',
            'data' => $data
        ]);
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
            'foto_instansi' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = PemberiInformasi::findOrFail($id);
        // dd($data->foto);

        if($request->hasFile('foto_instansi')){

            $foto = $request->file('foto_instansi');
            $foto->storeAs('public/user', $foto->hashName());
            Storage::delete('public/user/'. $data->foto);

            // dd($data);

            $data->update([
                'nama_instansi' => $request->nama_instansi,
                'bidang_instansi' => $request->bidang,
                'website_instansi' => $request->website_instansi,
                'instagram_instansi' => $request->instagram_instansi,
                'facebook_instansi' => $request->facebook_instansi,
                'telepon_instansi' => $request->telepon_instansi,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
                'foto' => $foto->hashName(),
            ]);

            User::where('email', $request->email_instansi)->update([
                'name' => $request->nama_instansi,
                'foto' => $foto->hashName(),
            ]);

        }else{
            $data->update([
                'nama_instansi' => $request->nama_instansi,
                'bidang_instansi' => $request->bidang,
                'website_instansi' => $request->website_instansi,
                'instagram_instansi' => $request->instagram_instansi,
                'facebook_instansi' => $request->facebook_instansi,
                'telepon_instansi' => $request->telepon_instansi,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi
            ]);

            User::where('email', $request->email_instansi)->update([
                'name' => $request->nama_instansi
            ]);
        }
        
        return redirect('/sumber/'. $id . '/edit')->with('success', 'Data Berhasil Disimpan!');
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

    public function data_lowongan()
    {
        $data = InformasiLowongan::join('users', 'users.id', '=', 'informasi_lowongans.pemberi_informasi_id')->where('email', Auth::user()->email)->get();

        return view('Dashboard.pemberi_informasi.data-lowongan', [
            'sub_title' => 'Data Lowongan',
            'title' => 'Data',
            'data' => $data
        ]);
    }
}
