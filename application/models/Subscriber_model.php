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


    public function get_subscribers() {
        $sql = "SELECT phoneNumber, username, password, domain, status , callForwardProvisioned,  callForwardDestination  FROM user 
                LEFT JOIN information ON user.id = information.user_id 
                LEFT JOIN features ON user.id = features.user_id" ;
        $query = $this->db->query($sql); 

        return $query->result_array();  
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
  
    public function update_subscriber($data, $phoneNumber ) {
        $this->db->trans_start();

        $this->db->where('phoneNumber', $phoneNumber);
        $result = $this->db->get('user')->row_array(); 

        $user = array(
            'username' => $data['username'],
            'password'  => $data['password'],
            'phoneNumber'  => $data['phoneNumber']
        );


        $information = array(
            'domain' => $data['domain'],
            'status'  => $data['status'],
        );

        $features = array(
            'callForwardProvisioned' => $data['provisioned'],
            'callForwardDestination'  => $data['destination'],
        );


        $this->db->where('id', $result['id']);
        $this->db->update('user', $user);

        $this->db->where('user_id', $result['id']);
        $this->db->update('information', $information);

        $this->db->where('user_id', $result['id']);
        $this->db->update('features', $features);


        $this->db->trans_complete();
		return $this->db->affected_rows();
    }

 
    public function delete_subscriber($phoneNumber) {
        $this->db->trans_start();
        $this->db->where('phoneNumber', $phoneNumber);
        $result = $this->db->get('user')->row_array(); 

        $this->db->where('id', $result['id']);
        $this->db->delete('user');

        $this->db->where('user_id', $result['id']);
        $this->db->delete('information');

        $this->db->where('user_id', $result['id']);
        $this->db->delete('features');

        $this->db->trans_complete();
        return  $this->db->affected_rows(); 
    }
}