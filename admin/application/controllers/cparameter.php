<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cparameter extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mparameter');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mparameter->tampil($field)->result_object();
		$a['page']	= "parameter";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_parameter(){
		
		$a['page']	= "parameter/tambah_parameter";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tparameter';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cparameter/tampil','refresh');
	}



	function editparameter($id){
		$a['page']	= "parameter/edit_parameter";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tparameter';
		$idtable =  'idparameter';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusparameter($id){
		$this->mparameter->hapusparameter($id);
		redirect('cparameter/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mparameter->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mparameter->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mparameter->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mparameter->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mparameter->get_headerpopup($string);
    }


}

