<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class ImsPhoneSubscriber extends CI_Controller  {

    public function __construct() {  
        parent::__construct(); 
        $this->load->database();
        $this->load->model('Subscriber_model');  
    }

    public function index() {
        $this->load->view('index');
    }


}
