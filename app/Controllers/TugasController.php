<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TugasController extends BaseController
{
    public function index()
    {
        //
    }

    public function diklat($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/diklat',$data);
    }

    public function bacaBuku()
    {
        return view('Tugas/baca-buku');
    }
    public function reviewBuku()
    {
        return view('Tugas/review-buku');
    }

    public function diorama()
    {
        return view('Tugas/diorama');
    }

    public function karyaTulis()
    {
        return view('Tugas/karya-tulis');
    }
    
    public function video()
    {
        return view('Tugas/video');
    }

    public function antologi()
    {
        return view('Tugas/antologi');
    }

    public function literasiKota()
    {
        return view('Tugas/literasi-kota');
    }

    public function literasiMedia()
    {
        return view('Tugas/literasi-media');
    }

    public function literasiAssestment()
    {
        return view('Tugas/literasi-assestment');
    }

    public function partisipasi()
    {
        return view('Tugas/partisipasi');
    }

    public function selesai()
    {
        return view('selesai');
    }
}