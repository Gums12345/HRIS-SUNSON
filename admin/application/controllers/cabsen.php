<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cabsen extends CI_Controller {

	    public function __construct() {
        parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
        $this->load->library('datatables');
        $this->load->model('mabsen');
    }
    
    
	
	function tampil(){
		
		$a['page']	= "absen";
		
		$this->load->view('admin/index', $a);
	}

    function json() {
	 $field=$this->input->post('field');
       echo $this->mabsen->json($field);
    }






	
	

	function tambah_absen(){
		
		$a['page']	= "absen/tambah_absen";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tabsen';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cabsen/tampil','refresh');
	}



	function editabsen($id){
		$a['page']	= "absen/edit_absen";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tabsen';
		$idtable =  'idabsen';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusabsen($id){
		$this->mabsen->hapusabsen($id);
		redirect('cabsen/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mabsen->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mabsen->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mabsen->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mabsen->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mabsen->get_headerpopup($string);
    }


}


