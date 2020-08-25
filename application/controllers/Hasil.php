<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

    
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
        $data['mHasil'] = true;
        $data['daftar_calon'] = $this->hasil_m->getAll();
        $data['content'] = 'v_hasil';
        $this->load->view('index',$data);
    }

    public function grafik()
    {
        $data['mGrafik'] = true;
        $data['content'] = 'v_grafik';
        $this->load->view('index',$data);
    }

    public function dataGrafik(){
        $data = $this->hasil_m->getDataGrafik();
        foreach ($data as $key => $value) {
            $chartData[] =['x'=>$value['calon_presma'].' & '.$value['calon_wakil_presma'],'y'=>intval($value['total'])];
        }
        echo json_encode($chartData);
    }

    public function suara($id)
    {
        $data['mHasil'] = true;
        $data['suara_calon'] = $this->hasil_m->getDataById($id);
        $data['content'] = 'hasil_suara';
        $this->load->view('index',$data);
    }

    public function video($id)
    {
        // $data['mHasil'] = true;
        $data['calonbyid'] = $this->calon_m->getDataById($id);
        $data['content'] = 'lihat_video';
        $this->load->view('index',$data);
    }

}

/* End of file Hasil.php */