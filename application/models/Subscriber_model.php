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

    public function add_subscriber($data){
        $this->db->trans_start();
        $user = array(
            'username' => $data['username'],
            'password'  => $data['password'],
            'phoneNumber'  => $data['phoneNumber']
        );

        $this->db->insert('user',$user);
        $insert_id = $this->db->insert_id();

        $information = array(
            'user_id' => $insert_id, 
            'domain' => $data['domain'],
            'status'  => $data['status'],
        ); 

        $features = array(
            'user_id' => $insert_id, 
            'callForwardProvisioned' => $data['provisioned'],
            'callForwardDestination'  => $data['destination'],
        ); 


        $this->db->insert('information',$information);
        $this->db->insert('features',$features);
        $this->db->trans_complete();
		return $this->db->affected_rows();

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