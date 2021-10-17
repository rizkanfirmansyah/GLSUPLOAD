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
    
    public function video($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/video',$data);
    }

    public function antologi($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/antologi',$data);
    }

    public function literasiKota($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/literasi-kota',$data);
    }

    public function literasiMedia($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/literasi-media',$data);
    }

    public function literasiAssestment($nik,$token)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Tugas/literasi-assestment',$data);
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