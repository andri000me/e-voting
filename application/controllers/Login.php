<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('username')){
            redirect('welcome');
        }
        $this->load->model('user_m');
    }
    
    public function index()
    {
        $this->load->view('v_login');
    }

    public function cek_login(){
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $cek_admin = $this->user_m->cekAdmin($username);
        if($cek_admin){
            if(password_verify($password,$cek_admin['password'])){
                $sessionData = [
                    'id'=>$cek_admin['id_admin'],
                    'id_fakultas'=>$cek_admin['id_fakultas'],
                    'username'=>$cek_admin['username'],
                    'level'=>$cek_admin['level']
                ];
                $this->session->set_userdata($sessionData);
                redirect('welcome');
            }else{
                $this->session->set_flashdata('gagal','Password yang anda masukkan salah !');
                redirect('login');
            }
        }else{
            $cek_user = $this->user_m->cekUser($username);
            $config = $this->user_m->getConfig();
            if(password_verify($password,$cek_user['password'])){
                $sessionData = [
                    'id'=>$cek_user['id_pemilih'],
                    'id_fakultas'=>$cek_user['id_fakultas'],
                    'username'=>$cek_user['nim'],
                    'nama'=>$cek_user['nama'],
                    'email'=>$cek_user['email'],
                    'level'=>'user',
                    'batas_pemilihan'=>$config['akhir_pemilihan']
                ];
                $this->session->set_userdata($sessionData);
                redirect('welcome');
            }else{
                $this->session->set_flashdata('gagal','Password yang anda masukkan salah !');
                redirect('login');
            }
        }
    }
}

/* End of file Login.php */