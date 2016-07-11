<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

class Tax extends PIXOLO_Controller {
function __construct()

{	parent::__construct();

	//LOAD MODEL
	$this->load->model('Tax_model', 'model');

	//DATABSE INFO//
	//ABOUT THIS TABLE
	$this->table=$this->model->getschemainfo();
	$this->tablename = 'tax';
	//ALL TABLES LIST FOR MENU
	 $this->tables = $this->model->gettablelist();

	//CHECK LOGIN SESSION
	if($this->session->userdata('isloggedin') != 1)
	{
		redirect('Welcome/login');
 	}else{
		$this->sessiondata = $this->session->get_userdata();
 	};

		$this->load->helper(array('form', 'url'));

		//PAGINATION STUFF
 		$this->load->library('pagination');
		$this->perpagedata = 10;

		//SPECIFIES IN WHAT ORDER TO ARRANGE DATA
		$this->order = '';

	}

	public function index()
	{
		$message['json']=$this->model->get_all();
		$this->load->view('json', $message);
	}

}