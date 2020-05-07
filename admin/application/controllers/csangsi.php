<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class csangsi extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('msangsi');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->msangsi->tampil($field)->result_object();
		$a['page']	= "sangsi";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_sangsi(){
		
		$a['page']	= "sangsi/tambah_sangsi";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tsangsi';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('csangsi/tampil','refresh');
	}



	function editsangsi($id){
		$a['page']	= "sangsi/edit_sangsi";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tsangsi';
		$idtable =  'idsangsi';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapussangsi($id){
		$this->msangsi->hapussangsi($id);
		redirect('csangsi/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->msangsi->getjson();
    }

	
	function urlcmb()
    {

		echo $this->msangsi->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->msangsi->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->msangsi->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->msangsi->get_headerpopup($string);
    }


}

