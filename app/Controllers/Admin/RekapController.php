<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class RekapController extends BaseController
{
    public function index()
    {
        //
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

    public function karya()
    {
        return view('Admin/Rekap/karya');
    }
}
