<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        return view('Admin/index');
    }

    public function login()
    {
        if (session('username') !== null) {
           return redirect()->route('pages-admin-index');
        }
        return view('Admin/login');
    }

}
