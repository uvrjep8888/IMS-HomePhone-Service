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

    public function subscriber_get( $phoneNumber ){
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

    private function raw_file_converter($raw_data){

        $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

        $parts = array_slice(explode($boundary, $raw_data), 1);

        $data = [];

        foreach ($parts as $part) {
            if ($part == "--\r\n") break;
            $part = trim($part);
            $matches = [];
            if (preg_match('/name=\"([^\"]*)\"/', $part, $matches)) {
                $name = $matches[1];
                $data[$name] = substr($part, strpos($part, "\r\n\r\n") + 4);
            }
        }

        return $data;

    }

    public function subscriber_put($phoneNumber){
    // this part is for fixing the data from form data
    $raw_data = file_get_contents('php://input');

    $data = $this->raw_file_converter($raw_data); 
    $isSuccessfull = $this->Subscriber_model->update_subscriber($data, $phoneNumber); 
    echo json_encode($isSuccessfull); 
    }
}
