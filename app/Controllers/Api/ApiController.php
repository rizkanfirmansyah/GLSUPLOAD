<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;

use App\Models\Resume;
use App\Models\Diklat;
use App\Models\Book;
use App\Models\Review;
use App\Models\Diorama;
use App\Models\Partisipasi;

use App\Models\Karya;
use App\Models\Pantun;
use App\Models\Puisi;

class ApiController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        //
    }

    public function prevNik($nik, $token)
    {

        $resume = new Resume();
        $query = $resume->asObject()
            ->where('resume_ids', $nik)
            ->where('resume_token', $token)
            ->findAll();

        // dd($query);

        $data = [
            'id' => $query[0]->id,
            'resume_name' => $query[0]->resume_name,
            'resume_city' => $query[0]->resume_city,
            'resume_category' => $query[0]->resume_category,
            'resume_subcategory' => $query[0]->resume_subcategory,
            'resume_participant' => $query[0]->resume_participant,
            'resume_status' => $query[0]->resume_status,
            'resume_agency' => $query[0]->resume_agency,
            'resume_agency_address' => $query[0]->resume_agency_address,
            'resume_agency_new' => $query[0]->resume_agency_new,
            'resume_agency_address_new' => $query[0]->resume_agency_address_new,
            'resume_gender' => $query[0]->resume_gender,
            'resume_phone' => $query[0]->resume_phone,
            'resume_email' => $query[0]->resume_email,
            'resume_facebook' => $query[0]->resume_facebook,
            'resume_instagram' => $query[0]->resume_instagram,
            'resume_photo' => $query[0]->resume_photo,
            'resume_suggestion' => $query[0]->resume_suggestion,
            'resume_impression' => $query[0]->resume_impression,
            'created_at' => $query[0]->created_at,
            'updated_at' => $query[0]->updated_at,
        ];

        $results = [
            'status' => 200,
            'data' => $data,
            'msg' => 'Nik Berhasil di dapat'
        ];
        unset($data);

        return $this->setResponseFormat('json')->respond($results);
    }

    public function biodata()
    {
        $id = $this->request->getVar('prevId') ?? '';
        $update = '';
        $trim = false;
        if ($id != '') {
            $trim = true;
            $update = ',id,' . $id . ']';
        } else {
            $update = ']';
        }
        // dd($update);
        if (!$this->validate([
            'resume_ids' => [
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required' => 'Data nik tidak boleh kosong',
                    'min_length' => 'NIK tidak valid 16 digit'
                ]
            ],
            'resume_token' => [
                'rules' => 'required|min_length[12]',
                'errors' => [
                    'required' => 'Data token tidak boleh kosong'
                ]
            ],
            'resume_city' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data kota tidak boleh kosong'
                ]
            ],
            'resume_category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu kategori'
                ]
            ],
            'resume_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu status GLN'
                ]
            ],
            'resume_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama Lengkap'
                ]
            ],
            'resume_phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nomor telepon'
                ]
            ],
            'resume_email' => [
                'rules' => 'required|is_unique[resume.resume_email' . $update,
                'errors' => [
                    'required' => 'Masukkan email anda',
                    'is_unique' => 'Email {field} telah digunakan',
                ]
            ],
            'resume_photo' => [
                'rules' => 'max_size[resume_photo,2048]|uploaded[resume_photo]|is_image[resume_photo]|mime_in[resume_photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar peserta terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/peserta/biodata')->withInput();
            return redirect()->back()->withInput();
            // return redirect()->to('peserta/biodata/'.$this->request->getVar('token'))->withInput();
        }

        $fileGambar = $this->request->getFile('resume_photo');
        $nameImage = $fileGambar->getRandomName();
        $fileGambar->move('img/' . $this->request->getVar('resume_ids'), $nameImage);

        $data = $this->request->getVar();
        $data['resume_photo'] = $nameImage;
        $resume = new Resume();
        if ($trim == true) {
            $resume->update($id, $data);
        } else {
            unset($data['prevId']);
            $resume->insert($data);
        }
        $nik = $this->request->getVar('resume_ids');
        $token = $this->request->getVar('resume_token');
        return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
        // return redirect()->route('tugas-diklat');
        // return redirect('tugas-diklat')->back()->withInput();
    }

    public function diklat()
    {
        $error = 0;

        $nik = $this->request->getVar('prevId');
        $token = $this->request->getVar('prevToken');
        foreach ($_FILES['fileDiklat']['tmp_name'] as $key => $tmp_name) {
            $file_size = $_FILES['fileDiklat']['size'][$key];
            if ($file_size < 1) {
                session()->setFlashdata('error', 'Pilih file terlebih dahulu');
                return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
            } elseif (!$file_size) {
                session()->setFlashdata('error', 'File melebihi batas maksimum');
                return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
            }
        }

        $files = $this->request->getFileMultiple('fileDiklat');

        foreach ($files as $file) {
            if ($file->getClientMimeType() != "application/pdf") {
                session()->setFlashdata('error', 'Ekstensi file tidak didukung, ekstensi harus .pdf dan coba lagi');
                return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
            }
            $name = $file->getRandomName();
            $data[] = [
                'diklat_ids'     => $this->request->getVar('prevId'),
                'diklat_token'   => $this->request->getVar('prevToken'),
                'diklat_name'    => $name,
            ];
            $file->move('diklat/' . $this->request->getVar('prevId'), $name);
        }
        $diklat = new Diklat();
        $diklat->insertBatch($data);
        // dd($data);
        return redirect()->to('/peserta/tugas/baca-buku/' . $nik . '/' . $token);
    }

    public function bacaBuku()
    {
        if ($this->request->isAJAX()) {
            // print_r($this->request->getVar());
            // print_r($this->request->getFiles());
            $files = $this->request->getFile('fileCover');
            $nik = $this->request->getVar('nik');
            $token = $this->request->getVar('token');

            $filesName = $files->getRandomName();
            $files->move('baca-buku/' . $nik, $filesName);

            // $data = $this->request->getVar();
            $data['book_ids'] = $nik;
            $data['book_token'] = $token;
            $data['book_author'] = $this->request->getVar('pengarangBuku');
            $data['book_publisher'] = $this->request->getVar('penerbitBuku');
            $data['book_year'] = $this->request->getVar('tahunBuku');
            $data['book_page'] = $this->request->getVar('halamanBuku');
            $data['book_cover'] = $filesName;

            $book = new Book();
            $book->insert($data);
            // return redirect()->to('/peserta/tugas/baca-buku/'.$nik.'/'.$token);
            $results = [
                'status' => 200,
                'msg' => 'Data Berhasil Disimpan !!'
            ];
            unset($data);

            return $this->setResponseFormat('json')->respond($results);
        } else {
            $results = [
                'status' => 400,
                'msg' => 'Opps'
            ];
            return $this->setResponseFormat('json')->respond($results);
        }
    }

    public function reviewBuku()
    {
        if ($this->request->isAJAX()) {
            // print_r($this->request->getVar());
            // print_r($this->request->getFiles());
            $files = $this->request->getFile('fileReview');
            $nik = $this->request->getVar('nik');
            $token = $this->request->getVar('token');

            $filesName = $files->getRandomName();
            $files->move('review-buku/' . $nik, $filesName);

            // $data = $this->request->getVar();
            $data['review_ids'] = $nik;
            $data['review_token'] = $token;
            $data['review_category'] = $this->request->getVar('jenisReviewBuku');
            $data['review_cover'] = $filesName;

            $review = new Review();
            $review->insert($data);
            // return redirect()->to('/peserta/tugas/baca-buku/'.$nik.'/'.$token);
            $results = [
                'status' => 200,
                'msg' => 'Data Berhasil Disimpan !!'
            ];
            unset($data);

            return $this->setResponseFormat('json')->respond($results);
        } else {
            $results = [
                'status' => 400,
                'msg' => 'Opps'
            ];
            return $this->setResponseFormat('json')->respond($results);
        }
    }

    public function diorama()
    {
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');
        if (!$this->validate([
            'filePhotoAwal' => [
                'rules' => 'max_size[filePhotoAwal,2048]|uploaded[filePhotoAwal]|is_image[filePhotoAwal]|mime_in[filePhotoAwal,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'filePhotoAkhir' => [
                'rules' => 'max_size[filePhotoAkhir,2048]|uploaded[filePhotoAkhir]|is_image[filePhotoAkhir]|mime_in[filePhotoAkhir,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('peserta/tugas/diorama/'. $nik . '/' . $token)->withInput();
        }
        $filesFirst = $this->request->getFile('filePhotoAwal');
        $filesLast = $this->request->getFile('filePhotoAkhir');

        $filesNameFirst = $filesFirst->getRandomName();
        $filesNameLast = $filesLast->getRandomName();

        $filesFirst->move('diorama/' . $nik, $filesNameFirst);
        $filesLast->move('diorama/' . $nik, $filesNameLast);

        $data['diorama_ids'] = $nik;
        $data['diorama_token'] = $token;
        $data['diorama_first'] = $filesNameFirst;
        $data['diorama_last'] = $filesNameLast;

        $diorama = new Diorama();
        $diorama->insert($data);
        // dd($data);
        return redirect()->to('/peserta/tugas/karya-tulis/' . $nik . '/' . $token);
    }

    public function karyaTulis()
    {
        // dd($this->request->getFileMultiple('filePuisi'));
        // dd($this->request->getFileMultiple('filePantun'));
        // dd($this->request->getFile());
        $filesPuisi = $this->request->getFileMultiple('filePuisi');
        $filesPantun = $this->request->getFileMultiple('filePantun');

        $filesCerpen = $this->request->getFile('fileCerpen');
        $filesCarpon = $this->request->getFile('fileCarpon');
        $filesStory = $this->request->getFile('fileEnglishStory');
        $filesArtikel = $this->request->getFile('fileArtikel');

        $data['karya_ids'] = $this->request->getVar('prevNik');
        $data['karya_token'] = $this->request->getVar('prevToken');
        $data['karya_cerpen'] = $filesCerpen;
        $data['karya_carpon'] = $filesCarpon;
        $data['karya_story'] = $filesStory;
        $data['karya_artikel'] = $filesArtikel;

        $karya = new Karya();
        $karya->insert($data);
        $karya_id = $karya->getInsertID();

        $nameCerpen = $filesCerpen->getRandomName();
        $filesCerpen->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameCerpen);

        $nameCarpon = $filesCarpon->getRandomName();
        $filesCarpon->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameCarpon);

        $nameStory = $filesStory->getRandomName();
        $filesStory->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameStory);

        $nameArtikel = $filesArtikel->getRandomName();
        $filesArtikel->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameArtikel);

        // unset($data);

        foreach ($filesPuisi as $file) {
            $name = $file->getRandomName();
            $data2[] = [
                'puisi_ids'     => $this->request->getVar('prevNik'),
                'puisi_token'   => $this->request->getVar('prevToken'),
                'karya_id'    => $karya_id,
                'puisi_naskah'    => $name,
            ];
            $file->move('karya/' . $this->request->getVar('prevNik') . '/puisi', $name);
        }

        $puisi = new Puisi();
        $puisi->insertBatch($data2);
        // unset($data2);

        foreach ($filesPantun as $file) {
            $name = $file->getRandomName();
            $data3[] = [
                'pantun_ids'     => $this->request->getVar('prevNik'),
                'pantun_token'   => $this->request->getVar('prevToken'),
                'karya_id'    => $karya_id,
                'pantun_naskah'    => $name,
            ];
            $file->move('karya/' . $this->request->getVar('prevNik') . '/pantun', $name);
        }

        $pantun = new Pantun();
        $pantun->insertBatch($data3);
        // unset($data3);

        // dd($data);
        return redirect()->to('/peserta/tugas/video/' . $this->request->getVar('prevNik') . '/' . $this->request->getVar('prevToken'));
        // return redirect('tugas-video');
    }

    public function video()
    {
        return redirect('tugas-antologi');
    }

    public function antologi()
    {
        return redirect('tugas-literasi-kota');
    }

    public function literasiKota()
    {
        return redirect('tugas-literasi-media');
    }

    public function literasiMedia()
    {
        return redirect('tugas-literasi-assestment');
    }

    public function literasiAssestment()
    {
        return redirect('tugas-partisipasi');
    }

    public function partisipasi()
    {

        $data['partisipasi_ids'] = $this->request->getVar('prevNik');
        $data['partisipasi_token'] = $this->request->getVar('prevToken');
        $data['partisipasi_pameran'] = $this->request->getVar('pameranLiterasi');
        $data['partisipasi_festival'] = $this->request->getVar('festivalLiterasi');
        $data['partisipasi_kemah'] = $this->request->getVar('kemahLiterasi');
        $data['partisipasi_tantangan'] = $this->request->getVar('tantanganLiterasi');

        $partisipasi = new Partisipasi();
        $partisipasi->insert($data);

        // dd($data);
        // return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
        return redirect('selesai');
    }
}
