<?php 
 defined('BASEPATH') OR exit('No direct script access allowed'); 
 
 class Customer_model extends PIXOLO_Model 
 { 
	 public $_table = 'customer';  
 
 	 //Write functions here
 	 public function checkcustomer($name, $contact, $address, $company){
 	 	$query = $this->db->query('SELECT * FROM `customer` WHERE `company` = "'.$company.'" AND `contact` = "'.$contact.'"');
 	 	if($query->num_rows() > 0)
 	 		{
 	 			return false;
 	 		}else{
 	 			$query = $this->db->query('INSERT INTO `customer` (`name`,`contact`,`address`,`company`) VALUES ("'.$name.'", "'.$contact.'", "'.$address.'", "'.$company.'")');
 	 			return $this->db->insert_id();
 	 		};
 	 }
 } 
 
 ?>