<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        return view('Admin/login');
    }

    public function login()
    {
        return view('Admin/login');
    }

}
