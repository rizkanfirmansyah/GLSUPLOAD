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
        dd();
    }

    public function auth()
    {
        $session = \Config\Services::session();
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
            // $builder->insert($data);
            session()->setFlashdata('error', 'Username atau Password salah! coba lagi');
            // echo 'fails';
            // return redirect()->to('admin/pages');
            return redirect()->route('pages-admin-login')->withInput();
        } else {
            if (password_verify($this->request->getPost('password'), $user['password'])) {
                $dataset = ['id' => $user['id'], 'username' => $user['username']];
                $session->set($dataset);
                // return redirect()->to('admin/pages/dashboard');
                // return redirect()->to('admin/pages');
                // echo 'sukses';
                return redirect()->route('pages-admin-index');
            } else {
                session()->setFlashdata('error', 'Password salah! coba lagi');
                // echo 'fails';
                // return redirect()->to('admin/pages');
                return redirect()->route('pages-admin-login')->withInput();
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('pages-admin-login');
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

        if ($nik = $resume->asObject()->where('id', $this->request->getVar('id'))->findAll()) {
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
            $resume->delete(['id' => $idPeserta]);
            $result = true;
        } else {
            $result = false;
        }

        return $this->respond($result);
    }

    public function delete_diklat()
    {
        $diklat = new Diklat();
        // $result = $diklat->delete(['id' => $this->request->getVar('id')]);
        if ($newDiklat = $diklat->find($this->request->getVar('id'))) {
            $dir = 'diklat/'.$newDiklat['diklat_ids'].'/'.$newDiklat['diklat_name'];
            // print_r($dir);
            if(file_exists($dir) && ($newDiklat['diklat_name'] != '')){
                unlink($dir);
            }
            $diklat->delete(['id' => $this->request->getVar('id')]);
            // dd();
            $result = true;
        } else {
            $result = false;
        }
        // ($result == true) ? $results = true : $results = false; 

        return $this->respond($result);
    }

    public function delete_book()
    {
        $book = new Book();
        if ($newBook = $book->find($this->request->getVar('id'))) {
            $dir = 'baca-buku/'.$newBook['book_ids'].'/'.$newBook['book_cover'];
            // print_r($dir);
            if(file_exists($dir) && ($newBook['book_cover'] != '')){
                unlink($dir);
            }
            $book->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_review()
    {
        $review = new Review();
        if ($newReview = $review->find($this->request->getVar('id'))) {
            $dir = 'review-buku/'.$newReview['review_ids'].'/'.$newReview['review_cover'];
            // print_r($dir);
            if(file_exists($dir) && ($newReview['review_cover'] != '') ){
                unlink($dir);
            }
            $review->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_antologi()
    {
        $antologi = new Antologi();
        if ($newAntologi = $antologi->find($this->request->getVar('id'))) {
            $dir = 'antologi/'.$newAntologi['antologi_ids'].'/'.$newAntologi['antologi_cover'];
            if(file_exists($dir) && ($newAntologi['antologi_cover'] != '')){
                unlink($dir);
            }
            $antologi->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_diorama()
    {
        $diorama = new Diorama();
        if ($newDiorama = $diorama->find($this->request->getVar('id'))) {
            $dir = 'diorama/'.$newDiorama['diorama_ids'].'/'.$newDiorama['diorama_first'];
            $dirLast = 'diorama/'.$newDiorama['diorama_ids'].'/'.$newDiorama['diorama_last'];
            // print_r($dir);
            if(file_exists($dir) && ($newDiorama['diorama_first'] != '')){
                unlink($dir);
            }
            if(file_exists($dirLast) && ($newDiorama['diorama_last'] != '')){
                unlink($dirLast);
            }
            $diorama->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_karya()
    {
        $karya = new Karya();
        if ($newKarya = $karya->find($this->request->getVar('id'))) {
            delete_files('karya/'.$newKarya['karya_ids'].'/naskah/');
            $karya->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_puisi()
    {
        $puisi = new Puisi();
        if ($newPuisi = $puisi->find($this->request->getVar('id'))) {
            $dir = 'karya/'.$newPuisi['puisi_ids'].'/puisi/'.$newPuisi['puisi_naskah'];
            if(file_exists($dir) && ($newPuisi['puisi_naskah'] != '')){
                unlink($dir);
            }
            $puisi->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_pantun()
    {
        $pantun = new Pantun();
        if ($newPantun = $pantun->find($this->request->getVar('id'))) {
            $dir = 'karya/'.$newPantun['pantun_ids'].'/pantun/'.$newPantun['pantun_naskah'];
            if(file_exists($dir) && ($newPantun['pantun_naskah'] != '')){
                unlink($dir);
            }
            $pantun->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_video()
    {
        $video = new Video();
        if ($video->find($this->request->getVar('id'))) {
            $video->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_kota()
    {
        $kota = new Kota();
        if ($newKota = $kota->find($this->request->getVar('id'))) {
            $dir = 'kota/'.$newKota['kota_ids'].'/'.$newKota['kota_bukti'];
            if(file_exists($dir) && ($newKota['kota_bukti'] != '')){
                unlink($dir);
            }
            $kota->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_media()
    {
        $media = new Media();
        if ($newMedia = $media->find($this->request->getVar('id'))) {
            delete_files('media/'.$newMedia['media_ids'].'/');
            $media->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_assestment()
    {
        $assestment = new Assestment();
        if ($assestment->find($this->request->getVar('id'))) {
            $assestment->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }

    public function delete_partisipasi()
    {
        $partisipasi = new Partisipasi();
        if ($partisipasi->find($this->request->getVar('id'))) {
            $partisipasi->delete(['id' => $this->request->getVar('id')]);
            $result = true;
        } else {
            $result = false;
        }
        return $this->respond($result);
    }
    
}
