<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

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

class KelengkapanController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        return view('Kelengkapan/index');
    }

    public function cek()
    {
        // echo 'ok';

        $nik = $this->request->getVar('nik');
        $token = $this->request->getVar('token');

        $diklat = new Diklat();
        $resultDiklat = $diklat->asArray()
                ->where('diklat_ids', strval($nik))
                ->where('diklat_token', $token)
                ->findAll();

        $book = new Book();
        $resultBook = $book->asArray()
                ->where('book_ids', strval($nik))
                ->where('book_token', $token)
                ->findAll();

        $review = new Review();
        $resultReview = $review->asArray()
                ->where('review_ids', strval($nik))
                ->where('review_token', $token)
                ->findAll();

        $diorama = new Diorama();
        $resultDiorama = $diorama->asArray()
                ->where('diorama_ids', strval($nik))
                ->where('diorama_token', $token)
                ->findAll();

        $karya = new Karya();
        $resultKarya = $karya->asArray()
                ->where('karya_ids', strval($nik))
                ->where('karya_token', $token)
                ->findAll();

        $pantun = new Pantun();
        $resultPantun = $pantun->asArray()
                ->where('pantun_ids', strval($nik))
                ->where('pantun_token', $token)
                ->findAll();

        $puisi = new Puisi();
        $resultPuisi = $puisi->asArray()
                ->where('puisi_ids', strval($nik))
                ->where('puisi_token', $token)
                ->findAll();

        $video = new Video();
        $resultVideo= $video->asArray()
                ->where('video_ids', strval($nik))
                ->where('video_token', $token)
                ->findAll();

        $antologi = new Antologi();
        $resultAntologi = $antologi->asArray()
                ->where('antologi_ids', strval($nik))
                ->where('antologi_token', $token)
                ->findAll();

        $kota = new Kota();
        $resultKota = $kota->asArray()
                ->where('kota_ids', strval($nik))
                ->where('kota_token', $token)
                ->findAll();

        $media = new Media();
        $resultMedia = $media->asArray()
                ->where('media_ids', strval($nik))
                ->where('media_token', $token)
                ->findAll();

        $assestment = new Assestment();
        $resultAssestment = $assestment->asArray()
                ->where('assestment_ids', strval($nik))
                ->where('assestment_token', $token)
                ->findAll();

        $partisipasi = new Partisipasi();
        $resultPartisipasi = $partisipasi->asArray()
                ->where('partisipasi_ids', strval($nik))
                ->where('partisipasi_token', $token)
                ->findAll();

        $results = [
            'status' => 200,
            'data' => [
                'diklat' => $resultDiklat,
                'book' => $resultBook,
                'review' => $resultReview,
                'diorama' => $resultDiorama,
                'karya' => $resultKarya,
                'pantun' => $resultPantun,
                'puisi' => $resultPuisi,
                'video' => $resultVideo,
                'antologi' => $resultAntologi,
                'kota' => $resultKota,
                'media' => $resultMedia,
                'assestment' => $resultAssestment,
                'partisipasi' => $resultPartisipasi,
            ],
            'msg' => 'success',
        ];
        return $this->setResponseFormat('json')->respond($results);
    }
}
