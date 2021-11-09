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

        $data = [
            'id' => $query[0]->id,
            'resume_ids' => $query[0]->resume_ids,
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
                'rules' => 'max_size[resume_photo,2048]|is_image[resume_photo]|mime_in[resume_photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar peserta terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->back()->withInput();
            // return redirect()->to('peserta/biodata/'.$this->request->getVar('token'))->withInput();
        }

        if($trim == true){
            delete_files('img/'.$this->request->getVar('resume_ids'));
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
    }

    public function diklat()
    {
        // $error = 0;

        if($this->request->isAJAX()){

            $nik = $this->request->getVar('prevId');
            $token = $this->request->getVar('prevToken');
            $files = $this->request->getFile('fileDiklat');

            if (!$this->validate([
                    'fileDiklat' => [
                        'rules' => 'max_size[fileDiklat,2048]|mime_in[fileDiklat,image/jpg,image/jpeg,image/png,application/pdf]',
                        'errors' => [
                            'max_size' => 'Ukuran gambar/file terlalu besar, pilih kurang dari 2MB',
                            'uploaded' => 'Pilih gambar/file untuk diupload terlebih dahulu',
                            'mime_in' => 'File bukan gambar/pdf',
                        ]
                    ],
                ])) {
                // return redirect()->to('peserta/tugas/diklat/' . $nik . '/' . $token)->withInput();
                $results = [
                    'status' => 500,
                    'msg' => 'Error, Cek Kembali File Anda Lihat Deskripsi'
                ];
                return $this->setResponseFormat('json')->respond($results);
            }
            if ($files != '') {
                $name = $files->getRandomName();
                $data = [
                    'diklat_ids'     => $nik,
                    'diklat_token'   => $token,
                    'diklat_name'    => $name,
                ];

                $files->move('diklat/' . $nik, $name);
                $diklat = new Diklat();
                $diklat->insert($data);
                $results = [
                    'status' => 200,
                    'msg' => 'Data Berhasil Disimpan !!'
                ];
                unset($data);
            }
            return $this->setResponseFormat('json')->respond($results);
        } else {
            $results = [
                'status' => 400,
                'msg' => 'Opps'
            ];
            return $this->setResponseFormat('json')->respond($results);
        }

        // $nik = $this->request->getVar('prevId');
        // $token = $this->request->getVar('prevToken');
        // // foreach ($_FILES['fileDiklat']['tmp_name'] as $key => $tmp_name) {
        // //     $file_size = $_FILES['fileDiklat']['size'][$key];
        // //     if ($file_size < 1) {
        // //         session()->setFlashdata('error', 'Pilih file terlebih dahulu');
        // //         return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
        // //     } elseif (!$file_size) {
        // //         session()->setFlashdata('error', 'File melebihi batas maksimum');
        // //         return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
        // //     }
        // // }

        // $files = $this->request->getFileMultiple('fileDiklat');

        // if ($files != '') {
        //     foreach ($files as $file) {
        //         // if ($file->getClientMimeType() != "application/pdf") {
        //         //     session()->setFlashdata('error', 'Ekstensi file tidak didukung, ekstensi harus .pdf dan coba lagi');
        //         //     return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
        //         // }
        //         $name = $file->getRandomName();
        //         $data[] = [
        //             'diklat_ids'     => $this->request->getVar('prevId'),
        //             'diklat_token'   => $this->request->getVar('prevToken'),
        //             'diklat_name'    => $name,
        //         ];
        //         if ($file != '') {
        //             // $file->move('diklat/' . $this->request->getVar('prevId'), $name);
        //         }
        //     }
        //     $diklat = new Diklat();
        //     if($files[0] != ''){
        //         // $diklat->insertBatch($data);
        //     }
        // }
        // // dd($data);
        // // return redirect()->to('/peserta/tugas/baca-buku/' . $nik . '/' . $token);
        // $result = [
        //     'msg' => 'data berhasil di simpan',
        // ];
        // // $results = $this->setResponseFormat('json')->respond($result);

        // // return redirect()->back()->with('ok','iya');
    }

    public function bacaBuku()
    {
        if ($this->request->isAJAX()) {
            // print_r($this->request->getVar());
            // print_r($this->request->getFiles());
            $nik = $this->request->getVar('nik');
            $token = $this->request->getVar('token');

            if (!$this->validate([
                'fileCover' => [
                    'rules' => 'max_size[fileCover,2048]|is_image[fileCover]|mime_in[fileCover,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                        // 'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                        'is_image' => 'File bukan gambar',
                        'mime_in' => 'File bukan gambar',
                        ]
                    ],
                ])) {
                // return redirect()->to('peserta/tugas/diklat/' . $nik . '/' . $token)->withInput();
                $results = [
                    'status' => 500,
                    'msg' => 'Error, Cek Kembali Cover Anda Lihat Deskripsi'
                ];
                return $this->setResponseFormat('json')->respond($results);
            }

            $files = $this->request->getFile('fileCover') ?? '';

            if ($files != '') {
                $filesName = $files->getRandomName();
                $files->move('baca-buku/' . $nik, $filesName);
            }

            // $data = $this->request->getVar();
            $data['book_ids'] = $nik;
            $data['book_token'] = $token;
            $data['book_author'] = $this->request->getVar('pengarangBuku');
            $data['book_publisher'] = $this->request->getVar('penerbitBuku');
            $data['book_year'] = $this->request->getVar('tahunBuku');
            $data['book_page'] = $this->request->getVar('halamanBuku');
            $data['book_cover'] = $filesName ?? '';

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
            $nik = $this->request->getVar('nik');
            $token = $this->request->getVar('token');

            if (!$this->validate([
                'fileReview' => [
                    'rules' => 'max_size[fileReview,2048]|is_image[fileReview]|mime_in[fileReview,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                        'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                        'is_image' => 'File bukan gambar',
                        'mime_in' => 'File bukan gambar',
                    ]
                ],
            ])) {
                // return redirect()->to('peserta/tugas/diklat/' . $nik . '/' . $token)->withInput();
                $results = [
                    'status' => 500,
                    'msg' => 'Error, Cek Kembali File Anda Lihat Deskripsi'
                ];
                return $this->setResponseFormat('json')->respond($results);
            }

            $files = $this->request->getFile('fileReview') ?? '';
            
            if ($files != '') {
                $filesName = $files->getRandomName();
                $files->move('review-buku/' . $nik, $filesName);
            }
            // $data = $this->request->getVar();
            $data['review_ids'] = $nik;
            $data['review_token'] = $token;
            $data['review_category'] = $this->request->getVar('jenisReviewBuku');
            $data['review_cover'] = $filesName ?? '';

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
        $id = $this->request->getVar('prevId');
        $isupdate = $this->request->getVar('update');
        if (!$this->validate([
            'filePhotoAwal' => [
                'rules' => 'max_size[filePhotoAwal,2048]|is_image[filePhotoAwal]|mime_in[filePhotoAwal,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'filePhotoAkhir' => [
                'rules' => 'max_size[filePhotoAkhir,2048]|is_image[filePhotoAkhir]|mime_in[filePhotoAkhir,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('peserta/tugas/diorama/' . $nik . '/' . $token)->withInput();
        }
        
        $filesFirst = $this->request->getFile('filePhotoAwal') ?? '';
        $filesLast = $this->request->getFile('filePhotoAkhir') ?? '';

        $prevFirst= $this->request->getVar('prevAwal') ?? '';
        $prevLast= $this->request->getVar('prevAkhir') ?? '';
        
        if ($filesFirst != '') {
            $filesNameFirst = $filesFirst->getRandomName();
            $filesFirst->move('diorama/' . $nik, $filesNameFirst);
        }
        if ($filesLast != '') {
            $filesNameLast = $filesLast->getRandomName();
            $filesLast->move('diorama/' . $nik, $filesNameLast);
        }

        $data['diorama_ids'] = $nik;
        $data['diorama_token'] = $token;
        $data['diorama_first'] = $filesNameFirst ?? $prevFirst;
        $data['diorama_last'] = $filesNameLast ?? $prevLast;

        $diorama = new Diorama();

        if($isupdate == '1'){
            $diorama->update($id, $data);
        }else{
            $diorama->insert($data);
        }

        return redirect()->to('/peserta/tugas/karya-tulis/' . $nik . '/' . $token);
    }

    public function karyaTulis()
    {
        // dd($this->request->getVar());
        $db      = \Config\Database::connect();
        // dd($this->request->getFileMultiple('filePuisi'));
        // dd($this->request->getFileMultiple('filePantun'));
        // dd($this->request->getFile());

        if (!$this->validate([
                'fileCerpen' => [
                    'rules' => 'max_size[fileCerpen,2048]|mime_in[fileCerpen,application/pdf]',
                    'errors' => [
                        'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                        'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                        'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                    ]
                ],
                'fileCarpon' => [
                    'rules' => 'max_size[fileCarpon,2048]|mime_in[fileCarpon,application/pdf]',
                    'errors' => [
                        'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                        'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                        'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                    ]
                ],
                'fileEnglishStory' => [
                    'rules' => 'max_size[fileEnglishStory,2048]|mime_in[fileEnglishStory,application/pdf]',
                    'errors' => [
                        'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                        'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                        'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                    ]
                ],
                'fileArtikel' => [
                    'rules' => 'max_size[fileArtikel,2048]|mime_in[fileArtikel,application/pdf]',
                    'errors' => [
                        'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                        'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                        'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                    ]
                ],
                'filePuisi.*' => [
                    'rules' => 'max_size[filePuisi,2048]|mime_in[filePuisi,application/pdf]',
                    'errors' => [
                        'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                        'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                        'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                    ]
                ],
                'filePantun.*' => [
                    'rules' => 'max_size[filePantun,2048]|mime_in[filePantun,application/pdf]',
                    'errors' => [
                        'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                        'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                        'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                    ]
                ],
            ])
        ) {
            return redirect()->to('peserta/tugas/karya-tulis/' .  $this->request->getVar('prevNik') . '/' .  $this->request->getVar('prevToken'))->withInput();
        }
        $id = $this->request->getVar('prevIdNaskah') ?? '';
        $idPuisi[] = $this->request->getVar('prevIdPuisi') ?? '';
        $idPantun[] = $this->request->getVar('prevIdPantun') ?? '';

        // d($idPuisi);
        // dd($idPantun);

        $filesPuisi = $this->request->getFileMultiple('filePuisi');
        $filesPantun = $this->request->getFileMultiple('filePantun');

        $filesCerpen = $this->request->getFile('fileCerpen') ?? '';
        $filesCarpon = $this->request->getFile('fileCarpon') ?? '';
        $filesStory = $this->request->getFile('fileEnglishStory')?? '';
        $filesArtikel = $this->request->getFile('fileArtikel') ?? '';

        // d($filesPuisi);
        // dd($filesPantun);

        if ($filesCerpen != '') {
            $nameCerpen = $filesCerpen->getRandomName();
            $filesCerpen->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameCerpen);
        }

        if ($filesCarpon != '') {
            $nameCarpon = $filesCarpon->getRandomName();
            $filesCarpon->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameCarpon);
        }

        if ($filesStory != '') {
            $nameStory = $filesStory->getRandomName();
            $filesStory->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameStory);
        }

        if ($filesArtikel != '') {
            $nameArtikel = $filesArtikel->getRandomName();
            $filesArtikel->move('karya/' . $this->request->getVar('prevNik') . '/naskah', $nameArtikel);
        }

        $data['karya_ids'] = $this->request->getVar('prevNik');
        $data['karya_token'] = $this->request->getVar('prevToken');
        $data['karya_cerpen'] = $nameCerpen ?? '';
        $data['karya_carpon'] = $nameCarpon ?? '';
        $data['karya_story'] = $nameStory ?? '';
        $data['karya_artikel'] = $nameArtikel ?? '';

        // dd($data);

        $karya = new Karya();
        $builder = $db->table('karya');

        $isupdates = $this->request->getVar('update') ?? '';
        $isData = $karya->where('karya_ids', $data['karya_ids'])->first();
        // dd( $isData['id']);

        if ($isData > 0) {
            $builder->where('id', $isData['id'])->update($data);
            $karya_id = $isData['id'];
        } else {
            $karya->insert($data);
            $karya_id = $karya->getInsertID();
        }

        // unset($data);

        if ($karya_id != '') {

            foreach ($filesPuisi as $file) {
                $name = $file->getRandomName();
                $data2[] = [
                    'puisi_ids'     => $this->request->getVar('prevNik'),
                    'puisi_token'   => $this->request->getVar('prevToken'),
                    'karya_id'    => $karya_id,
                    'puisi_naskah'    => $name,
                ];
                if ($file != '') {
                    $file->move('karya/' . $this->request->getVar('prevNik') . '/puisi', $name);
                }
            }

            $puisi = new Puisi();
            $builder_puisi = $db->table('puisi');

            if($filesPuisi[0] != ''){
                if ($isupdates == '1') {
                    $builder_puisi->where(['karya_id' => $karya_id])->delete();
                    $puisi->insertBatch($data2);
                } else {
                    $puisi->insertBatch($data2);
                }
            }
            // unset($data2);

            foreach ($filesPantun as $file) {
                $name = $file->getRandomName();
                $data3[] = [
                    'pantun_ids'     => $this->request->getVar('prevNik'),
                    'pantun_token'   => $this->request->getVar('prevToken'),
                    'karya_id'    => $karya_id,
                    'pantun_naskah'    => $name,
                ];
                if ($file != '') {
                    $file->move('karya/' . $this->request->getVar('prevNik') . '/pantun', $name);
                }
            }

            $pantun = new Pantun();
            $builder_pantun = $db->table('pantun');
            if($filesPuisi[0] != ''){
                if ($isupdates == '1') {
                    $builder_pantun->where(['karya_id' => $karya_id])->delete();
                    $pantun->insertBatch($data3);
                } else {
                    $pantun->insertBatch($data3);
                }
            }
        }
        // unset($data3);

        // dd($data);
        return redirect()->to('/peserta/tugas/video/' . $this->request->getVar('prevNik') . '/' . $this->request->getVar('prevToken'));
        // return redirect('tugas-video');
    }

    public function video()
    {
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');
        $isupdate = $this->request->getVar('update');
        $id=$this->request->getVar('prevId');
        // if (!$this->validate([
        //     'linkKegiatan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data link kegiatan tidak boleh kosong',
        //         ]
        //     ],
        //     'linkCerita' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data link cerita tidak boleh kosong'
        //         ]
        //     ],
        // ])) {
        //     return redirect()->to('/peserta/tugas/video/' . $nik . '/' . $token)->withInput();
        // }

        // $data = $this->request->getVar();
        $data['video_ids'] = $nik;
        $data['video_token'] = $token;
        $data['video_link_kegiatan'] = $this->request->getVar('linkKegiatan') ?? '';
        $data['video_link_cerita'] = $this->request->getVar('linkCerita') ?? '';

        $video = new Video();

        if($isupdate == '1'){
            $video->update($id,$data);
        }else{
            $video->insert($data);
        }
        return redirect()->to('/peserta/tugas/antologi/' . $nik . '/' . $token);
    }

    public function antologi()
    {
        $files = $this->request->getFile('fileAntologi');
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');

        if (!$this->validate([
            'fileAntologi' => [
                'rules' => 'max_size[fileAntologi,2048]|is_image[fileAntologi]|mime_in[fileAntologi,image/jpg,image/jpeg,image/png]',
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

        if ($files != '') {
            $filesName = $files->getRandomName();
            $files->move('antologi/' . $nik, $filesName);
        }

        // $data = $this->request->getVar();
        $data['antologi_ids'] = $nik;
        $data['antologi_token'] = $token;
        $data['antologi_cover'] = $filesName ?? '';
        $data['antologi_judul'] = $this->request->getVar('judulAntologi') ?? '';
        $data['antologi_author'] = $this->request->getVar('pengarangAntologi') ?? '';
        $data['antologi_category'] = $this->request->getVar('jenisBuku') ?? '';
        $data['antologi_peserta'] = $this->request->getVar('pengarangAntologiJml') ?? '';

        $antologi = new Antologi();
        $antologi->insert($data);

        return redirect()->to('/peserta/tugas/literasi-kota/' . $nik . '/' . $token);
        // return redirect('tugas-literasi-kota');
    }

    public function literasiKota()
    {
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');
        $files = $this->request->getFile('fileKehadiran') ?? '';

        // if (!$this->validate([
        //     'kota' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data kota tidak boleh kosong'
        //         ]
        //     ],
        // ])) {
        //     return redirect()->to('/peserta/tugas/literasi-kota/'.$nik . '/' . $token)->withInput();
        // }
        
        if (!$this->validate([
            'fileKehadiran' => [
                'rules' => 'max_size[fileKehadiran,2048]|is_image[fileKehadiran]|mime_in[fileKehadiran,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar peserta terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ]
        ])) {
            return redirect()->to('/peserta/tugas/literasi-kota/'.$nik . '/' . $token)->withInput();
        }

        // $data = $this->request->getVar();
        if ($files != '') {
            $name = $files->getRandomName();
            $data = [
                'kota_ids'     => $nik,
                'kota_token'   => $token,
                'kota_bukti'   => $name,
                'kota_nama'    => $this->request->getVar('kota') ?? '',
            ];
            $files->move('kota/' . $nik, $name);
            $kota = new Kota();
            $kota->insert($data);
        }


        return redirect()->to('/peserta/tugas/literasi-media/' . $nik . '/' . $token);
        // return redirect('tugas-literasi-media');
    }

    public function literasiMedia()
    {

        if (!$this->validate([
            'fileMajalah' => [
                'rules' => 'max_size[fileMajalah,2048]|mime_in[fileMajalah,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileMajalah2' => [
                'rules' => 'max_size[fileMajalah2,2048]|mime_in[fileMajalah2,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileMajalah3' => [
                'rules' => 'max_size[fileMajalah3,2048]|mime_in[fileMajalah3,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileMajalah4' => [
                'rules' => 'max_size[fileMajalah4,2048]|mime_in[fileMajalah4,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih file untuk diupload terlebih dahulu',
                    'mime_in' => 'File ekstensi tidak mendukung, coba lagi!!',
                ]
            ],
            'fileSsIg' => [
                'rules' => 'max_size[fileSsIg,2048]|is_image[fileSsIg]|mime_in[fileSsIg,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileSsFb' => [
                'rules' => 'max_size[fileSsFb,2048]|is_image[fileSsFb]|mime_in[fileSsFb,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileSsYt' => [
                'rules' => 'max_size[fileSsYt,2048]|is_image[fileSsYt]|mime_in[fileSsYt,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileKegiatanIg' => [
                'rules' => 'max_size[fileKegiatanIg,2048]|is_image[fileKegiatanIg]|mime_in[fileKegiatanIg,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileKegiatanFb' => [
                'rules' => 'max_size[fileKegiatanFb,2048]|is_image[fileKegiatanFb]|mime_in[fileKegiatanFb,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileKegiatanWa' => [
                'rules' => 'max_size[fileKegiatanWa,2048]|is_image[fileKegiatanWa]|mime_in[fileKegiatanWa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, pilih kurang dari 2MB',
                    'uploaded' => 'Pilih gambar untuk diupload terlebih dahulu',
                    'is_image' => 'File bukan gambar',
                    'mime_in' => 'File bukan gambar',
                ]
            ],
            'fileShareInfo' => [
                'rules' => 'max_size[fileShareInfo,2048]|is_image[fileShareInfo]|mime_in[fileShareInfo,image/jpg,image/jpeg,image/png]',
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
        $fileMajalah2 = $this->request->getFile('fileMajalah2');
        $fileMajalah3 = $this->request->getFile('fileMajalah3');
        $fileMajalah4 = $this->request->getFile('fileMajalah4');
        $fileSsIg = $this->request->getFile('fileSsIg');
        $fileSsFb = $this->request->getFile('fileSsFb');
        $fileSsYt = $this->request->getFile('fileSsYt');

        $fileKegiatanIg = $this->request->getFile('fileKegiatanIg');
        $fileKegiatanFb = $this->request->getFile('fileKegiatanFb');
        $fileKegiatanWa = $this->request->getFile('fileKegiatanWa');
        $fileShareInfo = $this->request->getFile('fileShareInfo');

        if ($fileMajalah != '') {
            $nameMajalah = $fileMajalah->getRandomName();
            $fileMajalah->move('media/' . $this->request->getVar('prevNik'), $nameMajalah);
        }

        if ($fileMajalah2 != '') {
            $nameMajalah2 = $fileMajalah2->getRandomName();
            $fileMajalah2->move('media/' . $this->request->getVar('prevNik'), $nameMajalah2);
        }

        if ($fileMajalah3 != '') {
            $nameMajalah3 = $fileMajalah3->getRandomName();
            $fileMajalah3->move('media/' . $this->request->getVar('prevNik'), $nameMajalah3);
        }

        if ($fileMajalah4 != '') {
            $nameMajalah4 = $fileMajalah4->getRandomName();
            $fileMajalah4->move('media/' . $this->request->getVar('prevNik'), $nameMajalah4);
        }

        if ($fileSsIg != '') {
            $nameIg = $fileSsIg->getRandomName();
            $fileSsIg->move('media/' . $this->request->getVar('prevNik'), $nameIg);
        }

        if ($fileSsFb != '') {
            $nameFb = $fileSsFb->getRandomName();
            $fileSsFb->move('media/' . $this->request->getVar('prevNik'), $nameFb);
        }

        if ($fileSsYt != '') {
            $nameYt = $fileSsYt->getRandomName();
            $fileSsYt->move('media/' . $this->request->getVar('prevNik'), $nameYt);
        }

        if ($fileKegiatanIg != '') {
            $name_kg = $fileKegiatanIg->getRandomName();
            $fileKegiatanIg->move('media/' . $this->request->getVar('prevNik'), $name_kg);
        }

        if ($fileKegiatanFb != '') {
            $name_kb = $fileKegiatanFb->getRandomName();
            $fileKegiatanFb->move('media/' . $this->request->getVar('prevNik'), $name_kb);
        }

        if ($fileKegiatanWa != '') {
            $name_ka = $fileKegiatanWa->getRandomName();
            $fileKegiatanWa->move('media/' . $this->request->getVar('prevNik'), $name_ka);
        }

        if ($fileShareInfo != '') {
            $name_fo = $fileShareInfo->getRandomName();
            $fileShareInfo->move('media/' . $this->request->getVar('prevNik'), $name_fo);
        }

        $data['media_ids'] = $this->request->getVar('prevNik');
        $data['media_token'] = $this->request->getVar('prevToken');
        $data['media_majalah'] = $nameMajalah ?? '';
        $data['media_majalah_2'] = $nameMajalah2 ?? '';
        $data['media_majalah_3'] = $nameMajalah3 ?? '';
        $data['media_majalah_4'] = $nameMajalah4 ?? '';
        $data['media_ssig'] = $nameIg ?? '';
        $data['media_ssfb'] = $nameFb ?? '';
        $data['media_ssyt'] = $nameYt ?? '';
        $data['media_kegiatan_ig'] = $name_kg ?? '';
        $data['media_kegiatan_fb'] = $name_kb ?? '';
        $data['media_kegiatan_yt'] = $name_ka ?? '';
        $data['media_kegiatan_wa'] = $name_fo ?? '';

        $media = new Media();
        $media->insert($data);

        // return redirect('tugas-literasi-assestment');
        return redirect()->to('/peserta/tugas/literasi-assestment/' . $nik . '/' . $token);
    }

    public function literasiAssestment()
    {
        // if (!$this->validate([
        //     'minatBaca' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'silahkan pilih'
        //         ]
        //     ],
        //     'analisaLiterasi' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'pilih analisa literasi'
        //         ]
        //     ],
        // ])) {
        //     return redirect()->back()->withInput();
        // }
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');
        $id = $this->request->getVar('prevId');
        $isupdate = $this->request->getVar('update');

        // $data = $this->request->getVar();
        $data['assestment_ids'] = $nik;
        $data['assestment_token'] = $token;
        $data['assestment_jenis'] = $this->request->getVar('minatBaca') ?? '';
        $data['assestment_analisa'] = $this->request->getVar('analisaLiterasi') ?? '';
        $data['assestment_akm'] = $this->request->getVar('akmLiterasi') ?? '';
        $data['assestment_nab'] = $this->request->getVar('nilaiAnalisaBudaya') ?? '';

        $assestment = new Assestment();
        if($isupdate == '1'){
            $assestment->update($id, $data);
        }else{
            $assestment->insert($data);
        }

        return redirect()->to('/peserta/tugas/partisipasi/' . $nik . '/' . $token);
        // return redirect('tugas-partisipasi');
    }

    public function partisipasi()
    {
        $nik = $this->request->getVar('prevNik');
        $token = $this->request->getVar('prevToken');
        $id = $this->request->getVar('prevId');
        $isupdate = $this->request->getVar('update');
        // if (!$this->validate([
        //     'pameranLiterasi' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Pilih salah satu pilihan diatas',
        //         ]
        //     ],
        //     'festivalLiterasi' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Pilih salah satu pilihan diatas'
        //         ]
        //     ],
        //     'kemahLiterasi' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Pilih salah satu pilihan diatas'
        //         ]
        //     ],
        //     'tantanganLiterasi' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Pilih salah satu pilihan diatas'
        //         ]
        //     ],
        // ])) {
        //     return redirect()->to('/peserta/tugas/partisipasi/' . $nik . '/' . $token)->withInput();
        // }
        $data['partisipasi_ids'] = $this->request->getVar('prevNik');
        $data['partisipasi_token'] = $this->request->getVar('prevToken');
        $data['partisipasi_pameran'] = $this->request->getVar('pameranLiterasi') ?? '';
        $data['partisipasi_festival'] = $this->request->getVar('festivalLiterasi') ?? '';
        $data['partisipasi_kemah'] = $this->request->getVar('kemahLiterasi') ?? '';
        $data['partisipasi_tantangan'] = $this->request->getVar('tantanganLiterasi') ?? '';

        $partisipasi = new Partisipasi();
        if($isupdate == '1'){
            $partisipasi->update($id, $data);
        }else{
            $partisipasi->insert($data);
        }

        // dd($data);
        // return redirect()->to('/peserta/tugas/diklat/' . $nik . '/' . $token);
        return redirect('selesai');
    }

}
