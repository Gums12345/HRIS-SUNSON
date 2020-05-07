<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clistcuti extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		
		 
		 $this->load->model('mlistcuti');
		 
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$this->session->unset_userdata('cari');
		$this->session->set_userdata('cari', $this->input->post('table_search'));

		$a['page']	= "listcuti";
		
		$this->load->view('admin/index', $a);
	}


	

	function hapusgajipokok($id){
		$this->mlistcuti->hapusgajipokok($id);
		redirect('cgajipokok/tampil','refresh');
	}

	function getjsonsample()
    {	$field =  $this->input->get('field');
		echo $this->mlistcuti->getjson($field);
    }

	
	function urlcmb()
    {

		echo $this->mlistcuti->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mlistcuti->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	

  	echo $this->mlistcuti->get_datapopup();
    }
	
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mlistcuti->get_headerpopup($string);
    }


}

