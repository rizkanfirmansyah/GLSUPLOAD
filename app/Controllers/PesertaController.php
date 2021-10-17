<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PesertaController extends BaseController
{
    public function index()
    {
        // $this->load->helper('html');
        return view('mukadimah');
    }
    
    public function biodata($token){
        $data = [
            'validation' => \Config\Services::validation(),
            'token' => $token,
        ];
        return view('biodata',$data);
    }
}
