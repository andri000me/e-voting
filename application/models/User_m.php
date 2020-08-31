<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    private $table = 'tb_admin';

    private $id = 'id_admin';

    
    public function cekAdmin($username){
        return $this->db->get_where($this->table,['username'=>$username])->row_array();
    }

    public function cekUser($username){
        return $this->db->get_where('tb_pemilih',['nim'=>$username])->row_array();
    }

    public function getCount($table){
        return $this->db->count_all($table);
    }

    public function getConfig(){
        return $this->db->get('tb_pemilihan')->row_array();
    }
}

/* End of file User_m.php */