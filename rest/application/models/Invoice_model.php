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
 	 	$q .= $this->addcol('customer', 'name', 'customer_name');
 	 	$q .= $this->addcol('customer', 'contact', 'customer_contact');
 	 	$q .= $this->addcol('customer', 'address', 'customer_address');
 	 	$q .= $this->addcol('customer', 'company', 'customer_company');
 	 	$q .= $this->addcol('status', 'name', 'status');

 	 	$q .= ' FROM `invoice` INNER JOIN `customer` ON `invoice`.`customer_id` = `customer`.`id` INNER JOIN `status` ON `invoice`.`status_id` = `status`.`id` WHERE `date` BETWEEN "'.$fromdate.'" AND "'.$todate.'" ORDER BY `invoice`.`date` DESC';
 	 	return $query = $this->db->query($q)->result();
 	 }

 	 public function getlastbillnumber(){
 	 	$query = $this->db->query('SELECT `bill_no` FROM `invoice` ORDER BY `id` DESC LIMIT 0,1')->row();
 	 	return $query;
 	 }
 } 
 
 ?>