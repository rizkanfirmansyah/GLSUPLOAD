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
                return redirect()->to('admin/pages/dashboard');
            }else{
                session()->setFlashdata('error', 'Password salah! coba lagi');
                return redirect()->to('admin/pages');
            }
        }
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
        $video = new Pantun();
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

}
