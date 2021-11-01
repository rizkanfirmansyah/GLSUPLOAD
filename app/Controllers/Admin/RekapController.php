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
}
