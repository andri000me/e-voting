<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_m extends CI_Model {

    private $table = 'tb_calon';

    private $id = 'id_calon';

    public function getAll(){ 
        return $this->db->get($this->table)->result_array();
    }

    public function getDataById($id){
        return $this->db->get_where($this->table,[$this->id=>$id])->row_array();
    }

    public function tambahBaru($data){
        $this->db->insert($this->table,$data);
    }

    public function ubahData($data,$id){
        $this->db->update($this->table,$data,[$this->id=>$id]);
    }

    public function addVideo($data,$id){
        $this->db->update($this->table,$data,[$this->id=>$id]);
    }

    public function hapus($id){
        $this->db->delete($this->table,[$this->id=>$id]);
    }

}

/* End of file Calon_m.php */