<?php 
class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['schedules'] = array();
        $data['locations'] = $this->CM->select_data("bms_location","*");
        $getInfo = $this->input->get();
        if(isset($getInfo['start'])) {
            $data['schedules'] = $this->CM->select_data("bus_schedule","*",$getInfo);
             print_r($data['schedules']);
           //die();
        }
        $this->load->view('home',$data);
    }

    public function booking($id) {
        if($this->input->method()=='post') {
            $data = $_POST;
            $data['bus'] = $id;
            $this->CM->insert_data('bus_booking',$data);
            redirect(base_url('home/payment'));
        } else {
            $data['id'] = $id;
            $this->load->view('booking',$data);
        }
    }
  

    public function payment(){
        $this->load->view("payment");
    }
    public function success(){
       // redirect(base_url('home/success'));
          $this->load->view("success");
       }
}
?>