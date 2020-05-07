<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cjadwalkerja extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		 $this->load->model('mjadwalkerja');
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		$field =  $this->input->post('table_search');
		$a['data']	= $this->mjadwalkerja->tampil($field)->result_object();
		$a['page']	= "jadwalkerja1";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_jadwalkerja(){
		
		$a['page']	= "jadwalkerja/tambah_jadwalkerja";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tjadwal_kerja';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cjadwalkerja/tampil','refresh');
	}



	function editjadwalkerja($id){
		$a['page']	= "jadwalkerja/edit_jadwalkerja";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tjadwal_kerja';
		$idtable =  'idjadwal_kerja';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	function mjadwalkerja(){
		$table =  'tmjadwal_kerja';
		$mtahun =  $this->input->get('mtahun');
		$idmgroupkerja=$this->input->get('idmgroupkerja');
		$query =   $this->db->query("SELECT  count(*) as jml from tmjadwal_kerja WHERE thn =  '$mtahun' and idmgroup_kerja = '$idmgroupkerja'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					for ($x = 1; $x <= 12 ; $x++) {	
						$data=array ('idmgroup_kerja' => $this->input->get('idmgroupkerja'),
						'thn' => $this->input->get('mtahun'),
						'bln' => $x,
						'a1' => 0,'a2' => 0,'a3' => 0,'a4' => 0,'a5' => 0,'a6' => 0,'a7' => 0,'a8' => 0,'a9' => 0,'a10' => 0,
						'a11' => 0,'a12' => 0,'a13' => 0,'a14' => 0,'a15' => 0,'a16' => 0,'a17' => 0,'a18' => 0,'a19' => 0,'a20' => 0,
						'a21' => 0,'a22' => 0,'a23' => 0,'a24' => 0,'a25' => 0,'a26' => 0,'a27' => 0,'a28' => 0,'a29' => 0,'a30' => 0,'a31' => 0);
						$this->db->insert($table, $data );
					}
				}
			


	}
	
	 function arrayparameter()
    {

		echo $this->mjadwalkerja->arrayparameter();
    }
	
	function tampilmjadwalkerja(){
		$mtahun =  $this->input->get('mtahun');
		$idmgroupkerja=$this->input->get('idmgroupkerja');
		echo $this->mjadwalkerja->get_datapopup1($mtahun,$idmgroupkerja);

	}



	function hapusjadwalkerja($id){
		$this->mjadwalkerja->hapusjadwalkerja($id);
		redirect('cjadwalkerja/tampil','refresh');
	}

	
	

	function updatemjadwalkerja(){
		$tahun=$this->input->get('thn');
		$bln=$this->input->get('bln');
		$field=$this->input->get('field');
		$value=$this->input->get('value');
		$idmgroupkerja=$this->input->get('idmgroupkerja');
	
		$this->db->query("update tmjadwal_kerja 
			set " . $field . " = '$value', fld = '$field', vfld = '$value'
			where thn = '$tahun' and bln = '$bln'  and idmgroup_kerja =  '$idmgroupkerja'");
			
		$tgl = $tahun . '-' . $bln . '-' . substr($field,1);
		$query =   $this->db->query("SELECT  COUNT(*) AS jml FROM tjadwal_kerja WHERE tgl = '$tgl' and idmgroup_kerja = '$idmgroupkerja' and idparameter = '$value' " );
		
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;
					   
			}

			if ($jml == 0 )
				{$this->insertjadwalkerja();}
			if ($jml > 0 )
				{$this->updatejadwalkerja();}


	}
	
	function insertjadwalkerja(){
		$table =  'tjadwal_kerja';
		$tahun=$this->input->get('thn');
		$bln=$this->input->get('bln');
		$field=$this->input->get('field');
		$value=$this->input->get('value');
		$tgl = printf ($tahun . '-' . $bln . '-' . substr($field,1));
		
			/*echo "<script> alert( $tgl ) </script>";*/
		$data=array ('tgl' => $this->input->post('idkaryawan'),
		'idmgroup_kerja' => $this->input->post('gajipokok'),
		'idparameter' => $this->input->post('jabatan'));
		$this->db->insert($table, $data );

	}
	
	function updatejadwalkerja(){
	$tahun=$this->input->get('thn');
	$bln=$this->input->get('bln');
	$field=$this->input->get('field');
	$value=$this->input->get('value');
	$idmgroupkerja=$this->input->get('idmgroupkerja');
	
	$tgl = printf ($tahun . '-' . $bln . '-' . substr($field,1));
		$this->db->query("update tjadwal_kerja 
			set tgl = '$tgl', idmgroup_kerja = '$idmgroupkerja', idparameter = '$value'
			 WHERE tgl = '$tgl' and idmgroup_kerja = '$idmgroupkerja' and idparameter = '$value' ");


	}
	
	function getjsonsample()
    {
		echo $this->mjadwalkerja->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mjadwalkerja->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mjadwalkerja->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mjadwalkerja->get_datapopup($string);
    }
	
	function getjson_popup1()
    {
	
		/*echo $this->mjadwalkerja->get_datapopup1($string);*/
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mjadwalkerja->get_headerpopup($string);
    }


}

