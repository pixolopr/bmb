<?php 
 defined('BASEPATH') OR exit('No direct script access allowed'); 
 
 header('Access-Control-Allow-Origin: *'); 
 
 class Invoice extends PIXOLO_Controller { 
 
 	 function __construct(){ 
 	 	 parent::__construct(); 
 
 	 	 $this->load->model('Invoice_model', 'model'); 
 	 } 

 	 public function index() 
 	 { 
 	 	 $message['json']=$this->model->get_all(); 
 	 	 $this->load->view('json', $message); 
 	 } 
 	 public function getreports()
 	 {
 	 	$fromdate = $this->input->get('fromdate');
 	 	$todate = $this->input->get('todate');
 	 	$customer = $this->input->get('customer');
 	 	$status = $this->input->get('status');
 	 	if($fromdate == false)
 	 		{

 	 		};
 	 	//$message['json'] = $this->model->getreports(fromdate, todate, customer, status);
 	 }
 }