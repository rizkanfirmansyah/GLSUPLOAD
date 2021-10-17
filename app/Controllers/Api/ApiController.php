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

use App\Models\Karya;
use App\Models\Pantun;
use App\Models\Puisi;

use App\Models\Video;
use App\Models\Antologi;
use App\Models\Kota;

use App\Models\Media;
use App\Models\Assestment;
use App\Models\Partisipasi;

class ApiController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        dd();
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
            return redirect()->to('peserta/tugas/diorama/' . $nik . '/' . $token)->withInput();
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
        return redirect()->to('/peserta/tugas/karya-tulis/' . $nik . '/' . $token);
    }

    public function karyaTulis()
    {
        // dd($this->request->getFileMultiple('filePuisi'));
        // dd($this->request->getFileMultiple('filePantun'));
        // dd($this->request->getFile());

        if (!$this->validate([
            'fileCerpen' => [
                'rules' => 'max_size[fileCerpen,2048]|uploaded[fileCerpen]|mime_in[fileCerpen,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileCarpon' => [
                'rules' => 'max_size[fileCarpon,2048]|uploaded[fileCarpon]|mime_in[fileCarpon,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileEnglishStory' => [
                'rules' => 'max_size[fileEnglishStory,2048]|uploaded[fileEnglishStory]|mime_in[fileEnglishStory,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileArtikel' => [
                'rules' => 'max_size[fileArtikel,2048]|uploaded[fileArtikel]|mime_in[fileArtikel,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'filePuisi.*' => [
                'rules' => 'max_size[filePuisi,2048]|uploaded[filePuisi]|mime_in[filePuisi,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'filePantun.*' => [
                'rules' => 'max_size[filePantun,2048]|uploaded[filePantun]|mime_in[filePantun,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
        ])) {
            return redirect()->to('peserta/tugas/karya-tulis/' .  $this->request->getVar('prevNik') . '/' .  $this->request->getVar('prevToken'))->withInput();
        }

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
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');
        if (!$this->validate([
            'linkKegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data link kegiatan tidak boleh kosong',
                ]
            ],
            'linkCerita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data link cerita tidak boleh kosong'
                ]
            ],
        ])) {
            return redirect()->to('/peserta/tugas/video/' . $nik . '/' . $token)->withInput();
        }

        // $data = $this->request->getVar();
        $data['video_ids'] = $nik;
        $data['video_token'] = $token;
        $data['video_link_kegiatan'] = $this->request->getVar('linkKegiatan');
        $data['video_link_cerita'] = $this->request->getVar('linkCerita');

        $video = new Video();
        $video->insert($data);
        return redirect()->to('/peserta/tugas/antologi/'.$nik . '/' . $token);
        

    }

    public function antologi()
    {
        $files = $this->request->getFile('fileAntologi');
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');

        if (!$this->validate([
            'judulAntologi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul antologi tidak boleh kosong'
                ]
            ],
            'pengarangAntologi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu pengarang'
                ]
            ],
            'pengarangAntologiJml' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu jumlah peserta'
                ]
            ],
            'jenisBuku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu jenis buku'
                ]
            ],
            'fileAntologi' => [
                'rules' => 'max_size[fileAntologi,2048]|uploaded[fileAntologi]|is_image[fileAntologi]|mime_in[fileAntologi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar peserta terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ]
        ])) {
            return redirect()->to('/peserta/tugas/antologi/'.$nik . '/' . $token)->withInput();
        }


        $filesName = $files->getRandomName();
        $files->move('antologi/' . $nik, $filesName);

        // $data = $this->request->getVar();
        $data['antologi_ids'] = $nik;
        $data['antologi_token'] = $token;
        $data['antologi_cover'] = $filesName;
        $data['antologi_judul'] = $this->request->getVar('judulAntologi');
        $data['antologi_category'] = $this->request->getVar('pengarangAntologi');
        $data['antologi_peserta'] = $this->request->getVar('pengarangAntologiJml');

        $antologi = new Antologi();
        $antologi->insert($data);

        return redirect('/peserta/tugas/literasi-kota/'.$nik . '/' . $token);
        // return redirect('tugas-literasi-kota');
    }

    public function literasiKota()
    {
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');

        if (!$this->validate([
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data kota tidak boleh kosong'
                ]
            ],
        ])) {
            return redirect()->to('/peserta/tugas/literasi-kota/'.$nik . '/' . $token)->withInput();
        }

        // $data = $this->request->getVar();
        $data['kota_ids'] = $nik;
        $data['kota_token'] = $token;
        $data['kota_nama'] = $this->request->getVar('kota');

        $kota = new Kota();
        $kota->insert($data);

        return redirect()->to('/peserta/tugas/literasi-media/'.$nik . '/' . $token);
        // return redirect('tugas-literasi-media');
    }

    public function literasiMedia()
    {

        if (!$this->validate([
            'fileMajalah' => [
                'rules' => 'max_size[fileMajalah,2048]|uploaded[fileMajalah]|mime_in[fileMajalah,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileSsIg' => [
                'rules' => 'max_size[fileSsIg,2048]|uploaded[fileSsIg]|is_image[fileSsIg]|mime_in[fileSsIg,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileSsFb' => [
                'rules' => 'max_size[fileSsFb,2048]|uploaded[fileSsFb]|is_image[fileSsFb]|mime_in[fileSsFb,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileSsYt' => [
                'rules' => 'max_size[fileSsYt,2048]|uploaded[fileSsYt]|is_image[fileSsYt]|mime_in[fileSsYt,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileKegiatanIg' => [
                'rules' => 'max_size[fileKegiatanIg,2048]|uploaded[fileKegiatanIg]|is_image[fileKegiatanIg]|mime_in[fileKegiatanIg,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileKegiatanFb' => [
                'rules' => 'max_size[fileKegiatanFb,2048]|uploaded[fileKegiatanFb]|is_image[fileKegiatanFb]|mime_in[fileKegiatanFb,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileKegiatanWa' => [
                'rules' => 'max_size[fileKegiatanWa,2048]|uploaded[fileKegiatanWa]|is_image[fileKegiatanWa]|mime_in[fileKegiatanWa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileShareInfo' => [
                'rules' => 'max_size[fileShareInfo,2048]|uploaded[fileShareInfo]|is_image[fileShareInfo]|mime_in[fileShareInfo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('peserta/tugas/literasi-media/' .  $this->request->getVar('prevNik') . '/' .  $this->request->getVar('prevToken'))->withInput();
        }
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');

        $fileMajalah = $this->request->getFile('fileMajalah');
        $fileSsIg = $this->request->getFile('fileSsIg');
        $fileSsFb = $this->request->getFile('fileSsFb');
        $fileSsYt = $this->request->getFile('fileSsYt');

        $fileKegiatanIg = $this->request->getFile('fileKegiatanIg');
        $fileKegiatanFb = $this->request->getFile('fileKegiatanFb');
        $fileKegiatanWa = $this->request->getFile('fileKegiatanWa');
        $fileShareInfo = $this->request->getFile('fileShareInfo');

        $nameMajalah = $fileMajalah->getRandomName();
        $nameIg = $fileSsIg->getRandomName();
        $nameFb = $fileSsFb->getRandomName();
        $nameYt = $fileSsYt->getRandomName();
        
        $name_kg = $fileKegiatanIg->getRandomName();
        $name_kb = $fileKegiatanFb->getRandomName();
        $name_ka = $fileKegiatanWa->getRandomName();
        $name_fo = $fileShareInfo->getRandomName();

        $data['media_ids'] = $this->request->getVar('prevNik');
        $data['media_token'] = $this->request->getVar('prevToken');
        $data['media_majalah'] = $nameMajalah;
        $data['media_ssig'] = $nameIg;
        $data['media_ssfb'] = $nameFb;
        $data['media_ssyt'] = $nameYt;
        $data['media_kegiatan_ig'] = $name_kg;
        $data['media_kegiatan_fb'] = $name_kb;
        $data['media_kegiatan_yt'] = $name_ka;
        $data['media_kegiatan_wa'] = $name_fo;

        $media = new Media();
        $media->insert($data);

        $fileMajalah->move('media/' . $this->request->getVar('prevNik'), $nameMajalah);
        $fileSsIg->move('media/' . $this->request->getVar('prevNik'), $nameIg);
        $fileSsFb->move('media/' . $this->request->getVar('prevNik'), $nameFb);
        $fileSsYt->move('media/' . $this->request->getVar('prevNik'), $nameYt);

        $fileKegiatanIg->move('media/' . $this->request->getVar('prevNik'), $name_kg);
        $fileKegiatanFb->move('media/' . $this->request->getVar('prevNik'), $name_kb);
        $fileKegiatanWa->move('media/' . $this->request->getVar('prevNik'), $name_ka);
        $fileShareInfo->move('media/' . $this->request->getVar('prevNik'), $name_fo);

        // return redirect('tugas-literasi-assestment');
        return redirect()->to('/peserta/tugas/literasi-assestment/'.$nik . '/' . $token);
    }

    public function literasiAssestment()
    {
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');

        // $data = $this->request->getVar();
        $data['assestment_ids'] = $nik;
        $data['assestment_token'] = $token;
        $data['assestment_jenis'] = $this->request->getVar('minatBaca');
        $data['assestment_analisa'] = $this->request->getVar('analisaLiterasi');

        $assestment = new Assestment();
        $assestment->insert($data);
        return redirect()->to('/peserta/tugas/partisipasi/' . $nik . '/' . $token);
        // return redirect('tugas-partisipasi');
    }

    public function partisipasi()
    {
        $nik= $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');
        if (!$this->validate([
            'pameranLiterasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu pilihan diatas',
                ]
            ],
            'festivalLiterasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu pilihan diatas'
                ]
            ],
            'kemahLiterasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu pilihan diatas'
                ]
            ],
            'tantanganLiterasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu pilihan diatas'
                ]
            ],
        ])) {
            return redirect()->to('/peserta/tugas/partisipasi/' . $nik . '/' . $token)->withInput();
        }
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
