<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class RekapController extends BaseController
{
    public function index()
    {
        //
    }

    public function peserta()
    {
        return view('Admin/Rekap/biodata');
    }

    public function diklat()
    {
        return view('Admin/Rekap/diklat');
    }

    public function book()
    {
        return view('Admin/Rekap/book');
    }

    public function review()
    {
        return view('Admin/Rekap/review');
    }

    public function diorama()
    {
        return view('Admin/Rekap/diorama');
    }

    public function literasi()
    {
        return view('Admin/Rekap/literasi');
    }

    public function video()
    {
        return view('Admin/Rekap/video');
    }

    public function partisipasi()
    {
        return view('Admin/Rekap/partisipasi');
    }

    public function karya()
    {
        return view('Admin/Rekap/karya');
    }

    public function puisi()
    {
        return view('Admin/Rekap/puisi');
    }

    public function pantun()
    {
        return view('Admin/Rekap/pantun');
    }
    
    public function literasiMedia()
    {
        return view('Admin/Rekap/literasi-media');
    }

    public function literasiKota()
    {
        return view('Admin/Rekap/literasi-kota');
    }

    public function antologi()
    {
        return view('Admin/Rekap/antologi');
    }
}
