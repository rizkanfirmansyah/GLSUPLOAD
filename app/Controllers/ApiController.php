<?php

namespace App\Controllers;

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
        dd('On Progreess');
    }

    public function insert_resume()
    {
        if (!$this->validate([
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
                'rules' => 'required|is_unique[resume.resume_email]',
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
            return redirect()->to('/peserta/biodata')->withInput();
        }

        $fileGambar = $this->request->getFile('resume_photo');
        $nameImage = $fileGambar->getRandomName();
        $fileGambar->move('img', $nameImage);
        
        $data = $this->request->getVar();
        $data['resume_photo'] = $nameImage;
        $resume = new Resume();
        $resume->insert($data);
        return redirect()->to('/peserta/tugas/diklat');
    }
}
