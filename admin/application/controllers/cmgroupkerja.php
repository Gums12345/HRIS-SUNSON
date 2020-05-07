<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmgroupkerja extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mmgroupkerja');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mmgroupkerja->tampil($field)->result_object();
		$a['page']	= "mgroup_kerja";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_mgroupkerja(){
		
		$a['page']	= "mgroupkerja/tambah_mgroupkerja";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tmgroup_kerja';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cmgroupkerja/tampil','refresh');
	}



	function editmgroup_kerja($id){
		$a['page']	= "mgroupkerja/edit_mgroupkerja";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tmgroup_kerja';
		$idtable =  'idmgroup_kerja';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusmgroupkerja($id){
		$this->mmgroupkerja->hapusmgroupkerja($id);
		redirect('cmgroupkerja/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mmgroupkerja->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mmgroupkerja->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mmgroupkerja->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mmgroupkerja->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mmgroupkerja->get_headerpopup($string);
    }


}

