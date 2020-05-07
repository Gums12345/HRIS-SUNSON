<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cspl extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mspl');
	}
		

	function simpandtl(){
			
			$nospl = $this->input->get('nospl');
			$idkaryawan = $this->input->get('idkaryawan');
			/*echo '<script> alert (' . $tgl . ') </script>';*/
			$this->db->query("insert into tspldtl (nospl,idkaryawan) values ($nospl,$idkaryawan)");
		
		}
	
	
		
	function deletedtl(){
			
			$nospl = $this->input->get('nospl');
			$this->db->query("delete from tspldtl where  (nospl = '" . $nospl . "' )");
		
		}
	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mspl->tampil($field)->result_object();
		$a['page']	= "spl";
		
		$this->load->view('admin/index', $a);
	}
	
	function tampiledit(){
		$field =  $this->input->get('nospl');	
		echo $this->mspl->tampiledit($field);
	}
	
	function updatestatus(){
		/*$tgl=$this->input->post('tgl');
		$table =  'tspl';
		$data=array ('status' => '1'));
		$this->db->where( 'tglberakhir_sangsi', $tgl);
		$this->db->update($table, $data);*/
		$tgl1 = $this->input->get('tgl');
		$tgl=$tgl1;
		/*echo '<script> alert (' . $tgl . ') </script>';*/
		$this->db->query("update tspl set status = '1'  where DATE_FORMAT(tglberakhir_sangsi, '%Y%m%y') <=  DATE_FORMAT($tgl, '%Y%m%y') and status <> '0'");
	
	}
	
	function carinik()
    {
		$nik =  $this->input->get('id');
		echo $this->mspl->carinik($nik);
    }
	
	function tambah_spl(){
		
		$a['page']	= "spl/tambah_spl";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tspl';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cspl/tampil','refresh');
	}



	function editspl($id){
		$a['page']	= "spl/edit_spl";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tspl';
		$idtable =  'idspl';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusspl($id){
		$this->mspl->hapusspl($id);
		redirect('cspl/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mspl->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mspl->url();
    }
	
	function urlautonumber()
    {

		echo $this->mspl->urlnumber();
    }
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mspl->mgetjsonshow($id);
    }
	
	function getjson_popupatasan()
    {
	
		$field =  $this->input->get('field');
		echo $this->mspl->get_datapopupatasan($field);
    }
	
	function getjson_popupmanager()
    {
	
		$field =  $this->input->get('field');
		echo $this->mspl->get_datapopupmanager($field);
    }
	
	
	
	function getjson_headerpopup()
    {
	
		$field =  $this->input->get('field');
		echo $this->mspl->get_headerpopup($field);
    }


}

