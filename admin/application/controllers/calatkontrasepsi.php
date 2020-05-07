<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class calatkontrasepsi extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('malatkontrasepsi');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->malatkontrasepsi->tampil($field)->result_object();
		$a['page']	= "alat_kontrasepsi";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_alatkontrasepsi(){
		
		$a['page']	= "alatkontrasepsi/tambah_alatkontrasepsi";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'talat_kontrasepsi';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('calatkontrasepsi/tampil','refresh');
	}



	function editalat_kontrasepsi($id){
		$a['page']	= "alatkontrasepsi/edit_alatkontrasepsi";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'talat_kontrasepsi';
		$idtable =  'idalat_kontrasepsi';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusalatkontrasepsi($id){
		$this->malatkontrasepsi->hapusalatkontrasepsi($id);
		redirect('calatkontrasepsi/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->malatkontrasepsi->getjson();
    }

	
	function urlcmb()
    {

		echo $this->malatkontrasepsi->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->malatkontrasepsi->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->malatkontrasepsi->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->malatkontrasepsi->get_headerpopup($string);
    }


}

