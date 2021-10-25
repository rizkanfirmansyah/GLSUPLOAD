<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminApiController extends BaseController
{
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
}
