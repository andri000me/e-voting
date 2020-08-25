<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function index()
    {
        $data['mDashboard'] = true;
        $data['content'] = 'dashboard';
        $this->load->view('index',$data);
    }

}

/* End of file User.php */