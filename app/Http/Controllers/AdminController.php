<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    /**
     * Phương thức trả về view khi đang nhập admin thành công
     */
    public function index(){
        return view('admin.dashboard');
    }

    /**
     * Phương thức trả về view dùng để đăng kí tài khoản admin
     */
    public function create(){
        return view('admin.auth.register');
    }
    
    
    public function profile(){
        return view('admin.auth.profile');
    }
    
}
