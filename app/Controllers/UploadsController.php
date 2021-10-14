<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UploadsController extends BaseController
{
    // protected $request;

    public function __contruct(){
        parent::__contruct;
        // $request = \Config\Services::request();
    }

    public function index()
    {
        //
    }

    public function files(){

        
        return 'ok';

    }
}
