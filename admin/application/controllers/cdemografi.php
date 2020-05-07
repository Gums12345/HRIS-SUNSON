<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cdemografi extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mdemografi');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mdemografi->tampil($field)->result_object();
		$a['page']	= "demografi";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_demografi(){
		
		$a['page']	= "demografi/tambah_demografi";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tdemografi';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cdemografi/tampil','refresh');
	}



	function editdemografi($id){
		$a['page']	= "demografi/edit_demografi";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tdemografi';
		$idtable =  'iddemografi';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusdemografi($id){
		$this->mdemografi->hapusdemografi($id);
		redirect('cdemografi/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mdemografi->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mdemografi->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mdemografi->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mdemografi->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mdemografi->get_headerpopup($string);
    }


}

