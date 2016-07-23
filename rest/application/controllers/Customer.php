<?php 
 defined('BASEPATH') OR exit('No direct script access allowed'); 
 
 header('Access-Control-Allow-Origin: *'); 
 
 class Customer extends PIXOLO_Controller { 
 
 	 function __construct(){ 
 	 	 parent::__construct(); 
 
 	 	 $this->load->model('Customer_model', 'model'); 
 	 } 

 	 public function index() 
 	 { 
 	 	 $message['json']=$this->model->get_all(); 
 	 	 $this->load->view('json', $message); 
 	 } 
 	 public function checkcustomer()
 	 {
 	 	$name = $this->input->get('name');
 	 	$contact = $this->input->get('contact');
 	 	$address = $this->input->get('address');
 	 	$company = $this->input->get('company');
 	 	$message['json'] = $this->model->checkcustomer($name, $contact, $address, $company);
 	 	$this->load->view('json', $message);
 	 }
 }