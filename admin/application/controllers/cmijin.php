<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmijin extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mmijin');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mmijin->tampil($field)->result_object();
		$a['page']	= "mijin";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_perijinan(){
		
		$a['page']	= "perijinan/tambah_perijinan";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tperijinan';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cmijin/tampil','refresh');
	}



	function editperijinan($id){
		$a['page']	= "perijinan/edit_perijinan";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tperijinan';
		$idtable =  'idperijinan';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusperijinan($id){
		$this->mmijin->hapusperijinan($id);
		redirect('cmijin/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mmijin->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mmijin->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mmijin->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mmijin->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mmijin->get_headerpopup($string);
    }


}

