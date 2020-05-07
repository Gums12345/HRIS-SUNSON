<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cstatuspernikahan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mstatuspernikahan');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mstatuspernikahan->tampil($field)->result_object();
		$a['page']	= "status_pernikahan";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_statuspernikahan(){
		
		$a['page']	= "statuspernikahan/tambah_statuspernikahan";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tstatus_pernikahan';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cstatuspernikahan/tampil','refresh');
	}



	function editstatus_pernikahan($id){
		$a['page']	= "statuspernikahan/edit_statuspernikahan";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tstatus_pernikahan';
		$idtable =  'idstatus_pernikahan';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusstatuspernikahan($id){
		$this->mstatuspernikahan->hapusstatuspernikahan($id);
		redirect('cstatuspernikahan/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mstatuspernikahan->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mstatuspernikahan->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mstatuspernikahan->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mstatuspernikahan->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mstatuspernikahan->get_headerpopup($string);
    }


}

