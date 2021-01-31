<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jayapura');
class Pemilihan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        if($this->session->userdata('batas_pemilihan') <= time() ){
            $this->db->update('tb_pemilihan',['status'=>'nonaktif'],['id_pemilihan'=>1]);
        }
        $this->load->model('hasil_m');
        $this->load->model('calon_m');
        $this->load->model('user_m');
    }
    
    public function index()
    {
        $data['mPemilihan'] = true;
        $data['config'] = $this->user_m->getConfig();
        $data['daftar_calon'] = $this->calon_m->getAll();
        $data['content'] = 'v_pemilihan';
        $this->load->view('index',$data);
    }
    
    public function detail($id)
    {
        $data['mPemilihan'] = true;
        $data['calon'] = $this->calon_m->getDataById($id);
        $data['suara_calon'] = $this->hasil_m->getDataById($id);
        $data['content'] = 'detail_calon';  
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

    public function aktifkan(){
        $data = [ 
            'mulai_pemilihan'=>time(),
            'akhir_pemilihan'=>time()+60*60*24,
            'status'=>'aktif'
        ];
        $this->db->update('tb_pemilihan',$data,['id_pemilihan'=>1]);
        $this->session->set_flashdata('berhasil','Anda telah berhasil mengaktifkan pemilihan dengan masa waktu 24 Jam');
        redirect('welcome');
    }

}

/* End of file Pemilihan.php */