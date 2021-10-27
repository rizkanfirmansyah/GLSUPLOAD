<?php

function isLogin(){
    if (session('username') == null) {
        return redirect()->to('admin/login');die;
    }
}
