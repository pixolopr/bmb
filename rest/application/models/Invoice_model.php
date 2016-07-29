<?php 
 defined('BASEPATH') OR exit('No direct script access allowed'); 
 
 class Invoice_model extends PIXOLO_Model 
 { 
	 public $_table = 'invoice';  

	 
 
 	 //Write functions here 
 	 public function getreports($fromdate,$todate,$customer,$status){

 	 	$q = 'SELECT `invoice`.`id` AS `id`';
 	 	
 	 	$q .= $this->addcol('invoice', 'bill_no', 'bill_no');
 	 	$q .= $this->addcol('invoice', 'date', 'date');
 	 	$q .= $this->addcol('invoice', 'type', 'type');
 	 	$q .= $this->addcol('invoice', 'weight', 'weight');
 	 	$q .= $this->addcol('invoice', 'amount', 'amount');
 	 	$q .= $this->addcol('invoice', 'paid', 'paid');
 	 	$q .= $this->addcol('invoice', 'service_tax', 'service_tax');
 	 	$q .= $this->addcol('invoice', 'swachhbharat_tax', 'swachhbharat_tax');
 	 	$q .= $this->addcol('invoice', 'krishikalyancess_tax', 'krishikalyancess_tax');
 	 	$q .= $this->addcol('invoice', 'total', 'total');
 	 	$q .= $this->addcol('customer', 'id', 'customer_id');
 	 	$q .= $this->addcol('customer', 'name', 'customer_name');
 	 	$q .= $this->addcol('customer', 'contact', 'customer_contact');
 	 	$q .= $this->addcol('customer', 'address', 'customer_address');
 	 	$q .= $this->addcol('customer', 'company', 'customer_company');
 	 	$q .= $this->addcol('status', 'name', 'status');

 	 	$q .= ' FROM `invoice` INNER JOIN `customer` ON `invoice`.`customer_id` = `customer`.`id` INNER JOIN `status` ON `invoice`.`status_id` = `status`.`id`';
 	 	if($fromdate != 'false'){
 	 		$q .= ' WHERE `date` BETWEEN "'.$fromdate.'" AND "'.$todate.'" ';
 	 	}
 	 	if($customer != '')
 	 	{
 	 		$q .= ' AND `customer`.`name` = "'.$customer.'" ';
 	 	}
 	 	if($status != '')
 	 	{
 	 		$q .= ' AND `status`.`name` = "'.$status.'"';
 	 	}
 	 	$q .= ' ORDER BY `invoice`.`date` DESC';
 	 	return $query = $this->db->query($q)->result();
 	 }

 	 public function getdatewisestats($fromdate,$todate,$customer,$status){
 	 	$q = '';
 	 	$q .= 'SELECT `date`, SUM(`paid`) AS `paid`, SUM(`amount`) AS `amount`, SUM(`service_tax`) AS `service_tax`, SUM(`swachhbharat_tax`) AS `swachhbharat_tax`, SUM(`krishikalyancess_tax`) AS `krishikalyancess_tax`, SUM(`total`) AS `total` FROM `invoice` ';

 	 	if($fromdate != '')
 	 	{
 	 		$q .= ' WHERE `date` BETWEEN "'.$fromdate.'" AND "'.$todate.'" ';
 	 	}
 	 	if($customer != ''){
 	 		$q .= ' AND `customer_id` = '.$customer;
 	 	}
 	 	if($status != ''){
 	 		$q .= ' AND `status_id` = '.$status;
 	 	}
 	 	$q .= ' GROUP BY `date`';
 	 	return $query = $this->db->query($q)->result();
 	 }

 	 public function getlastbillnumber(){
 	 	$query = $this->db->query('SELECT `bill_no` FROM `invoice` ORDER BY `id` DESC LIMIT 0,1')->row();
 	 	return $query;
 	 }
 } 
 
 ?>