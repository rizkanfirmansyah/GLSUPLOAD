<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;

use App\Models\Diklat;
use App\Models\Book;
use App\Models\Review;
use App\Models\Diorama;

use App\Models\Karya;
use App\Models\Pantun;
use App\Models\Puisi;

use App\Models\Video;
use App\Models\Antologi;

use App\Models\Kota;
use App\Models\Media;
use App\Models\Assestment;
use App\Models\Partisipasi;

class CountController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        dd();
    }

    public function diklat()
    {
        $diklat = new Diklat();
        $query = $diklat->asObject()
            // ->countAllResults()
            ->where('diklat_ids', strval($this->request->getVar('nik')))
            ->where('diklat_token', strval($this->request->getVar('token')))
            ->countAllResults();

            // d($query);

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Diklat Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function book()
    {
        $book = new Book();
        $query = $book->asObject()
            ->where('book_ids', strval($this->request->getVar('nik')))
            ->where('book_token', strval($this->request->getVar('token')))
            ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Buku Baca Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function review()
    {
        $review = new Review();
        $query = $review->asObject()
            ->where('review_ids', strval($this->request->getVar('nik')))
            ->where('review_token', strval($this->request->getVar('token')))
            ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Buku Review Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function diorama()
    {
        $diorama = new Diorama();
        $query = $diorama->asArray()
            ->where('diorama_ids', strval($this->request->getVar('nik')))
            ->where('diorama_token', strval($this->request->getVar('token')))
            ->findAll();
            // ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Diorama Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function karya()
    {
        $karya = new Karya();
        $resultKarya = $karya->asObject()
            // ->select('id')
            // ->selectCount('karya_cerpen')
            // ->selectCount('karya_carpon')
            // ->selectCount('karya_story')
            // ->selectCount('karya_artikel')
            // ->where('id', '2')
            ->where('karya_ids', strval($this->request->getVar('nik')))
            ->where('karya_token', strval($this->request->getVar('token')))
            ->findAll();
            
        $puisi = new Puisi();
        $resultPuisi = $puisi->asObject()
            ->where('puisi_ids', strval($this->request->getVar('nik')))
            ->where('puisi_token', strval($this->request->getVar('token')))
            ->findAll();

        $pantun = new Pantun();
        $resultPantun = $pantun->asObject()
            ->where('pantun_ids', strval($this->request->getVar('nik')))
            ->where('pantun_token', strval($this->request->getVar('token')))
            ->findAll();

        $results = [
            'status' => 200,
            'data' => [
                'puisi' => $resultPuisi,
                'pantun' => $resultPantun,
                'karya' => $resultKarya,
            ],
            'jumlah' => 'Karya Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function video()
    {
        $video = new Video();
        $kegiatan = $video->asArray()
            // ->selectCount('video_link_kegiatan')
            ->where('video_ids', strval($this->request->getVar('nik')))
            ->where('video_token', strval($this->request->getVar('token')))
            ->findAll();
            // ->countAllResults();
            
        // $cerita = $video->asArray()
        //     // ->selectCount('video_link_cerita')
        //     ->where('video_ids', strval($this->request->getVar('nik')))
        //     ->where('video_token', strval($this->request->getVar('token')))
        //     ->findAll();
            // ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $kegiatan,
            'jumlah' => 'Video Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function antologi()
    {
        $antologi = new Antologi();
        $query = $antologi->asObject()
            ->where('antologi_ids', strval($this->request->getVar('nik')))
            ->where('antologi_token', strval($this->request->getVar('token')))
            ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Antologi Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function kota()
    {
        $kota = new Kota();
        $query = $kota->asObject()
            ->where('kota_ids', strval($this->request->getVar('nik')))
            ->where('kota_token', strval($this->request->getVar('token')))
            ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Kota Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function media()
    {
        $media = new Media();
        $query = $media->asObject()
            ->where('media_ids', strval($this->request->getVar('nik')))
            ->where('media_token', strval($this->request->getVar('token')))
            ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Media Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function assestment()
    {
        $assestment = new Assestment();
        $query = $assestment->asObject()
            ->where('assestment_ids', strval($this->request->getVar('nik')))
            ->where('assestment_token', strval($this->request->getVar('token')))
            ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Assestment Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function partisipasi()
    {
        $partisipasi = new Partisipasi();
        $query = $partisipasi->asObject()
            ->where('partisipasi_ids', strval($this->request->getVar('nik')))
            ->where('partisipasi_token', strval($this->request->getVar('token')))
            ->countAllResults();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Partisipasi Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }
}
