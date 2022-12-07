<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiKriteriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('nilai_kriteria\index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tambah()
    {
        return view('nilai_kriteria\tambah');
    }
}
