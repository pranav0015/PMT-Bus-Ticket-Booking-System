<?php 
class Commonmodel extends CI_Model {
    public function select_data($table,$select,$warr='') {
        if($warr!='') {
            $this->db->where($warr);
        }
        $resp = $this->db->select($select)->from($table)->get()->result_array();
        return $resp;
    }
    public function insert_data($table,$data) {
        return $this->db->insert($table,$data);
    }
    public function delete_data($table,$warr){
        $this->db->where($warr);
        $this->db->delete($table);
    }
    public function update_data($table,$data,$warr){
        $this->db->where($warr);
        return $this->db->update($table,$data);
    }
   
}
?>