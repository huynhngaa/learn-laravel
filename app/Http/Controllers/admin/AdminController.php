<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\NguoiDung;
class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function login(){
        return view('admin.login');
    }
    public function check_login(){
        request()->validate([
            'email' => 'exists:users',
            'password' => 'required'
        ]);
        $data = request()->all('email','password');
        // dd($data);
        if(auth()->attempt($data)){
            return redirect()->route('admin.index');
        }
        return redirect()->back();
    }
}
