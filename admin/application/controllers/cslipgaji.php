<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cslipgaji extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mslipgaji');
	}


	function tampil(){
		
		$a['page']	= "slipgaji";

		$this->load->view('admin/index', $a);
	}
	
	
	function json() {
	 $field=$this->input->post('field');
       echo $this->mslipgaji->json($field);
    }


	function tambah_slipgaji(){
		
		$a['page']	= "slipgaji/tambah_slipgaji";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tslipgaji';
		
		$tgl_awal=$this->input->get('tgl_awal');
		$tgl_akhir=$this->input->get('tgl_akhir');
		$iddepartemen=$this->input->post('iddepartemen');
		$iddivis=$this->input->post('iddivisi');
		$iduser=$this->session->userdata('idkaryawan'); 
		$query1 = $this->db->query("SELECT nik from tkaryawan as b  where b.idstatus_kerja <> 13 and nik = '074' " );

        foreach($query1->result_object() as $rows )
        {
    	$sql = "CALL hitunggaji(?,?,?,?)";
	     $this->db->query($sql,array('tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,'varnik'=>$rows->nik,'iduser'=>$iduser));
			
        }
		
	}



	function editslipgaji($id){
		$a['page']	= "slipgaji/edit_slipgaji";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tslipgaji';
		$idtable =  'idslipgaji';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusslipgaji($id){
		$this->mslipgaji->hapusslipgaji($id);
		redirect('cslipgaji/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mslipgaji->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mslipgaji->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mslipgaji->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mslipgaji->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mslipgaji->get_headerpopup($string);
    }


}

