<?php 
 defined('BASEPATH') OR exit('No direct script access allowed'); 
 
 class Backup_model extends PIXOLO_Model 
 { 
	 public $_table = 'backup';  
 
 	 //Write functions here 
 	 public function getlastbackupdate(){
 	 	$query = $this->db->query('SELECT DATE_FORMAT(date, "%e/%c/%Y %H:%i") AS `date` FROM `backup` ORDER BY `date` desc LIMIT 0,1')->row();
 	 	//$d = DATE_FORMAT($query->date , '%e/%c/%Y %H:%i');
 	 	print_r($query->date);
 	 	//return $query;
 	 }
 } 
 
 ?>