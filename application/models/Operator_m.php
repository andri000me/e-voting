<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_m extends CI_Model {

    private $table = 'tb_admin';

    private $id = 'id_admin';

    public function getAll(){ 
        return $this->db
                    ->select('*')
                    ->join('tb_fakultas b','b.id_fakultas=a.id_fakultas')
                    ->where('a.level','operator')
                    ->get($this->table.' a')->result_array();
    }

    public function tambahBaru($data){
        $this->db->insert($this->table,$data);
    }

    public function hapus($id){
        $this->db->delete($this->table,[$this->id=>$id]);
    }

}

/* End of file Operator_m.php */