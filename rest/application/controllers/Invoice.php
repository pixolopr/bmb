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
		$fromdate = str_replace('/', '-', $fromdate);
		$fromdate = date('Y-m-d', strtotime($fromdate));
		$todate = str_replace('/', '-', $todate);
		$todate = date('Y-m-d', strtotime($todate));
 	 	$customer = $this->input->get('customer');
 	 	$status = $this->input->get('status');
 	 	$message['json'] = $this->model->getreports($fromdate, $todate, $customer, $status);
 	 	$this->load->view('json', $message); 
 	 }
 	 public function getdatewisestats()
 	 {
 	 	$fromdate = $this->input->get('fromdate');
 	 	$todate = $this->input->get('todate');
		$fromdate = str_replace('/', '-', $fromdate);
		$fromdate = date('Y-m-d', strtotime($fromdate));
		$todate = str_replace('/', '-', $todate);
		$todate = date('Y-m-d', strtotime($todate));
 	 	$customer = $this->input->get('customer');
 	 	$status = $this->input->get('status');
 	 	$message['json'] = $this->model->getdatewisestats($fromdate, $todate, $customer, $status);
 	 	$this->load->view('json', $message); 
 	 }
 	 public function getlastbillnumber(){
 	 	$message['json'] = $this->model->getlastbillnumber();
 	 	$this->load->view('json', $message);
 	 }
 }