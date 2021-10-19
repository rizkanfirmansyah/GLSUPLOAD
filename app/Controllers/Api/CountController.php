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

    // Belum Beres Ambil Count data karya_carpon dan karya_cerpen di table karya
    public function karya()
    {
        $karya = new Karya();
        $cerpen = $karya->asObject()
            ->selectCount('karya_cerpen')
            ->where('karya_ids', $this->request->getVar('nik'))
            ->where('karya_token', $this->request->getVar('token'))
            ->get();
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
                'cerpen' => $cerpen
            ],
            'jumlah' => 'Karya Berhasil di dapat'
        ];
        unset($query);

        return $this->setResponseFormat('json')->respond($results);
    }
}
