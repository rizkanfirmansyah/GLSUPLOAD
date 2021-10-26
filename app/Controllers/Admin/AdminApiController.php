<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

use App\Models\Diklat;
use App\Models\Book;
use App\Models\Review;
use App\Models\Antologi;
use App\Models\Diorama;
use App\Models\Karya;
use App\Models\Puisi;
use App\Models\Pantun;
use App\Models\Video;
use App\Models\Kota;
use App\Models\Media;
use App\Models\Assestment;
use App\Models\Partisipasi;

use App\Models\Resume;

class AdminApiController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //
    }

    public function auth()
    {
        $userModel = new \App\Models\User();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $data = [
            'username' => 'admin',
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('username'),
        ];

        $user = $userModel->where('email', $data['email'])->first();


        if ($user === null) {
            $builder->insert($data);
        }else{
            if (password_verify($this->request->getPost('password'), $user['password'])) {
                $session = ['id' => $user['id'], 'username' => $user['username']];
                // return redirect()->to('admin/pages/dashboard');
                // return redirect()->to('admin/pages');
                // echo 'sukses';
                return redirect()->route('pages-admin-index');
            }else{
                session()->setFlashdata('error', 'Password salah! coba lagi');
                // echo 'fails';
                // return redirect()->to('admin/pages');
                return redirect()->route('pages-admin-login')->withInput();
            }
        }
    }

    public function delete_peserta()
    {
        $resume = new Resume();
        $diklat = new Diklat();
        $book = new Book();
        $review = new Review();
        $antologi = new Antologi();
        $diorama = new Diorama();
        $karya = new Karya();
        $puisi = new Puisi();
        $pantun = new Pantun();
        $video = new Video();
        $kota = new Kota();
        $media = new Media();
        $assestment = new Assestment();
        $partisipasi = new Partisipasi();

        if($nik = $resume->asObject()->where('id',$this->request->getVar('id'))->findAll()){
            // echo $resume->resume_ids;
            // print_r($nik[0]->resume_ids);
            $idPeserta = $nik[0]->id;
            $nikPeserta = $nik[0]->resume_ids;
            $tokenPeserta = $nik[0]->resume_token;

            $diklat->delete(['diklat_ids' => $nikPeserta, 'diklat_token' => $tokenPeserta]);
            // // sleep(1);
            $book->delete(['book_ids' => $nikPeserta, 'book_token' => $tokenPeserta]);
            // // sleep(1);
            $review->delete(['review_ids' => $nikPeserta, 'review_token' => $tokenPeserta]);
            // // sleep(1);
            $diorama->delete(['diorama_ids' => $nikPeserta, 'diorama_token' => $tokenPeserta]);
            // // sleep(1);
            $karya->delete(['karya_ids' => $nikPeserta, 'karya_token' => $tokenPeserta]);
            // // sleep(1);
            $puisi->delete(['puisi_ids' => $nikPeserta, 'puisi_token' => $tokenPeserta]);
            // // sleep(1);
            $pantun->delete(['pantun_ids' => $nikPeserta, 'pantun_token' => $tokenPeserta]);
            // // sleep(1);
            $video->delete(['video_ids' => $nikPeserta, 'video_token' => $tokenPeserta]);
            // // sleep(1);
            $kota->delete(['kota_ids' => $nikPeserta, 'kota_token' => $tokenPeserta]);
            // // sleep(1);
            $media->delete(['media_ids' => $nikPeserta, 'media_token' => $tokenPeserta]);
            // // sleep(1);
            $assestment->delete(['assestment_ids' => $nikPeserta, 'assestment_token' => $tokenPeserta]);
            // // sleep(1);
            $partisipasi->delete(['partisipasi_ids' => $nikPeserta, 'partisipasi_token' => $tokenPeserta]);
            sleep(2);
            $resume->delete(['id' => $idPeserta ]);
            $result = true;
        }else{
            $result = false;
        }

        return $this->respond($result);
    }

    public function delete_diklat()
    {

        $diklat = new Diklat();
        // $result = $diklat->delete(['id' => $this->request->getVar('id')]);
        if($diklat->find($this->request->getVar('id'))){
            $diklat->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        // ($result == true) ? $results = true : $results = false; 

        return $this->respond($result);

    }

    public function delete_book()
    {
        $book = new Book();
        if($book->find($this->request->getVar('id'))){
            $book->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_review()
    {
        $review = new Review();
        if($review->find($this->request->getVar('id'))){
            $review->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_antologi()
    {
        $antologi = new Antologi();
        if($antologi->find($this->request->getVar('id'))){
            $antologi->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_diorama()
    {
        $diorama = new Diorama();
        if($diorama->find($this->request->getVar('id'))){
            $diorama->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_karya()
    {
        $karya = new Karya();
        if($karya->find($this->request->getVar('id'))){
            $karya->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_puisi()
    {
        $puisi = new Puisi();
        if($puisi->find($this->request->getVar('id'))){
            $puisi->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_pantun()
    {
        $pantun = new Pantun();
        if($pantun->find($this->request->getVar('id'))){
            $pantun->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_video()
    {
        $video = new Video();
        if($video->find($this->request->getVar('id'))){
            $video->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_kota()
    {
        $kota = new Kota();
        if($kota->find($this->request->getVar('id'))){
            $kota->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_media()
    {
        $media = new Media();
        if($media->find($this->request->getVar('id'))){
            $media->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_assestment()
    {
        $assestment = new Assestment();
        if($assestment->find($this->request->getVar('id'))){
            $assestment->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_partisipasi()
    {
        $partisipasi = new Partisipasi();
        if($partisipasi->find($this->request->getVar('id'))){
            $partisipasi->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        }else{
            $result = false;
        }
        return $this->respond($result);
    }

}
