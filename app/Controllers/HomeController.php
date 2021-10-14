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

    public function biodata(){
        return view('biodata');
    }

    // public function tugas(){
    //     return view('tugas');
    // }
}
