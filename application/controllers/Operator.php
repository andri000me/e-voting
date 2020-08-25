<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }else{
            if($this->session->userdata('level')!='administrator'){
                redirect('welcome');
            }
        }
        $this->load->model('operator_m');
        $this->load->model('fakultas_m');
    }
    
    public function index()
    {
        $data['mOperator'] = true;
        $data['operator'] = $this->operator_m->getAll();
        $data['fakultas'] = $this->fakultas_m->getAll();
        $data['content'] = 'v_operator';
        $this->load->view('index',$data);
    }

    public function tambah()
    {
        $data = [
            'id_fakultas'=>$this->input->post('id_fakultas',true),
            'username'=>$this->input->post('username',true),
            'password'=>password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
            'level'=>'operator'
        ];
        $this->operator_m->tambahBaru($data);
        $this->session->set_flashdata('berhasil','Anda berhasil menambahkan data Operator');
        redirect('operator');
    }

    public function hapus($id){
        $this->operator_m->hapus($id);
        $this->session->set_flashdata('berhasil','Anda berhasil menghapus data Operator');
        redirect('operator');
    }
}

/* End of file Operator.php */