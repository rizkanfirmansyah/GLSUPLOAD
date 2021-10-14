<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class ApiController extends BaseController
{
    public function index()
    {
        //
    }

    public function biodata(){
        return redirect('tugas-diklat');
    }

    public function diklat(){
        return redirect('tugas-baca-buku');
    }

    public function diorama(){
        return redirect('tugas-karya-tulis');
    }

    public function karyaTulis(){
        return redirect('tugas-video');
    }

    public function video(){
        return redirect('tugas-antologi');
    }

    public function antologi(){
        return redirect('tugas-literasi-kota');
    }

    public function literasiKota(){
        return redirect('tugas-literasi-media');
    }

    public function literasiMedia(){
        return redirect('tugas-literasi-assestment');
    }

    public function literasiAssestment(){
        return redirect('tugas-partisipasi');
    }

    public function partisipasi(){
        return redirect('selesai');
    }

}
