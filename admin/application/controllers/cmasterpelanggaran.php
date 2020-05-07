<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmasterpelanggaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mmasterpelanggaran');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mmasterpelanggaran->tampil($field)->result_object();
		$a['page']	= "master_pelanggaran";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_masterpelanggaran(){
		
		$a['page']	= "masterpelanggaran/tambah_masterpelanggaran";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tmaster_pelanggaran';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cmasterpelanggaran/tampil','refresh');
	}



	function editmaster_pelanggaran($id){
		$a['page']	= "masterpelanggaran/edit_masterpelanggaran";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tmaster_pelanggaran';
		$idtable =  'idmaster_pelanggaran';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusmasterpelanggaran($id){
		$this->mmasterpelanggaran->hapusmasterpelanggaran($id);
		redirect('cmasterpelanggaran/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mmasterpelanggaran->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mmasterpelanggaran->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mmasterpelanggaran->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mmasterpelanggaran->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mmasterpelanggaran->get_headerpopup($string);
    }


}

