<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cgajipokok extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		
		 
		 $this->load->model('mgajipokok');
		 
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		 $this->session->unset_userdata('cari');
		 $this->session->set_userdata('cari', $this->input->post('table_search'));
		/*$a['data']	= $this->mgajipokok->tampil()->result_object();*/
		$a['page']	= "gajipokok";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_gajipokok(){
		
		$a['page']	= "gajipokok/tambah_gajipokok";
		$this->load->view('admin/index', $a);
	}
	
	
	function savegapok(){
	$jml = 0;
	
		$idkaryawan=$this->input->post('idkaryawan');
		$query =   $this->db->query("SELECT  count(*) as jml from tgapok WHERE idkaryawan =  '$idkaryawan'  " );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;
					   
			}
			if ($jml == 0 )
				{$this->insertdata();}
			if ($jml > 0 )
				{$this->updatedata();}
		
	}
	
	function insertdata(){
		$table =  'tgapok';
		
		$data=array ('idkaryawan' => $this->input->post('idkaryawan'),
		'gaji_pokok' => $this->input->post('gajipokok'),
		'tunj_jabatan' => $this->input->post('jabatan'),
		'tunj_prestasi' => $this->input->post('prestasi'),
		'tunj_fungsional' => $this->input->post('fungsional'),
		'tunj_hadir' => $this->input->post('hadir'),
		'tunj_masakerja' => $this->input->post('masakerja'),
		'tunj_lainnya' => $this->input->post('lainnya'),
		'pot_astek' => $this->input->post('astek'),
		'pot_spsi' => $this->input->post('spsi'),
		'pot_koperasi' => $this->input->post('koperasi'),
		'pot_bisnis' => $this->input->post('bisnis'));
		$this->db->insert($table, $data );
		redirect('cgajipokok/tampil','refresh');
	}



	function editgapok($id){
		$a['page']	= "gajipokok/edit_gajipokok";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$idtable='idkaryawan';
		$table =  'tgapok';
		$idkaryawan=$this->input->post('idkaryawan');
		$data=array ('idkaryawan' => $this->input->post('idkaryawan'),
		'gaji_pokok' => $this->input->post('gajipokok'),
		'tunj_jabatan' => $this->input->post('jabatan'),
		'tunj_prestasi' => $this->input->post('prestasi'),
		'tunj_fungsional' => $this->input->post('fungsional'),
		'tunj_hadir' => $this->input->post('hadir'),
		'tunj_masakerja' => $this->input->post('masakerja'),
		'tunj_lainnya' => $this->input->post('lainnya'),
		'pot_astek' => $this->input->post('astek'),
		'pot_spsi' => $this->input->post('spsi'),
		'pot_koperasi' => $this->input->post('koperasi'),
		'pot_bisnis' => $this->input->post('bisnis'));
		$this->db->where( $idtable, $idkaryawan);
		$this->db->update($table, $data);


	}

	

	function hapusgajipokok($id){
		$this->mgajipokok->hapusgajipokok($id);
		redirect('cgajipokok/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mgajipokok->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mgajipokok->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mgajipokok->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	


  	echo $this->mgajipokok->get_datapopup();
    }
	
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mgajipokok->get_headerpopup($string);
    }


}

