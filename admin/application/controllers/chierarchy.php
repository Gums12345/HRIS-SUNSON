<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class chierarchy extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		
		 
		 $this->load->model('mhierarchy');
		 
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$a['page']	= "hierarchy";
		$this->load->view('admin/index', $a);
	}

	function direktur(){
		echo $this->mhierarchy->direktur();
		
	}
	function seniormanager(){
	 	$id=$this->input->get('id');

		echo $this->mhierarchy->seniormanager($id);
		
	}
	function manager(){
	 	$id=$this->input->get('id');

		echo $this->mhierarchy->manager($id);
		
	}
	
	function kadep(){
	 	$id=$this->input->get('id');

		echo $this->mhierarchy->kadep($id);
		
	}
	
	function kabag(){
	 	$id=$this->input->get('id');

		echo $this->mhierarchy->kabag($id);
		
	}
	
	function kaur(){
	 	$id=$this->input->get('id');
		$idbagian=$this->input->get('idbagian');

		echo $this->mhierarchy->kaur($id,$idbagian);
		
	}

	function karu(){
	 	$id=$this->input->get('id');
		$idbagian=$this->input->get('idbagian');

		echo $this->mhierarchy->karu($id,$idbagian);
		
	}
	
	function operator(){
	 	$id=$this->input->get('id');
		$idbagian=$this->input->get('idbagian');

		echo $this->mhierarchy->operator($id,$idbagian);
		
	}
	
	
	
	


}

