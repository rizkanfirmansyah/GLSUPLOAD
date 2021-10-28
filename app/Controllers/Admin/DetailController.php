<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Resume;

use App\Models\Diklat;
use App\Models\Antologi;
use App\Models\Book;
use App\Models\Review;
use App\Models\Diorama;

use App\Models\Karya;
use App\Models\Puisi;
use App\Models\Pantun;

use App\Models\Video;

use App\Models\Kota;
use App\Models\Media;
use App\Models\Assestment;

use App\Models\Partisipasi;

class DetailController extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        //
    }

    public function biodata($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }
        $biodata = new Resume();
        $results = $biodata->asObject()
            ->where('resume_ids', strval($nik))
            ->where('resume_token', $token)
            ->findAll();

        $data = [
            'biodata' => $results,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/biodata', $data);
    }

    public function diklat($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $diklat = new Diklat();
        $results = $diklat->asObject()
            ->where('diklat_ids', strval($nik))
            ->where('diklat_token', $token)
            ->findAll();

        $data = [
            'diklat' => $results,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/diklat', $data);
    }

    public function antologi($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $antologi = new Antologi();
        $results = $antologi->asObject()
            ->where('antologi_ids', strval($nik))
            ->where('antologi_token', $token)
            ->findAll();

        $data = [
            'antologi' => $results,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/antologi', $data);
    }

    public function book($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $book = new Book();
        $results = $book->asObject()
            ->where('book_ids', strval($nik))
            ->where('book_token', $token)
            ->findAll();

        $review = new Review();
        $resultsReview = $review->asObject()
            ->where('review_ids', strval($nik))
            ->where('review_token', $token)
            ->findAll();

        $data = [
            'book' => $results,
            'review' => $resultsReview,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/book', $data);
    }

    public function diorama($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $diorama = new Diorama();
        $results = $diorama->asObject()
            ->where('diorama_ids', strval($nik))
            ->where('diorama_token', $token)
            ->findAll();

        $data = [
            'diorama' => $results,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/diorama', $data);
    }

    public function karya($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $karya = new Karya();
        $results = $karya->asObject()
            ->where('karya_ids', strval($nik))
            ->where('karya_token', $token)
            ->findAll();

        $puisi = new Puisi();
        $resultsPuisi = $puisi->asObject()
            ->where('puisi_ids', strval($nik))
            ->where('puisi_token', $token)
            ->findAll();

        $pantun = new Pantun();
        $resultsPantun = $pantun->asObject()
            ->where('pantun_ids', strval($nik))
            ->where('pantun_token', $token)
            ->findAll();

        $data = [
            'karya' => $results,
            'puisi' => $resultsPuisi,
            'pantun' => $resultsPantun,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/karya', $data);
    }

    public function video($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $video = new Video();
        $results = $video->asObject()
            ->where('video_ids', strval($nik))
            ->where('video_token', $token)
            ->findAll();

        $data = [
            'video' => $results,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/video', $data);
    }

    public function literasi($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $kota = new Kota();
        $results = $kota->asObject()
            ->where('kota_ids', strval($nik))
            ->where('kota_token', $token)
            ->findAll();

        $media = new Media();
        $resultsMedia = $media->asObject()
            ->where('media_ids', strval($nik))
            ->where('media_token', $token)
            ->findAll();

        $assestment = new Assestment();
        $resultsAssestment = $assestment->asObject()
            ->where('assestment_ids', strval($nik))
            ->where('assestment_token', $token)
            ->findAll();

        $data = [
            'kota' => $results,
            'media' => $resultsMedia,
            'assestment' => $resultsAssestment,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/literasi', $data);
    }

    public function partisipasi($nik, $token)
    {
         if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }

        $partisipasi = new Partisipasi();
        $results = $partisipasi->asObject()
            ->where('partisipasi_ids', strval($nik))
            ->where('partisipasi_token', $token)
            ->findAll();

        $data = [
            'partisipasi' => $results,
            'nik' => $nik,
            'token' => $token,
        ];
        return view('Admin/Details/partisipasi', $data);
    }
}