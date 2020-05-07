<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cdivisi extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mdivisi');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mdivisi->tampil($field)->result_object();
		$a['page']	= "divisi";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_divisi(){
		
		$a['page']	= "divisi/tambah_divisi";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tdivisi';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cdivisi/tampil','refresh');
	}



	function editdivisi($id){
		$a['page']	= "divisi/edit_divisi";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tdivisi';
		$idtable =  'iddivisi';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusdivisi($id){
		$this->mdivisi->hapusdivisi($id);
		redirect('cdivisi/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mdivisi->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mdivisi->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mdivisi->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mdivisi->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mdivisi->get_headerpopup($string);
    }


}

