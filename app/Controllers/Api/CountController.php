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
        //
    }

    public function diklat()
    {
        $diklat = new Diklat();
        $query = $diklat->asObject()
            ->where('diklat_ids', $this->request->getVar('nik'))
            ->where('diklat_token', $this->request->getVar('token'))
            ->countAll();

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
            ->where('book_ids', $this->request->getVar('nik'))
            ->where('book_token', $this->request->getVar('token'))
            ->countAll();

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
            ->where('review_ids', $this->request->getVar('nik'))
            ->where('review_token', $this->request->getVar('token'))
            ->countAll();

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
        $query[] = $diorama->asObject()
            ->where('diorama_ids', $this->request->getVar('nik'))
            ->where('diorama_token', $this->request->getVar('token'))
            ->countAll();

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
        $cerpen = $karya->asObject()
            ->selectCount('karya_cerpen', 'cerpen')
            ->where('karya_ids', $this->request->getVar('nik'))
            ->where('karya_token', $this->request->getVar('token'))
            ->countAll();

        $carpon = $karya->asObject()
            ->selectCount('karya_carpon', 'cerpen')
            ->where('karya_ids', $this->request->getVar('nik'))
            ->where('karya_token', $this->request->getVar('token'))
            ->countAll();

        $story = $karya->asObject()
            ->selectCount('karya_story', 'cerpen')
            ->where('karya_ids', $this->request->getVar('nik'))
            ->where('karya_token', $this->request->getVar('token'))
            ->countAll();

        $artikel = $karya->asObject()
            ->selectCount('karya_artikel', 'cerpen')
            ->where('karya_ids', $this->request->getVar('nik'))
            ->where('karya_token', $this->request->getVar('token'))
            ->countAll();
            // ->get();
            // ->findAll();
            
        $puisi = new Puisi();
        $query2 = $puisi->asObject()
            ->where('puisi_ids', $this->request->getVar('nik'))
            ->where('puisi_token', $this->request->getVar('token'))
            ->countAll();

        $pantun = new Pantun();
        $query3 = $pantun->asObject()
            ->where('pantun_ids', $this->request->getVar('nik'))
            ->where('pantun_token', $this->request->getVar('token'))
            ->countAll();

        $results = [
            'status' => 200,
            'data' => [
                'puisi' => $query2,
                'pantun' => $query3,
                'cerpen' => $cerpen,
                'carpon' => $carpon,
                'story' => $story,
                'artikel' => $artikel,
            ],
            'jumlah' => 'Karya Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function video()
    {
        $video = new Video();
        $kegiatan = $video->asObject()
            ->selectCount('video_link_kegiatan')
            ->where('video_ids', $this->request->getVar('nik'))
            ->where('video_token', $this->request->getVar('token'))
            ->countAll();
            
        $cerita = $video->asObject()
            ->selectCount('video_link_cerita')
            ->where('video_ids', $this->request->getVar('nik'))
            ->where('video_token', $this->request->getVar('token'))
            ->countAll();

        $results = [
            'status' => 200,
            'data' => [
                'kegiatan' => $kegiatan,
                'cerita' => $cerita,
            ],
            'jumlah' => 'Video Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function antologi()
    {
        $antologi = new Antologi();
        $query = $antologi->asObject()
            ->where('antologi_ids', $this->request->getVar('nik'))
            ->where('antologi_token', $this->request->getVar('token'))
            ->countAll();

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
            ->where('kota_ids', $this->request->getVar('nik'))
            ->where('kota_token', $this->request->getVar('token'))
            ->countAll();

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
            ->where('media_ids', $this->request->getVar('nik'))
            ->where('media_token', $this->request->getVar('token'))
            ->countAll();

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
        $assestment = new Media();
        $query = $assestment->asObject()
            ->where('assestment_ids', $this->request->getVar('nik'))
            ->where('assestment_token', $this->request->getVar('token'))
            ->countAll();

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
            ->where('partisipasi_ids', $this->request->getVar('nik'))
            ->where('partisipasi_token', $this->request->getVar('token'))
            ->countAll();

        $results = [
            'status' => 200,
            'data' => $query,
            'jumlah' => 'Partisipasi Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }
}
