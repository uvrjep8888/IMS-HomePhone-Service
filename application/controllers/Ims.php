<?php

require APPPATH.'libraries/REST_Controller.php'; 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


class Ims extends REST_Controller  {

    public function __construct() {  
        parent::__construct(); 
        $this->load->database();
        $this->load->model('Subscriber_model');  
    }

    public function index() {
        echo 'Welcome to IMS Home Phone Subscriber Service';
        echo APPPATH; 
    }

    public function subscriber_get($phoneNumber){
        $subscriber = $this->Subscriber_model->get_subscriber($phoneNumber); 
        
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

    public function subscriber_post() {

        $isSuccessfull = $this->Subscriber_model->add_subscriber($this->post()); 
        
        echo json_encode($isSuccessfull); 
    }
}
