<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PemangkuKepentingan;
use Illuminate\Support\Facades\Storage;

class KepentinganController extends Controller
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
    public function show($id)
    {
        $data = PemangkuKepentingan::join('users','users.email','=','pemangku_kepentingans.email_lembaga')->where('email_lembaga', $id)->first();
        return view('Dashboard.pemangku-kepentingan.profile-pemangku', [
            'sub_title' => 'Profile',
            'title' => 'Profile',
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

        $data = PemangkuKepentingan::where('email_lembaga', $id)->first();

        if($request->hasFile('foto')){

            $foto = $request->file('foto');
            $foto->storeAs('public/user', $foto->hashName());
            Storage::delete('public/user/'. $data->foto);

            // dd($data);

            PemangkuKepentingan::where('email_lembaga', $id)->update([
                'nama_lembaga' => $request->nama_lembaga,
                'bidang_lembaga' => $request->bidang,
                'website_lembaga' => $request->website,
                'instagram_lembaga' => $request->instagram,
                'facebook_lembaga' => $request->facebook,
                'telepon_lembaga' => $request->telepon,
                'alamat_lembaga' => $request->alamat,
                'bidang_lembaga' => $request->bidang,
                'foto_lembaga' => $foto->hashName(),
            ]);

            User::where('email', $request->email)->update([
                'name' => $request->nama_lembaga,
                'foto_user' => $foto->hashName(),
            ]);

        }else{
            PemangkuKepentingan::where('email_lembaga', $id)->update([
                'nama_lembaga' => $request->nama_lembaga,
                'bidang_lembaga' => $request->bidang,
                'website_lembaga' => $request->website,
                'instagram_lembaga' => $request->instagram,
                'facebook_lembaga' => $request->facebook,
                'telepon_lembaga' => $request->telepon,
                'alamat_lembaga' => $request->alamat,
                'bidang_lembaga' => $request->bidang,
            ]);

            User::where('email', $request->email)->update([
                'name' => $request->nama_lembaga
            ]);
        }
        
        return redirect('/pemerintah/'. $id)->with('success', 'Data Berhasil Disimpan!');
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
}
