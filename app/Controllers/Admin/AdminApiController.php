<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminApiController extends BaseController
{
    public function index()
    {
        //
    }

    public function auth()
    {
        return redirect()->route('pages-admin-dashboard');
    }
}
