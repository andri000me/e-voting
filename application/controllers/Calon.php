<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {

    
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
        $this->load->model('calon_m');
        $this->load->model('fakultas_m');
        $this->load->model('hasil_m');
    }
    

    public function index()
    {
        $data['mCalon'] = true;
        $data['calon'] = $this->calon_m->getAll();
        $data['content'] = 'v_calon';  
        $this->load->view('index',$data);
    }

    public function detail($id)
    {
        $data['mCalon'] = true;
        $data['calon'] = $this->calon_m->getDataById($id);
        $data['suara_calon'] = $this->hasil_m->getDataById($id);
        $data['content'] = 'detail_calon';  
        $this->load->view('index',$data);
    }

    public function tambah_calon()
    {
        $data['mCalon'] = true;
        $data['fakultas'] = $this->fakultas_m->getAll();
        $data['content'] = 'tambah_calon';  
        $this->load->view('index',$data);
    }

    public function ubah($id)
    {
        $data['mCalon'] = true;
        $data['fakultas'] = $this->fakultas_m->getAll();
        $data['calonbyid'] = $this->calon_m->getDataById($id);
        $data['content'] = 'edit_calon';  
        $this->load->view('index',$data);
    }

    public function video($id)
    {
        $data['mCalon'] = true;
        $data['calonbyid'] = $this->calon_m->getDataById($id);
        $data['content'] = 'video_calon';  
        $this->load->view('index',$data);
    }

    public function proses_tambah(){
        $config['upload_path']          = './uploads/image/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_calon'))
        {
            $img = $this->upload->data();
            $data = [
                'fakultas_calon_presma'=>$this->input->post('fakultas_calon_presma',true),
                'fakultas_calon_wapresma'=>$this->input->post('fakultas_calon_wapresma',true),
                'nim_calon_presma'=>$this->input->post('nim_calon_presma',true),
                'nim_calon_wapresma'=>$this->input->post('nim_calon_wapresma',true),
                'calon_presma'=>$this->input->post('calon_presma',true),
                'calon_wakil_presma'=>$this->input->post('calon_wakil_presma',true),
                'visi_misi'=>$this->input->post('visi_misi',true),
                'gambar'=>$img['file_name'],
            ];
            $this->calon_m->tambahBaru($data);
            $this->session->set_flashdata('berhasil','Anda berhasil menambahkan data Calon');
        }else{
            $this->session->set_flashdata('gagal',$this->upload->display_errors());
        }
        redirect('calon');
    }

    public function proses_ubah(){
        $config['upload_path']          = './uploads/image/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_calon'))
        {
            $img = $this->upload->data();
            $data = [
                'fakultas_calon_presma'=>$this->input->post('fakultas_calon_presma',true),
                'fakultas_calon_wapresma'=>$this->input->post('fakultas_calon_wapresma',true),
                'nim_calon_presma'=>$this->input->post('nim_calon_presma',true),
                'nim_calon_wapresma'=>$this->input->post('nim_calon_wapresma',true),
                'calon_presma'=>$this->input->post('calon_presma',true),
                'calon_wakil_presma'=>$this->input->post('calon_wakil_presma',true),
                'visi_misi'=>$this->input->post('visi_misi',true),
                'gambar'=>$img['file_name'],
            ];
            $edit = $this->calon_m->ubahData($data,$this->input->post('id_calon',true));
            if($data){
                unlink('./uploads/image/'.$this->input->post('foto_lama',true));
            }
            $this->session->set_flashdata('berhasil','Anda berhasil mengubah data Calon');
        }else{
            $this->session->set_flashdata('gagal',$this->upload->display_errors());
        }
        redirect('calon');
    }

    public function upload_video()
    {
        $id = $this->input->post('id_calon',true);
        $cek = $this->calon_m->getDataById($id);
        if($cek['video']!=''){
            unlink('./uploads/video/'.$cek['video']);
        }
        $config['upload_path']			='./uploads/video/';
        $config['allowed_types']		='mp4|mkv';
        $config['encrypt_name']			= true;
        $config['max_size']				= 134217728;
        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('video_calon'))
        {
            $video = $this->upload->data();
            $data = [
                'video'=>$video['file_name']
            ];
            $this->calon_m->addVideo($data,$id);
            $this->session->set_flashdata('berhasil','Anda berhasil menambahkan video Calon');
        }else{
            $this->session->set_flashdata('gagal',$this->upload->display_errors());
        }
        redirect("calon");
    }
    
    public function hapus($id){
        $this->calon_m->hapus($id);
        $this->session->set_flashdata('berhasil','Anda berhasil menghapus data Calon');
        redirect('calon');
    }
}

/* End of file Calon.php */