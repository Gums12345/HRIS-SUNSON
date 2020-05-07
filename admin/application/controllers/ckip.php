<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ckip extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		// $this->load->helper(array('url','form'));
		
		 
		 $this->load->model('mkip');
		 
	}



	/* Fungsi Jenis Surat */
	function tampil(){
		 $this->session->unset_userdata('cari');
		 $this->session->set_userdata('cari', $this->input->post('table_search'));
		$a['data']	= $this->mkip->tampil()->result_object();
		$a['page']	= "kip";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_gajipokok(){
		
		$a['page']	= "gajipokok/tambah_gajipokok";
		$this->load->view('admin/index', $a);
	}

	function savecuti(){

	$nik=$this->input->get('nik');
	$tahun=$this->input->get('tahun');

	$tbl=$this->input->get('tbl');
	$jmlcuti=0;
	$jmlkip=0;
	$jmlip=0;
	if ($tbl == 'cut')
	{
		
		$query =   $this->db->query("SELECT  count(*) as jml from tcutitahunan WHERE nik =  '$nik' and tahun = '$tahun'  " );
		foreach ($query->result() as $row)
			{
				$jmlcuti= $row->jml;
					   
			}
			if ($jmlcuti == 0 )
				{$this->insertcuti();}
			if ($jmlcuti > 0 )
				{$this->updatecuti();}
		
	}
	if ($tbl == 'kip')
	{
	 $query =   $this->db->query("SELECT  count(*) as jml from tkip WHERE nik =  '$nik' and tahun = '$tahun'  " );
		foreach ($query->result() as $row)
			{
				$jmlkip= $row->jml;	   
			}
			if ($jmlkip == 0 )
				{$this->insertkip();}
			if ($jmlkip > 0 )
				{$this->updatekip();}
			
	}
	
	if ($tbl == 'jml')
	{
	 $query =   $this->db->query("SELECT  count(*) as jml from tip WHERE nik =  '$nik' and tahun = '$tahun'  " );
		foreach ($query->result() as $row)
			{
				$jmlip= $row->jml;
					   
			}
			
			if ($jmlip == 0 )
				{$this->insertip();}
			if ($jmlip > 0 )
				{$this->updateip();}
	}
	
	
	
	}
	function insertcuti(){
		$table =  'tcutitahunan';
		$tahun=$this->input->get('tahun');
		$tanggal_diangkat = $this->input->get('tanggal_diangkat');
		
		$periode = $tahun - 1 . substr($tanggal_diangkat,4);
		$tglberlaku_cuti =  $tahun  . substr($tanggal_diangkat,4);
		$tglberakhir_cuti =  $tahun + 1 . substr($tanggal_diangkat,4);
		$periode_berlaku =  $periode . ' ' .  ($tahun . substr($tanggal_diangkat,4)) ;
			
		
		$data=array ('idkaryawan' => $this->input->get('idkaryawan'),
		'nik' => $this->input->get('nik'),
		'tahun' => $this->input->get('tahun'),
		'periode' => $periode_berlaku,
		'tglberlaku_cuti' => $tglberlaku_cuti,
		'tglberakhir_cuti' => $tglberakhir_cuti,
		'trigerfromtkaryawan' => '1',
		'jmlcuti' => $this->input->get('jmlcuti'));
		$this->db->insert($table, $data );

	}
	function insertkip(){
		$table =  'tkip';
		$tahun=$this->input->get('tahun');
		$tanggal_diangkat = $this->input->get('tanggal_diangkat');
		
		$periode = $tahun - 6 . substr($tanggal_diangkat,4);
		$tglberlaku_cuti =  $tahun  . substr($tanggal_diangkat,4);
		$tglberakhir_cuti =  $tahun + 3 . substr($tanggal_diangkat,4);
		$periode_berlaku =  $periode . ' ' .  ($tahun . substr($tanggal_diangkat,4)) ;
			
		
		$data=array ('idkaryawan' => $this->input->get('idkaryawan'),
		'nik' => $this->input->get('nik'),
		'tahun' => $this->input->get('tahun'),
		'periode' => $periode_berlaku,
		'tglberlaku_cuti' => $tglberlaku_cuti,
		'tglberakhir_cuti' => $tglberakhir_cuti,
		'trigerfromtkaryawan' => '1',
		'jmlcuti' => $this->input->get('jmlcuti'));
		$this->db->insert($table, $data );

	}
	
	function insertip(){
		$table =  'tip';
		$tahun=$this->input->get('tahun');
		$tanggal_diangkat = $this->input->get('tanggal_diangkat');
		$periode = $tahun - 1 . substr($tanggal_diangkat,4);
		$periode =  $periode . ' ' .  ($tahun . substr($tanggal_diangkat,4)) ;
		$data=array ('idkaryawan' => $this->input->get('idkaryawan'),
		'nik' => $this->input->get('nik'),
		'tahun' => $this->input->get('tahun'),
		'periode' => $periode,
		'trigerfromtkaryawan' => '1',
		'jmlcuti' => $this->input->get('jmlcuti'));
		$this->db->insert($table, $data );

	}

	function editkip($id){
		$a['page']	= "gajipokok/edit_gajipokok";
		$this->load->view('admin/index', $a, $id);
	}

	function updatecuti(){
		$nik=$this->input->get('nik');
		$tahun=$this->input->get('tahun');
		$jmlcuti = $this->input->get('jmlcuti');
		$this->db->query("update tcutitahunan 
			set jmlcuti = '$jmlcuti'
			where nik = '$nik'  and tahun =  '$tahun'");


	}
	function updateip(){
		$nik=$this->input->get('nik');
		$tahun=$this->input->get('tahun');
		$jmlcuti = $this->input->get('jmlcuti');
		$this->db->query("update tip 
			set jmlcuti = '$jmlcuti'
			where nik = '$nik'  and tahun =  '$tahun'");


	}
	function updatekip(){
		$nik=$this->input->get('nik');
		$tahun=$this->input->get('tahun');
		$jmlcuti = $this->input->get('jmlcuti');
		$this->db->query("update tkip 
			set jmlcuti = '$jmlcuti'
			where nik = '$nik'  and tahun =  '$tahun'");

	}

	

	function hapusgajipokok($id){
		$this->mkip->hapusgajipokok($id);
		redirect('cgajipokok/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mkip->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mkip->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mkip->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	


  	echo $this->mkip->get_datapopup();
    }
	
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mkip->get_headerpopup($string);
    }


}

