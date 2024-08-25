<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ims extends CI_Controller {

    public function __construct() {  // Correct the constructor name
        parent::__construct();  // Correct the constructor name here as well
        $this->load->database();
        $this->load->model('Subscriber_model');  // Ensure this matches your model name
    }

    public function index() {
        echo 'Welcome to IMS Home Phone Subscriber Service';
    }

    public function subscriber(){
        $subscriber = $this->Subscriber_model->get_subscribers();  // Access the model correctly\
        
        // converting the value of status from booean to string
        if($subscriber['status'] == 1) $subscriber['status'] = 'active'; 
        else $subscriber['status'] = 'inactive'; 

        // converting the value of status from booean to string
        if($subscriber['callForwardProvisioned'] == 1)   $features['callForwardNoReply']['provisioned'] = 'active'; 
        else   $features['callForwardNoReply']['provisioned'] = 'inactive'; 

        // merging it to the array 
        $features['callForwardNoReply']['destination'] = $subscriber['callForwardDestination']; 
        $subscriber['features'] = $features; 

        // unset non necessary array key 
        unset($subscriber['callForwardDestination']);
        unset($subscriber['callForwardProvisioned']); 

        echo json_encode($subscriber); 
    }
}
