<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_m extends CI_Model {

    private $table = 'tb_hasil_suara';

    private $id = 'id_hasil';

    public function getAll(){
        return $this->db->select('*,count(a.id_pemilih) as total')
                        ->join('tb_pemilih c','a.id_pemilih=c.id_pemilih')
                        ->join('tb_calon b','a.id_calon=b.id_calon')
                        ->group_by('a.id_calon')
                        ->get($this->table.' a')->result_array();
    }

    public function getDataGrafik(){
        return $this->db->select('*,count(a.id_pemilih) as total')
                        ->join('tb_pemilih c','a.id_pemilih=c.id_pemilih')
                        ->join('tb_calon b','a.id_calon=b.id_calon')
                        ->group_by('a.id_calon')
                        ->get($this->table.' a')->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->select('*')
                        ->join('tb_pemilih c','a.id_pemilih=c.id_pemilih')
                        ->join('tb_calon b','a.id_calon=b.id_calon')
                        ->where('a.id_calon',$id)
                        ->get($this->table.' a')->result_array();
    }

    public function getCount()
    {
        return $this->db->count_all($this->table);
    }

    public function cekSuara($id_pemilih){
        return $this->db->get_where($this->table,['id_pemilih'=>$id_pemilih])->num_rows();
    }

    public function pilih($data){
        $this->db->insert($this->table,$data);
    }
}

/* End of file Hasil_m.php */