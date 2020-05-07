<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ctransportlembur extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mtransportlembur');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mtransportlembur->tampil($field)->result_object();
		$a['page']	= "transportlembur";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_transportlembur(){
		
		$a['page']	= "transportlembur/tambah_transportlembur";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'ttransportlembur';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('ctransportlembur/tampil','refresh');
	}



	function edittransportlembur($id){
		$a['page']	= "transportlembur/edit_transportlembur";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'ttransportlembur';
		$idtable =  'idtransportlembur';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapustransportlembur($id){
		$this->mtransportlembur->hapustransportlembur($id);
		redirect('ctransportlembur/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mtransportlembur->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mtransportlembur->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mtransportlembur->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mtransportlembur->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mtransportlembur->get_headerpopup($string);
    }


}

