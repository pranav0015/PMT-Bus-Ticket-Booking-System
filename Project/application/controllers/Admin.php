<?php 
class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->view('admin/includes/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/includes/footer');
    }
    public function locations($type=''){
        if($this->input->method()=='post'){
            if($type==='insert') {
                $resp = $this->CM->insert_data("bms_location",$this->input->post());
                if($resp) {
                    echo json_encode(array("status" => "true", "message" => "Success", "reload" => base_url("admin/locations")));
                } else {
                    echo json_encode(array("status" => "false", "message" => "Please Try Again",));
                }
            }
            
        }else {
            $this->db->order_by("id","desc");
            $data['locations'] = $this->CM->select_data("bms_location","*");
            $this->load->view('admin/includes/header');
            $this->load->view('admin/locations',$data);
            $this->load->view('admin/includes/footer');
        }

        
    }
    public function delete_location($id){
        $this->CM->delete_data("bms_location",array("id"=>$id));
        redirect(base_url("admin/locations"));

    }
    public function update_location($id) {
        if($this->input->method()=='post') {
            $this->CM->update_data("bms_location",$_POST,array("id"=>$id));
            echo json_encode(array("status"=>"true","message"=>"Data Successfully Updated","reload"=>base_url("admin/locations")));
        } else {
            $data['location'] = $this->CM->select_data("bms_location","*",array("id"=>$id))[0];
            $this->load->view('admin/includes/header');
            $this->load->view('admin/edit_location',$data);
            $this->load->view('admin/includes/footer');
        }
    }
    public function bus_schedule(){
        if($this->input->method()=='post') {
        $this->CM->insert_data("bus_schedule",$_POST);
        echo json_encode(array("status"=>'true',"message"=>"Success","reload"=>base_url("admin/bus_schedule")));
    } else {
        $data['locations'] = $this->CM->select_data("bms_location","*",array("status",1));
        $this->db->order_by("id","desc");
        $this->db->join("bms_location","bus_schedule.start = bms_location.id");
        $data['schedules'] = $this->CM->select_data("bus_schedule",["bus_schedule.*","bms_location.name as start_location"]);
        $this->load->view('admin/includes/header');
        $this->load->view('admin/bus_schedule',$data);
        $this->load->view('admin/includes/footer');
    }
    }
    public function bus_schedule_delete($id){
        $this->CM->delete_data("bus_schedule",array("id"=>$id));
        redirect("admin/bus_schedule");
    }
    public function bus_schedule_edit($id) {
        if($this->input->method()=='post') {
            $this->CM->update_data('bus_schedule',$_POST,array("id"=>$id));
            echo json_encode(array("status"=>'true',"message"=>"Success","reload"=>base_url("admin/bus_schedule")));

        } else {
            $data['schedule'] = $this->CM->select_data('bus_schedule',"*",array("id"=>$id))[0];
            $data['locations'] = $this->CM->select_data("bms_location","*",array("status",1));
            $this->load->view('admin/includes/header');
            $this->load->view('admin/bus_schedule_edit',$data);
            $this->load->view('admin/includes/footer');
        }
    } 
     
    public function bus_booking(){
        if($this->input->method()=='post') {
            $this->CM->insert_data("bus_booking",$_POST);
            echo json_encode(array("status"=>"true","message"=>"Success","reload"=>base_url("admin/bus_booking")));
         } else {
             $data['locations'] = $this->CM->select_data("bms_location","*");
             $data['schedules'] = $this->CM->select_data("bus_schedule","*");
             $this->db->join("bus_schedule","bus_booking.bus=bus_schedule.id");
             $data['booking'] = $this->CM->select_data("bus_booking","bus_booking.*,bus_schedule.start,bus_schedule.end,bus_schedule.amount,bus_schedule.bus_number");
             
        //$data['schedules'] = $this->CM->select_data("bus_schedule","*");
        $this->load->view('admin/includes/header');
        $this->load->view('admin/bus_booking',$data);
        $this->load->view('admin/includes/footer');
        }
   
    
    }
     
    public function edit_booking($id){
        if($this->input->method()=='post') {
            $this->CM->update_data("bus_booking",$_POST,array("id"=>$id));
            echo json_encode(array("status"=>"true","message"=>"Success","reload"=>base_url("admin/bus_booking")));
        } else {
            $data['schedules'] = $this->CM->select_data("bus_schedule","*");
            $data['booking'] =  $data['booking'] = $this->CM->select_data("bus_booking","*",array("id"=>$id))[0];
            $this->load->view('admin/includes/header');
            $this->load->view('admin/edit_booking',$data);
            $this->load->view('admin/includes/footer');
        }
    } 
}

?>