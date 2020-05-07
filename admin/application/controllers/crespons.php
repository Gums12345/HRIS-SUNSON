<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class crespons extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mrespons');
		 $this->load->library('session');
		
	}


	function tampil(){
	if(isset($_GET[encrypt_url('file')])) 
	{
		$file=$_GET[encrypt_url('file')];
		$table=$_GET[encrypt_url('table')];
		$idtable=$_GET[encrypt_url('idtable')];
		$modelsql=$_GET[encrypt_url('modelsql')];
		$query=$_GET[encrypt_url('query')];
		$getfield=$_GET[encrypt_url('getfield')];
		$popup=$_GET[encrypt_url('popup')];
	 	$data = array(encrypt_url("file") => $file, encrypt_url("table") => $table, encrypt_url("idtable") => $idtable, encrypt_url("modelsql") => $modelsql, encrypt_url("getfield") => $getfield, encrypt_url("popup") => $popup, encrypt_url("query") => $query);
		$this->session->set_userdata($data);
	}
	
	 

		$src =  $this->input->post('table_search');
		$file =   decrypt_url($this->session->userdata(encrypt_url('file')));
		$a['data']	= $this->mrespons->tampil($src)->result_object();
		$query = "query";
		$a['header']	= $this->mrespons->babiarray($query)->result_object();
		$a['page']	= $file;
		$this->load->view('admin/index', $a);
	}

	function tambah_respons(){
		$file =   decrypt_url($this->session->userdata(encrypt_url('file')));
		$a['page']	= $file. "/tambah_" .$file;
		$this->load->view('admin/index', $a);
	}

	function insertrespons(){
		$table =  decrypt_url($this->session->userdata(encrypt_url('table')));
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('crespons/tampil','refresh');
	}



	function editrespons($id){
		$file =   decrypt_url($this->session->userdata(encrypt_url('file')));
		$a['page']	= $file. "/edit_" .$file;
		$this->load->view('admin/index', $a, $id);
	}

	function updaterespons(){
		$table =   decrypt_url($this->session->userdata(encrypt_url('table')));
		$idtable =  decrypt_url($this->session->userdata(encrypt_url('idtable')));
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		echo '<script type="text/javascript">alert(' .$myjson .');</script>';
		$this->db->where($idtable, $id);
		$this->db->update($table, $myjson); 

		
	}

	

	function hapusrespons($id){
		$this->mrespons->hapusrespons($id);
		redirect('crespons/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mrespons->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mrespons->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mrespons->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mrespons->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mrespons->get_headerpopup($string);
    }

}

