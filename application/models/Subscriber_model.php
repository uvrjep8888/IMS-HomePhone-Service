<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database('imsphoneservices');
    }

 
    public function get_subscriber($phoneNumber) {
        $sql = "SELECT phoneNumber, username, password, domain, status , callForwardProvisioned,  callForwardDestination  FROM user 
                LEFT JOIN information ON user.id = information.user_id 
                LEFT JOIN features ON user.id = features.user_id 
                WHERE phoneNumber = " . $phoneNumber;
        $query = $this->db->query($sql); 

        return $query->row_array();  
    }


  
    public function update_subscriber($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('subscribers', $data); 
    }

 
    public function delete_subscriber($id) {
        $this->db->where('id', $id);
        return $this->db->delete('subscribers'); 
    }
}