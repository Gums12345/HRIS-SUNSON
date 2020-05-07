<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cdepartemen extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mdepartemen');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mdepartemen->tampil($field)->result_object();
		$a['page']	= "departemen";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_departemen(){
		
		$a['page']	= "departemen/tambah_departemen";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tdepartemen';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cdepartemen/tampil','refresh');
	}



	function editdepartemen($id){
		$a['page']	= "departemen/edit_departemen";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tdepartemen';
		$idtable =  'iddepartemen';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusdepartemen($id){
		$this->mdepartemen->hapusdepartemen($id);
		redirect('cdepartemen/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mdepartemen->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mdepartemen->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mdepartemen->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mdepartemen->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mdepartemen->get_headerpopup($string);
    }


}

