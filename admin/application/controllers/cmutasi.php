<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmutasi extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->model('mmutasi');
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
		$a['data']	= $this->mmutasi->tampil($field)->result_object();
		$a['page']	= "mutasi";
		
		$this->load->view('admin/index', $a);
	}
	
	function getsangsi(){
        $id=$this->input->get('id');
		echo $this->mmutasi->getsangsi($id);
    }
	
	function updatestatus(){
		/*$tgl=$this->input->post('tgl');
		$table =  'tmutasi';
		$data=array ('status' => '1'));
		$this->db->where( 'tglberakhir_sangsi', $tgl);
		$this->db->update($table, $data);*/
		$tgl1 = $this->input->get('tgl');
		$tgl=$tgl1;
		/*echo '<script> alert (' . $tgl . ') </script>';*/
		$this->db->query("update tmutasi set status = '1'  where DATE_FORMAT(tglberakhir_sangsi, '%Y%m%y') <=  DATE_FORMAT($tgl, '%Y%m%y') and status is null");
	
	}
	
	function tambah_mutasi(){
		
		$a['page']	= "mutasi/tambah_mutasi";
		$this->load->view('admin/index', $a);
	}

	function insertdata(){
		$table =  'tmutasi';
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->insert($table, $myjson );
		redirect('cmutasi/tampil','refresh');
	}



	function editmutasi($id){
		$a['page']	= "mutasi/edit_mutasi";
		$this->load->view('admin/index', $a, $id);
	}

	function updatedata(){
		$table =   'tmutasi';
		$idtable =  'idmutasi';
		$id = $_GET['id'];
		$bagong = $this->input->get('myjson');
		$myjson =json_decode($bagong,true);
		$this->db->where( $idtable, $id);
		$this->db->update($table, $myjson); 


	}

	

	function hapusmutasi($id){
		$this->mmutasi->hapusmutasi($id);
		redirect('cmutasi/tampil','refresh');
	}

	function getjsonsample()
    {
		echo $this->mmutasi->getjson();
    }

	
	function urlcmb()
    {

		echo $this->mmutasi->url();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mmutasi->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$field =  $this->input->get('field');
		echo $this->mmutasi->get_datapopup($field);
    }
	
	function getjson_popupdepartemen()
    {
	
		$field =  $this->input->get('field');
		echo $this->mmutasi->get_datapopupdepartemen($field);
    }
	
	function getjson_popuphrd()
    {
	
		$field =  $this->input->get('field');
		echo $this->mmutasi->get_datapopuphrd($field);
    }
	function getjson_popupdirektur()
    {
	
		$field =  $this->input->get('field');
		echo $this->mmutasi->get_datapopupdirektur($field);
    }
	
	function getjson_headerpopup()
    {
	
		$field =  $this->input->get('field');
		echo $this->mmutasi->get_headerpopup($field);
    }


}

