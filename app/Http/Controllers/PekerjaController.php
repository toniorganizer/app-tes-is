<?php

namespace App\Http\Controllers;

use App\Models\Lamar;
use Illuminate\Http\Request;
use App\Models\PemberiInformasi;
use App\Models\InformasiLowongan;
use App\Models\PencariKerja;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PemberiInformasi::join('users','users.email','=','pemberi_informasis.email_instansi')
        ->join('informasi_lowongans', 'informasi_lowongans.pemberi_informasi_id','=','users.id')->get();
        $item = Lamar::join('informasi_lowongans','informasi_lowongans.id','=','lamars.id_informasi')
        ->join('users','users.id','=','lamars.id_pelamar')->get();

        return view('Dashboard.pencari_kerja.data-lowongan', [
            'sub_title' => 'Data Lowongan',
            'title' => 'Data',
            'data' => $data,
            'items' => $item
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
        //
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
        //
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
        $data = InformasiLowongan::findOrFail($id);
        $item = InformasiLowongan::join('users', 'users.id','=','informasi_lowongans.pemberi_informasi_id')
                ->join('pemberi_informasis', 'pemberi_informasis.email_instansi','=', 'users.email')
                ->join('lamars', 'lamars.id_informasi','=','informasi_lowongans.id')
                ->join('pencari_kerjas', 'pencari_kerjas.email_pk','=','lamars.id_pelamar')->where('id_pelamar', Auth::user()->email)->first();
        
        $id_lamar = Lamar::where('id_informasi', $id)->first();
                
        dd($id_lamar->id_pelamar);

        return view('dashboard.pencari_kerja.detail-lowongan',[
            'data' => $data,
            'item' => $item,
            'sub_title' => 'Data Lowongan',
            'title' => 'Data',
        ]);
    }

    public function lamarPekerjaan($id){
        $data = InformasiLowongan::findOrFail($id);
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
            'status_info' => 0,
            'pesan' => $request->pesan
        ]);

        return redirect('/home')->with('success', 'Selamat anda berhasil melakukan lamaran kerja');
    }
}
