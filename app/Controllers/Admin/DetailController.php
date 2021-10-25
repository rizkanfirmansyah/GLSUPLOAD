<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Diklat;
use App\Models\Antologi;
use App\Models\Book;
use App\Models\Review;

class DetailController extends BaseController
{
    public function index()
    {
        //
    }

    public function diklat($nik,$token){

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
        return view('Admin/Details/diklat',$data);

    }

    public function antologi($nik,$token){

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
        return view('Admin/Details/antologi',$data);

    }
    
    public function book($nik,$token){

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
        return view('Admin/Details/book',$data);

    }

}
