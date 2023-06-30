<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Dashboard.admin.index_admin');
    }

    public function show()
    {
        echo "Ini halaman data pada admin";
    }
}
