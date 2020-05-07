<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cpendidikan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mpendidikan');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mpendidikan->tampil($field)->result_object();
		$a['page']	= "pendidikan";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_pendidikan(){
		
		$a['page']	= "pendidikan/tambah_pendidikan";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tpendidikan';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cpendidikan/tampil','refresh');
	}



	function editpendidikan($id){
		$a['page']	= "pendidikan/edit_pendidikan";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tpendidikan';
		$idtable =  'idpendidikan';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapuspendidikan($id){
		$this->mpendidikan->hapuspendidikan($id);
		redirect('cpendidikan/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mpendidikan->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mpendidikan->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mpendidikan->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mpendidikan->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mpendidikan->get_headerpopup($string);
    }


}

