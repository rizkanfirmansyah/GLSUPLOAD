<?php

namespace App\Controllers;

// use CodeIgniter\Controller;

class HomeController extends BaseController
{
    // public function __contruct(){
    //     parents::__contruct();
    // }

    
    // protected $helpers = ['html'];
    
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

    // public function tugas(){
    //     return view('tugas');
    // }
}
