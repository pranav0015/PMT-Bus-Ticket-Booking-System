<?php
class Adminlogin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        if($this->session->userdata('adminsession')) {
            redirect(base_url('admin'));
            return false;
        }
        $this->load->view('admin-login');
    }
    public function login(){
        $data = $this->input->post();
        $resp = $this->CM->select_data('bus_admin','*',$data);
        if(count($resp)>0) {
            $this->session->set_userdata('adminsession',$resp[0]);
            echo json_encode(array('status'=>'true','message'=>'success'));
        } else {
            echo json_encode(array('status'=>'false','message'=>'username and password not match'));
        }
    }
    
}
?>