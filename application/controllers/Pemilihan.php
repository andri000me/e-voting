<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('hasil_m');
        $this->load->model('calon_m');
    }
    
    public function index()
    {
        $data['mPemilihan'] = true;
        // $data['cek_suara'] = $this->hasil_m->cekSuara($this->session->userdata('id'));
        $data['daftar_calon'] = $this->calon_m->getAll();
        $data['content'] = 'v_pemilihan';
        $this->load->view('index',$data);
    }

    public function pilih($id){
        $cek = $this->hasil_m->cekSuara($this->session->userdata('id'));
        if($cek==0){
            $data = [
                'id_pemilih'=>$this->session->userdata('id'),
                'id_calon'=>$id
            ];
            $this->hasil_m->pilih($data);
            $this->session->set_flashdata('berhasil','Anda telah berhasil melakukan pemilihan calon');
        }else{
            $this->session->set_flashdata('gagal','Mohon maaf anda telah melakukan pemilihan calon');
        }
        redirect('pemilihan');
    }

}

/* End of file Pemilihan.php */