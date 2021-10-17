<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;
use App\Models\Resume;

class ApiController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        //
    }

    public function prevNik($nik,$token){

        $resume = new Resume();
        $query = $resume->asObject()
        ->where('resume_ids',$nik)
        ->where('resume_token',$token)
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

    public function biodata(){
        $id = $this->request->getVar('prevId') ?? '';
        $update = '';
        $trim = false;
        if($id != ''){
            $trim = true;
            $update = ',id,'.$id.']';
        }else{
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
                'rules' => 'required|is_unique[resume.resume_email'.$update,
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
        }

        $fileGambar = $this->request->getFile('resume_photo');
        $nameImage = $fileGambar->getRandomName();
        $fileGambar->move('img', $nameImage);
        
        $data = $this->request->getVar();
        $data['resume_photo'] = $nameImage;
        $resume = new Resume();
        if($trim == true){
            $resume->update($id,$data);
        }else{
            unset($data['prevId']);
            $resume->insert($data);
        }
        // return redirect()->to('/peserta/tugas/diklat');
        return redirect()->route('tugas-diklat');
        // return redirect('tugas-diklat')->back()->withInput();
    }

    public function diklat(){
        return redirect('tugas-baca-buku');
    }

    public function diorama(){
        return redirect('tugas-karya-tulis');
    }

    public function karyaTulis(){
        return redirect('tugas-video');
    }

    public function video(){
        return redirect('tugas-antologi');
    }

    public function antologi(){
        return redirect('tugas-literasi-kota');
    }

    public function literasiKota(){
        return redirect('tugas-literasi-media');
    }

    public function literasiMedia(){
        return redirect('tugas-literasi-assestment');
    }

    public function literasiAssestment(){
        return redirect('tugas-partisipasi');
    }

    public function partisipasi(){
        return redirect('selesai');
    }

}
