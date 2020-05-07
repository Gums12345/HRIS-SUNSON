<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cijin extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mijin');
	}
		function upload(){
			$config['upload_path'] = './assets/images';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
	
			$this->load->library('upload',$config);
				
			$field_name = "ijazahFile";
			if ( ! $this->upload->do_upload($field_name)) {
				// return the error message and kill the script
				//echo $this->upload->display_errors(); die();
				
			
			} else {
			
			}
			$field_name = "kkFile";
			if ( ! $this->upload->do_upload($field_name)) {
				// return the error message and kill the script
				//echo $this->upload->display_errors(); die();
				
			
			} else {
			
			}
		}


	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mijin->tampil($field)->result_object();
		$a['page']	= "ijin";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_ijin(){
		
		$a['page']	= "ijin/tambah_ijin";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tijin';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cijin/tampil','refresh');
	}



	function editijin($id){
		$a['page']	= "ijin/edit_ijin";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tijin';
		$idtable =  'idijin';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusijin($id){
		$this->mijin->hapusijin($id);
		redirect('cijin/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mijin->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mijin->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mijin->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
	$field =  $this->input->get('field');
  	echo $this->mijin->get_datapopup($field);
    }
	function getjson_headerpopup()
    {
	
		$field =  $this->input->get('field');
		echo $this->mijin->get_headerpopup($field);
    }


}

