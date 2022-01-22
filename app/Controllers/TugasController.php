<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Resume;

class TugasController extends BaseController
{
    public function index()
    {
        return redirect()->route('biodata-peserta');
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
        // if (session('username') == null) {
        //     return redirect()->to('admin/login');
        //     die;
        // }

        $biodata = new Resume();
        $results = $biodata->asObject()
            ->where('resume_ids', strval($nik))
            ->where('resume_token', $token)
            ->findAll();

        $data = [
            'validation' => \Config\Services::validation(),
            'nik' => $nik,
            'token' => $token,
            'status'=> $results
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