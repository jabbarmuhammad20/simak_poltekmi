<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Mahasiswa;

class HomeController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $data = [
            'title' => 'Dashboard',
            'prodi_rpl'=> Mahasiswa::where('programstudi_id','1')->count(),
            'prodi_mm'=> Mahasiswa::where('programstudi_id','2')->count(),
            'prodi_bd'=> Mahasiswa::where('programstudi_id','3')->count(),
        ];

        return view('home', compact('data'));
    } 
}