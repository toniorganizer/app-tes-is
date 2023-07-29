<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MonthlyJobChart;
use App\Charts\CountJobChart;
use App\Models\InformasiLowongan;
use App\Models\User;

class AdminController extends Controller
{
    public function index(MonthlyJobChart $chart, CountJobChart $jobcount)
    {

        return view('Dashboard.admin.index_admin', [
            'chart' => $chart->build(), 
            'jobcount' => $jobcount->build(),
            'title' => 'Dashboard'
        ]);
    }

    public function show()
    {
        echo "Ini halaman data pada admin";
    }

    public function userData(){
        $data = User::get();
        return view('Dashboard.admin.user_data', [
            'title' => 'Data User',
            'data' => $data
        ]);
    }

    public function pekerjaanData(){
        $data = InformasiLowongan::get();
        return view('Dashboard.admin.pekerjaan_data', [
            'title' => 'Data Pekerjaan',
            'data' => $data
        ]);
    }

}
