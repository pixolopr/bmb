<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

function __construct()
 	 {
 	 	 parent::__construct();

 	 	 //$this->load->model('Access_model', 'dmodel');
         //$this->table=$this->model->getschemainfo();
     $this->load->helper('url');
 	 }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

    public function login()
    {
         $this->load->view('login') ;

      }
     public function logincheck()
     {
         $data['email']=$this->input->get('email');

         $data['password']=  sha1($this->input->get('password'));

         $userdata = $this->db->query("select * from `users` where `email`='$data[email]' and `password`='$data[password]' and `access` = '1'")->row();

         if(count($userdata)){
            $data = array(
                'id' => $userdata->id,
                'name' => $userdata->name,
                'email' => $userdata->email,
                'password' => $userdata->password,
                'isloggedin'=>true
            );
            $this->session->set_userdata($data);
             redirect('users/getdataview');
            }else{
                $this->session->set_flashdata('error', 'email and password dont match');
                redirect('welcome/login');
            };
         }

         public function logout()
         {
            $this->session->sess_destroy();
            redirect('welcome/login');
         }

         public function dashboard()
         {
            $this->load->view('dashboard');
         }

}
