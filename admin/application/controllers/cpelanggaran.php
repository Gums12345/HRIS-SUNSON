<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cpelanggaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mpelanggaran');
	}
		function upload(){
			$config['upload_path'] = './assets/images';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
		$a['data']	= $this->mpelanggaran->tampil($field)->result_object();
		$a['page']	= "pelanggaran";
		
		$this->load->view('admin/index', $a);
	}
	
	function getsangsi(){
        $id=$this->input->get('id');
		echo $this->mpelanggaran->getsangsi($id);
    }
	
	function updatestatus(){
		/*$tgl=$this->input->post('tgl');
		$table =  'tpelanggaran';
		$data=array ('status' => '1'));
		$this->db->where( 'tglberakhir_sangsi', $tgl);
		$this->db->update($table, $data);*/
		$tgl1 = $this->input->get('tgl');
		$tgl=$tgl1;
		/*echo '<script> alert (' . $tgl . ') </script>';*/
		$this->db->query("update tpelanggaran set status = '1'  where DATE_FORMAT(tglberakhir_sangsi, '%Y%m%y') <=  DATE_FORMAT($tgl, '%Y%m%y') and status is null");
	
	}
	
	function tambah_pelanggaran(){
		
		$a['page']	= "pelanggaran/tambah_pelanggaran";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tpelanggaran';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cpelanggaran/tampil','refresh');
	}



	function editpelanggaran($id){
		$a['page']	= "pelanggaran/edit_pelanggaran";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tpelanggaran';
		$idtable =  'idpelanggaran';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapuspelanggaran($id){
		$this->mpelanggaran->hapuspelanggaran($id);
		redirect('cpelanggaran/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mpelanggaran->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mpelanggaran->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mpelanggaran->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$field =  $this->input->get('field');
		echo $this->mpelanggaran->get_datapopup($field);
    }
	
	function getjson_popupsaksi()
    {
	
		$field =  $this->input->get('field');
		echo $this->mpelanggaran->get_datapopupsaksi($field);
    }
	
	function getjson_popuppelapor()
    {
	
		$field =  $this->input->get('field');
		echo $this->mpelanggaran->get_datapopuppelapor($field);
    }
	
	function getjson_headerpopup()
    {
	
		$field =  $this->input->get('field');
		echo $this->mpelanggaran->get_headerpopup($field);
    }


}

