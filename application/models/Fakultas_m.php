<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_m extends CI_Model {
    
    private $table = 'tb_fakultas';

    private $id = 'id_fakultas';

    public function getAll(){ 
        return $this->db->get($this->table)->result_array();
    }

    public function tambahBaru($data){
        $this->db->insert($this->table,$data);
    }

    public function hapus($id){
        $this->db->delete($this->table,[$this->id=>$id]);
    }

}

/* End of file Fakultas_m.php */