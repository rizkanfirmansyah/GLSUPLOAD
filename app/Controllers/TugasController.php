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

    public function bacaBuku($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/baca-buku',$data);
    }
    public function reviewBuku($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/review-buku',$data);
    }

    public function diorama($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/diorama', $data);
    }

    public function karyaTulis($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/karya-tulis',$data);
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

    public function partisipasi($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/partisipasi',$data);
    }

    public function selesai()
    {
        return view('selesai');
    }
}