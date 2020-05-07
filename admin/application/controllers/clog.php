<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clog extends CI_Controller {

	    public function __construct() {
        parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
        $this->load->library('datatables');
        $this->load->model('mlog');
    }
    
    public function parah() {
      

       $this->load->view('admin/log');
    }
	
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mlog->json();
		$a['page']	= "log";
		
		$this->load->view('admin/index', $a);
	}

    public function json() {
	
        echo $this->mlog->json();
    }

	
	
	function getjsonsample()
    {
		echo $this->mlog->getjson();
    }

	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mlog->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mlog->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mlog->get_headerpopup($string);
    }


}


