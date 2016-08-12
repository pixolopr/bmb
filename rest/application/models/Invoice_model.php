<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Invoice_model extends PIXOLO_Model
 {
	 public $_table = 'invoice';



 	 //Write functions here
 	 public function getreports($fromdate,$todate,$customer,$customer_contact,$status){

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
 	 		$q .= ' AND `customer`.`name` = "'.$customer.'" AND `customer`.`contact` = "'.$customer_contact.'"';
 	 	}
 	 	if($status != '')
 	 	{
 	 		$q .= ' AND `status`.`name` = "'.$status.'"';
 	 	}
 	 	$q .= ' ORDER BY `invoice`.`date` DESC';
    //print_r($q);
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

 	 public function getinvoice($id)
 	 {
 	 	$q = 'SELECT `invoice`.`id` AS `id`';

 	 	$q .= $this->addcol('invoice', 'bill_no', 'bill_no');
 	 	$q .= $this->addcol('invoice', 'date', 'date');
 	 	$q .= $this->addcol('invoice', 'from_date', 'from_date');
 	 	$q .= $this->addcol('invoice', 'to_date', 'to_date');
 	 	$q .= $this->addcol('invoice', 'customer_name', 'customer_name');
 	 	$q .= $this->addcol('invoice', 'paid', 'paid');
 	 	$q .= $this->addcol('invoice', 'amount', 'amount');
 	 	$q .= $this->addcol('invoice', 'service_tax', 'service_tax');
 	 	$q .= $this->addcol('invoice', 'swachhbharat_tax', 'swachhbharat_tax');
 	 	$q .= $this->addcol('invoice', 'krishikalyancess_tax', 'krishikalyancess_tax');
 	 	$q .= $this->addcol('invoice', 'total', 'total');
 	 	$q .= $this->addcol('customer', 'id', 'customer_id');
 	 	$q .= $this->addcol('customer', 'contact', 'customer_contact');
 	 	$q .= $this->addcol('customer', 'address', 'customer_address');
 	 	$q .= $this->addcol('customer', 'company', 'customer_company');

 	 	$q .= ' FROM `invoice` INNER JOIN `CUSTOMER` ON `invoice`.`customer_id` = `customer`.`id`';
 	 	$q .= ' WHERE `invoice`.`id` = '.$id.'';

 	 	$query = $this->db->query($q)->row();

 	 	$q2 = 'SELECT `invoice_product`.`product_id` AS `product_id` ';

		$q2 .= $this->addcol('invoice_product', 'invoice_id', 'invoice_id');
 	 	$q2 .= $this->addcol('product', 'name', 'product_name');
 	 	$q2 .= $this->addcol('invoice_product', 'date', 'date');
 	 	$q2 .= $this->addcol('invoice_product', 'weight', 'weight');
 	 	$q2 .= $this->addcol('invoice_product', 'pieces', 'pieces');
 	 	$q2 .= $this->addcol('invoice_product', 'to_place', 'to_place');
 	 	$q2 .= $this->addcol('invoice_product', 'carrier', 'carrier');
 	 	$q2 .= $this->addcol('invoice_product', 'total', 'total');

 	 	$q2 .= ' FROM `invoice_product` INNER JOIN `product` ON `invoice_product`.`product_id` = `product`.`id` ';
 	 	$q2 .= ' WHERE `invoice_product`.`invoice_id`="'.$query->id.'"';

 	 	$query->products = $this->db->query($q2)->result();
 	 	return $query;
 	 }

 	 public function deleteinvoice($id){
 	 	$query = $this->db->query('DELETE FROM `invoice` WHERE `id` = '.$id);
 	 	$query = $this->db->query('DELETE FROM `invoice_product` WHERE `invoice_id` = '.$id);
 	 	return $query;
 	 }
 }

 ?>
