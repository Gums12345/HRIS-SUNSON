<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cliburnasional extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mliburnasional');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mliburnasional->tampil($field)->result_object();
		$a['page']	= "liburnasional";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_liburnasional(){
		
		$a['page']	= "liburnasional/tambah_liburnasional";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tlibur_nasional';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cliburnasional/tampil','refresh');
	}



	function editliburnasional($id){
		$a['page']	= "liburnasional/edit_liburnasional";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tlibur_nasional';
		$idtable =  'idlibur_nasional';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusliburnasional($id){
		$this->mliburnasional->hapusliburnasional($id);
		redirect('cliburnasional/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mliburnasional->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mliburnasional->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mliburnasional->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mliburnasional->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mliburnasional->get_headerpopup($string);
    }


}

