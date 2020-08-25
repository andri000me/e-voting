<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    
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
        $this->load->model('fakultas_m');
    }
    
    public function index()
    {
        $data['mFakultas'] = true;
        $data['fakultas'] = $this->fakultas_m->getAll();
        $data['content'] = 'v_fakultas';
        $this->load->view('index',$data);
    }

    public function tambah()
    {
        $data = [
            'nama_fakultas'=>$this->input->post('nama_fakultas',true)
        ];
        $this->fakultas_m->tambahBaru($data);
        $this->session->set_flashdata('berhasil','Anda berhasil menambahkan data Fakultas');
        redirect('fakultas');
    }

    public function hapus($id){
        $this->fakultas_m->hapus($id);
        $this->session->set_flashdata('berhasil','Anda berhasil menghapus data Fakultas');
        redirect('fakultas');
    }
}

/* End of file Fakultas.php */