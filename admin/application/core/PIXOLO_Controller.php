<?php

class PIXOLO_Controller extends CI_Controller {

    public $data = array();

    function __construct(){
        parent::__construct();
        $this->load->library('pagination');
    }

    public function insert()
	{
		$data = $this->input->get('data');
		$message['json']=$this->model->insert(json_decode($data));
		$this->load->view('json', $message);
	}

	public function getall()
	{
		$message['json']=$this->model->get_all();
		$this->load->view('json', $message);
	}

	public function getbyid()
	{
		$id = $this->input->get('id');
		$message['json']=$this->model->get($id);
		$this->load->view('json', $message);
	}

	public function getoneby()
	{
		$field = $this->input->get('field');
		$value = $this->input->get('value');
		$message['json']=$this->model->get_by($field, $value);
		$this->load->view('json', $message);
	}

	public function getmanyby()
	{
		$field = $this->input->get('field');
		$value = $this->input->get('value');
		$message['json']=$this->model->get_many_by($field, $value);
		$this->load->view('json', $message);
	}

	public function getmanybytwo(){
		$field1 = $this->input->get('field1');
		$value1 = $this->input->get('value1');
		$field2 = $this->input->get('field2');
		$value2 = $this->input->get('value2');
		$message['json']=$this->model->get_many_by_two($field1, $value1, $field2, $value2);
		$this->load->view('json', $message);
	}

	public function getmanybythree(){
		$field1 = $this->input->get('field1');
		$value1 = $this->input->get('value1');
		$field2 = $this->input->get('field2');
		$value2 = $this->input->get('value2');
		$field3 = $this->input->get('field3');
		$value3 = $this->input->get('value3');
		$message['json']=$this->model->get_many_by_three($field1, $value1, $field2, $value2, $field3, $value3);
		$this->load->view('json', $message);
	}

    public function clicklogin(){
		$message['json']=$this->model->clicklogin();
	}

	public function updatebyid()
	{
		$id = $this->input->get('id');
		$data = $this->input->get('data');
		$message['json']=$this->model->update($id, json_decode($data));
		$this->load->view('json', $message);
	}


	public function updatemanyby()
	{
		$field = $this->input->get('field');
		$value = $this->input->get('value');
		$data = $this->input->get('data');
		$message['json']=$this->model->update_by($field, $value, json_decode($data));
		$this->load->view('json', $message);
	}

	public function deletebyid()
	{
		$id = $this->input->get('id');
		$message['json']=$this->model->delete($id);
		$this->load->view('json', $message);
	}

	public function deletemanyby()
	{
		$field = $this->input->get('field');
		$value = $this->input->get('value');
		$message['json']=$this->model->delete_by($field, $value);
		$this->load->view('json', $message);
	}

      //SHOW DATA TABLE FUNCTION
     public function getdataview()
     {
       //PAGINATION CONFIGURATION
        $config = array();
        $config["base_url"] = site_url()."/".$this->tablename."/getdataview";
        $config["total_rows"] = $this->model->record_count($this->tablename);
        $config["per_page"] = $this->perpagedata;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active nav"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="waves-effect"><a href="#!">';
        $config['num_tag_close'] = '</a></li>';

        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li class="waves-effect"><a href="#!">';
        $config['next_tag_close'] = '</a></li>';

        $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open'] = '<li class="waves-effect"><a href="#!">';
        $config['prev_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        //CHECK 3rd URI SEGMENT
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $message["alldata"] = $this->model->getall($config["per_page"], $page, $this->order);
        $dlist  = array();
        foreach ($this->table as $field) {
          if(substr($field->COLUMN_COMMENT,0,8) == 'dropdown')
          {
            $dropobj = new stdClass();
            $dropobj->COLUMN_NAME = $field->COLUMN_NAME;
            $dropdetails = explode('|', substr($field->COLUMN_COMMENT,9));
            $dropobj->TABLE_NAME = $dropdetails[0];
            $dropobj->FIELD_NAME = $dropdetails[1];
            array_push($dlist, $dropobj);
          };
        };
        if(count($dlist)>0 && count($message["alldata"])>1)
        {
          foreach ($message["alldata"] as $onerow) {
          foreach ($dlist as $dcol) {
            $v = $onerow->{$dcol->COLUMN_NAME};
            $query = $this->db->query("SELECT `$dcol->FIELD_NAME` as 'name' FROM `$dcol->TABLE_NAME` WHERE `id` = '$v'");
            if($query->num_rows() > 0)
            {
              $onerow->{$dcol->COLUMN_NAME} = $query->row()->name;
            };
          };
        };
      };
        $message["links"] = $this->pagination->create_links();

        $this->load->view('dataview', $message);
     }

     //OPEN CREATE PAGE
     public function create()
     {
         $message['users']=$this->model->getschemainfo();
         $message['inputtype']="insert";
         foreach($message['users'] as $field)
         {
             $field->value = '';
         };
         foreach($this->table as $fields)
         {
              //GET ALL NAMES FOR THE DROPDOWN VALUES
              if(substr($fields->COLUMN_COMMENT,0,8) == 'dropdown')
              {
                  $dcol = $fields->COLUMN_NAME;
                  $dropdetails = explode('|', substr($fields->COLUMN_COMMENT,9));
                  $dtab = $dropdetails[0];
                  $dfld = $dropdetails[1];
                  $dropdown[$fields->COLUMN_NAME] =$this->db->query("SELECT `id`,`$dfld` as `name` FROM `$dtab`")->result();
                  $message['dropdown'] = $dropdown;
              };
         };
         $this->load->view('create',$message);
     }

     //OPEN EDIT PAGE
     public function edit()
     {
        $id = $this->input->get('id');
        $message['id']=$id;
        $values = $this->model->get($id);
        $message['values']=$values;
        $message['users']=$this->model->getschemainfo();
        $message['inputtype']="edit";
        foreach($message['users'] as $field)
        {
          if($field->COLUMN_COMMENT == 'password')
          {
            $field->value = '';
          }else {
            $field->value = $values->{$field->COLUMN_NAME};
          };

        };

        foreach($this->table as $fields)
        {
              //GET VALUES FOR DROPDOWNS
              if(substr($fields->COLUMN_COMMENT,0,8) == 'dropdown')
              {
                  $dcol = $fields->COLUMN_NAME;
                  $dropdetails = explode('|', substr($fields->COLUMN_COMMENT,9));
                  $dtab = $dropdetails[0];
                  $dfld = $dropdetails[1];
                  $dropdown[$fields->COLUMN_NAME] =$this->db->query("SELECT `id`,`$dfld` as `name` FROM `$dtab`")->result();
                  $message['dropdown'] = $dropdown;
              };
        };
        //LOAD THE VIEW
        $this->load->view('create', $message);
      }

      public function datainsertion($insertdata, $inserttype, $id)
      {
        foreach($this->table as $fields)
        {

            if(substr($fields->COLUMN_COMMENT,0,4)!='file'&& $fields->COLUMN_COMMENT!='id' && $fields->COLUMN_COMMENT!='now')
            {
                 //INSERT PASSWORD FIELD AFTER HASHING
                 if($fields->COLUMN_COMMENT=='password')
                 {
                       $data[$fields->COLUMN_NAME]=sha1($insertdata[$fields->COLUMN_NAME]);
                 }else
                 {
                     //INSERT DATE FIELD
                     if($fields->COLUMN_COMMENT=='date'){
                         $y = substr($insertdata[$fields->COLUMN_NAME],strlen($insertdata[$fields->COLUMN_NAME])-4 ,strlen($insertdata[$fields->COLUMN_NAME]));
                         $data[$fields->COLUMN_NAME] = date($y.'-m-d', strtotime($insertdata[$fields->COLUMN_NAME]));
                     }else{
                         //INSERT TIME FIELD
                         if($fields->COLUMN_COMMENT=='time')
                         {
                             $data[$fields->COLUMN_NAME] = $insertdata[$fields->COLUMN_NAME].":00";
                         }else{
                             //INSERT INSERTUSER FIELD
                             if($fields->COLUMN_COMMENT=='insertuser')
                             {
                                 $data[$fields->COLUMN_NAME]=$this->session->userdata('id');
                             }else{
                                 $data[$fields->COLUMN_NAME]=$insertdata[$fields->COLUMN_NAME];
                             };
                         }
                     }
                }
            }else {
            if(substr($fields->COLUMN_COMMENT,0,4)=='file')
            {
               $allowedtype = substr($fields->COLUMN_COMMENT,6);
               $allowedtype = str_replace(",.","|",$allowedtype);

               $config['upload_path'] = '../uploads/';
               $config['allowed_types'] =$allowedtype ;
               $config['max_size']	= '20000';
               $config['max_width']  = '5000';
               $config['max_height']  = '5000';

               $newFileName = $_FILES[$fields->COLUMN_NAME]['name'];
               $extention = explode(".", $newFileName);
               $fileExt = array_pop($extention);
               $filename = md5(time()).".".$fileExt;

               //set filename in config for upload
               $config['file_name'] = $filename;

              $this->load->library('upload', $config);

              if ( ! $this->upload->do_upload($fields->COLUMN_NAME))
              {
                $error = array('error' => $this->upload->display_errors());
              }
              else
              {
                $data[$fields->COLUMN_NAME] = $filename;
              }
            };
          };
        };

        if($inserttype=="insert"){
            $this->model->insert($data);
            $num_inserts = $this->db->affected_rows();
            print_r($num_inserts);
        }else{
            $message['insertedid']=$this->model->update($id, $data);
        };

        redirect("$this->tablename/getdataview");
      }

      //WHEN A DATA IS CREATED
      public function insertdata()
      {
         foreach($this->table as $fields)
         {
            $inputdata[$fields->COLUMN_NAME] = $this->input->post($fields->COLUMN_NAME);
         };
         $this->datainsertion($inputdata, "insert", null);
      }

     public function editdata()
     {
         $id = $this->input->get('id');
         foreach($this->table as $fields)
         {
              $inputdata[$fields->COLUMN_NAME] = $this->input->post($fields->COLUMN_NAME);
         };
         //print_r($inputdata);
         $this->datainsertion($inputdata, "update", $id);
      }

     public function deleterow()
     {
        $id = $this->input->get('id');
        $this->model->delete($id);
        redirect("$this->tablename/getdataview");
     }


     public function is_logged_in()
     {
         $is_logged_in = $this->session->userdata('isloggedin');
         if(!isset($is_logged_in) || $is_logged_in != true)
         {
            redirect('Welcome/login');
         }
     }
}