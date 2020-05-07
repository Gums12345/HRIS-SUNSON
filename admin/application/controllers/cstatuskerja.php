<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cstatuskerja extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mstatuskerja');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mstatuskerja->tampil($field)->result_object();
		$a['page']	= "status_kerja";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_statuskerja(){
		
		$a['page']	= "statuskerja/tambah_statuskerja";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tstatus_kerja';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cstatuskerja/tampil','refresh');
	}



	function editstatus_kerja($id){
		$a['page']	= "statuskerja/edit_statuskerja";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tstatus_kerja';
		$idtable =  'idstatus_kerja';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusstatuskerja($id){
		$this->mstatuskerja->hapusstatuskerja($id);
		redirect('cstatuskerja/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mstatuskerja->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mstatuskerja->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mstatuskerja->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mstatuskerja->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mstatuskerja->get_headerpopup($string);
    }


}

