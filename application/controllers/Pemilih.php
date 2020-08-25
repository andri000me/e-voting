<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }else{
            if($this->session->userdata('level')=='user'){
                redirect('welcome');
            }
        }
        $this->load->model('pemilih_m');
        $this->load->model('fakultas_m');
    }
    
    public function index()
    {
        $data['mPemilih'] = true;
        $data['pemilih'] = $this->pemilih_m->getAll();
        $data['pemilihbyfakultas'] = $this->pemilih_m->getByFakultas($this->session->id_fakultas);
        $data['fakultas'] = $this->fakultas_m->getAll();
        $data['content'] = 'v_pemilih';
        $this->load->view('index',$data);
    }

    public function fakultas()
    {
        $data['mPemilih'] = true;
        $data['pemilih'] = $this->pemilih_m->getByFakultas($this->input->post('fakultas',true));
        $data['fakultas'] = $this->fakultas_m->getAll();
        $data['content'] = 'v_pemilih';
        $this->load->view('index',$data);
    }

    public function tambah_baru()
    {
        $data['mPemilih'] = true;
        $data['content'] = 'tambah_pemilih';
        $this->load->view('index',$data);
    }

    public function ubah($id)
    {
        $data['mPemilih'] = true;
        $data['pemilihbyid'] = $this->pemilih_m->getDataById($id);
        $data['content'] = 'edit_pemilih';
        $this->load->view('index',$data);
    }

    public function proses_tambah(){
        if($this->input->post('password',true)==''){
            $password = $this->input->post('nim',true);
        }else{
            $password = $this->input->post('password',true);
        }
        $data = [
            'id_fakultas'=>$this->session->userdata('id'),
            'nim'=>$this->input->post('nim',true),
            'nama'=>$this->input->post('nama',true),
            'email'=>$this->input->post('email',true),
            'password'=>password_hash($password,PASSWORD_DEFAULT)
        ];
        $this->pemilih_m->tambahBaru($data);
        $this->session->set_flashdata('berhasil','Anda berhasil menambahkan data Pemilih');
        redirect('pemilih');
    }

    public function proses_ubah(){
        if($this->input->post('password',true)==''){
            $password = $this->input->post('password_lama',true);
        }else{
            $password = password_hash($this->input->post('password',true),PASSWORD_DEFAULT);
        }
        $data = [
            'nim'=>$this->input->post('nim',true),
            'nama'=>$this->input->post('nama',true),
            'email'=>$this->input->post('email',true),
            'password'=>$password
        ];
        $this->pemilih_m->ubahData($data,$this->input->post('id_pemilih'));
        $this->session->set_flashdata('berhasil','Anda berhasil mengubah data Pemilih');
        redirect('pemilih');
    }

    public function import(){
	
        $config['upload_path'] = './uploads/excel/';    
        $config['allowed_types'] = 'xlsx';    
        $config['max_size']  = 2048;    
        $config['overwrite'] = true;         
        $this->load->library('upload',$config); 	
        $id_fakultas = $this->session->userdata('id_fakultas');			

        if($this->upload->do_upload('import_file')){ 
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';                
            $excelreader = new PHPExcel_Reader_Excel2007();        
            $loadexcel = $excelreader->load('uploads/excel/'.$this->upload->data('file_name')); 
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true, true);                
    
            $data = [];        
            $numrow = 1; 
            $success = 0;   
            $duplicate = 0;
            foreach($sheet as $row){
                $cek = $this->pemilih_m->cekNIM($row['A']);
                //Cek apakah data password kosong apa tidak 
                if($row['D']==''){
                    $password = $row['A'];//password adalah nim
                }else{
                    $password = $row['D'];//password adalam password yang diketik
                }
                if(!$cek) { 
                    if($numrow > 1){
                        $data = [
                            'id_fakultas'=>$id_fakultas,
                            'nim'=>$row['A'],//input data dari data excel kolom A
                            'nama'=>$row['B'],
                            'email'=>$row['C'],
                            'password'=>$password
                        ];
                        $this->pemilih_m->import($data);
                        $success++;
                    }
                    $numrow++;
                }else{
                    $duplicate++;
                }					
            }     
            if($this->upload->data('file_name')!='format.xlsx'){
                unlink('./uploads/excel/'.$this->upload->data('file_name'));  
            }
            $this->session->set_flashdata('berhasil','Anda berhasil menambahkan <b>'.$success.'</b> data baru dan <b>'.$duplicate.'</b> memiliki NIM yang sama');  
        }else{  
            $this->session->set_flashdata('gagal',$this->upload->display_errors()); 
        }          
        redirect("pemilih"); 
    }

    public function reset($id){
        $nim = $this->pemilih_m->getNIM($id);
        $data = [
            'password'=>password_hash($nim,PASSWORD_DEFAULT)
        ];
        $this->pemilih_m->resetPassword($data,$id);
        $this->session->set_flashdata('berhasil','Anda berhasil mereset password menjadi NIM anda');
        redirect('pemilih');
    }

    public function kirim($id){
        $email = $this->pemilih_m->getDataById($id);

        $config = [
            'protocol'  =>'smtp',
            'smtp_host' =>'ssl://smtp.googlemail.com',
            'smtp_port' =>465,
            'smtp_user' =>'nama email',
            'smtp_pass' =>'password email',
            'mailtype'  =>'html',
            'charset'   =>'iso-8859-1'
        ];

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from('nama email', 'Admin E-Voting');
        $this->email->to($email['email']);
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Informasi Akun');
        $this->email->message('
                    <h2>Hallo, '.$email['nama'].'</h2>
                    Berikut ini kami informasikan akun pemilihan anda : <br>
                    <table>
                    <tr>
                    <td>Nama Lengkap</td>
                    <td>: <b>'.$email['nama'].'</b></td>
                    </tr>
                    <tr>
                    <td>Nomor Induk Mahasiswa</td>
                    <td>: <b>'.$email['nim'].'</b></td>
                    </tr>
                    </table>
                    Silahkan login pada sistem dengan menggunakan NIM dan Password yang anda daftarkan di link berikut : <br>
                    <a href="'.base_url().'login">Login</a><br>
                    Terima Kasih.<br>
                ');

        if($this->email->send()){
            $this->session->set_flashdata('berhasil','Anda berhasil mengirim Email');
        }else{
            $this->session->set_flashdata('gagal','Anda gagal mengirim Email');
        }
        redirect('pemilih');
    }

    public function hapus($id){
        $this->pemilih_m->hapus($id);
        $this->session->set_flashdata('berhasil','Anda berhasil menghapus data Pemilih');
        redirect('pemilih');
    }

}

/* End of file Pemilih.php */