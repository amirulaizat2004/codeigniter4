<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        return view('login/loginpage');
    }

    public function register() {
        $d['title'] = "Daftar Pengguna";
        $d['validation']=\Config\Services::validation();

        return view('login/register',$d);
    }

    public function addregister() {
        $validation=$this->validate([
            'username'=>'required|max_length[100]|is_unique[user.username]',
            'email'=>'required|valid_email|is_unique[user.email]',
            'password'=>'required|min_length[5]',
            'confirmpassword'=>'matches[password]',
        ]);
        
        if(!$validation){
            return redirect()->back()->withInput();
        }

        $datapost=$this->request->getVar();
        $model= new UserModel();

        $rawpassword=$this->request->getVar('password');
        $datapost['password']=password_hash($rawpassword,PASSWORD_DEFAULT);

        if($model->save($datapost)){
            $id=$model->insertID;

            return redirect()->to('student-form')->with('status','berjaya');


        }
        return redirect()->back()->withInput();
    }

    public function loginin() {

        $validation=$this->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        
        if(!$validation){
            return redirect()->back()->withInput();
        }

        $password=$this->request->getVar('password');
        $username=$this->request->getVar('username');
        $model= new UserModel();

        $data=$model->where(['username'=>$username])->first();

        if($data){
            $authpassword=password_verify($password,$data->password);

            if($authpassword){
                $sesdata=[
                    'id'=>$data->id,
                    'username'=>$data->username,
                    'email'=>$data->email,
                    'isLoggedIn'=>TRUE
                ];

                $this->session->set($sesdata);
                return redirect()->to('student-form');
                // return redirect()->to('admin-permohonan/pelajar')->with('status','berjaya');

            } else {

                $_SESSION['error'] = 'Username / Kata laluan SALAH !!!';
                $session = session();
                $session->markAsFlashdata('error');

                return redirect()->back()->withInput('status','wrong password');
            }
        } else {

            $_SESSION['error'] = 'Tiada username !!!';
            $session = session();
            $session->markAsFlashdata('error');

            return redirect()->back()->withInput('status','tiada user');
        }

    }

    public function logout() {
        $this->session->destroy();

        return redirect()->to('login');
    }

}
