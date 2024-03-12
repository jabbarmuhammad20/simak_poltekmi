<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('home', compact('data'));
    } 
}