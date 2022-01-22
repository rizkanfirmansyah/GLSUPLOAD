<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EndController extends BaseController
{
    public function index()
    {
        return view('end');
    }
}
