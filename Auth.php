<?php namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
	public function __construct()
  {
    helper('form');
    $this->ModelAuth = new ModelAuth();
  }
	
  public function register()
  {

    $data = array(
      'title' => 'Register',
      'errors' => \Config\Services::validation()
    );
    return view('auth/register', $data);
  }

  public function save_register()
  {

    // Validasi Input
    if (!$this->validate([
      'nama_user'=>[
        'label' => 'Nama User',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
        'email'=>[
        'label' => 'E-Mail',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
        'password'=>[
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
        'repassword'=>[
        'label' => 'Re-Password',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'matches' => '{field} Tidak Sama'
          ]
        ]
    ])) {
      $errors = \Config\Services::validation();
      return redirect()->to(base_url('auth/register'))->withInput()->with('errors', $errors);
    }else{
      $data = array(
        'nama_user' => $this->request->getPost('nama_user'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        'level' => 3
      );
      $this->ModelAuth->save_register($data);
      session()->setFlashdata('pesan', 'Register Berhasil');
      return redirect()->to(base_url('auth/register')); 
    }
  
   
  }

  public function login(){
    $data = array(
      'title' => 'Login',
      'errors' => \Config\Services::validation()
    );
    return view('auth/login', $data);
  }

  public function cek_login()
  {
    if ($this->validate([
        'email'=>[
        'label' => 'E-Mail',
        'rules' => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong!!'
          ]
        ],
        'password'=>[
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong!!'
          ]
        ],
    ])) {
        // jika tidak valids
      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password');
      $cek = $this->ModelAuth->login($email);
      if ($cek) {
        if(password_verify($password, $cek['password'])){
          // Jika datanya ditemukan
          session()->set('log',true);
          session()->set('nama_user',$cek['nama_user']);
          session()->set('email',$cek['email']);
          session()->set('level',$cek['level']);
          session()->set('foto_user',$cek['foto_user']);
          // Logins
          return redirect()->to(base_url('home/user'));
        }else{
          // Jika datanya tidak cocok
          session()->setFlashdata('pesan', 'Password Salah');
          return redirect()->to(base_url('auth/login'));
        }
      }else {
        // Jika datanya tidak cocok
        session()->setFlashdata('pesan', 'Login Gagal');
        return redirect()->to(base_url('auth/login'));
      }
    }else {
        $errors = \Config\Services::validation();
        return redirect()->to(base_url('auth/login'))->withInput()->with('errors', $errors);
    }
  }

  public function logout(){
    session()->remove('log');
    session()->remove('nama_user');
    session()->remove('level');
    session()->remove('foto_user');
    session()->setFlashdata('pesan', 'Logout Sukses');
    return redirect()->to(base_url('auth/login'));
  }


}