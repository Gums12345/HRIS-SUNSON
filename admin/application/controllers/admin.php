<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		 $this->load->helper(array('url','form'));
		
		 $this->load->model('model_admin');
		 
	}

	function index(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
	    $idkaryawan = $this->session->userdata('idkaryawan');
		$a['kesiangan']	= $this->model_admin->kesiangan()->result_object();
		$a['mangkir']	= $this->model_admin->mangkir()->result_object();
		$a['pelbaru']	= $this->model_admin->pelbaru()->result_object();
		$a['pelaktif']	= $this->model_admin->pelaktif()->result_object();
		$a['pelberakhir']	= $this->model_admin->pelberakhir()->result_object();
		$a['approve']	= $this->model_admin->approve()->result_object();
		$a['approved']	= $this->model_admin->approved()->result_object();
		$a['reject']	= $this->model_admin->reject()->result_object();
		$a['profile1']	= $this->model_admin->profile1($idkaryawan)->result_object();
		$a['kontrakberakhir']	= $this->model_admin->kontrakberakhir()->result_object();
		/*$a['mangkir']	= $this->model_admin->tampil_demografi()->num_rows();
		
		$a['approve']	= $this->model_admin->tampil_demografi()->num_rows();
		$a['approve']	= $this->model_admin->tampil_demografi()->num_rows();
		$a['reject']	= $this->model_admin->tampil_demografi()->num_rows();
		
		$a['pelbaru']	= $this->model_admin->tampil_demografi()->num_rows();
		$a['pelaktif']	= $this->model_admin->tampil_demografi()->num_rows();*/

		/*$a['meninggal']	= $this->model_admin->tampil_meninggal()->num_rows();*/
		
		
		
		$a['page']	= "home";

		$this->load->view('admin/index', $a);
	}	


	function updatepassword(){
		/*$tgl=$this->input->post('tgl');
		$table =  'tpelanggaran';
		$data=array ('status' => '1'));
		$this->db->where( 'tglberakhir_sangsi', $tgl);
		$this->db->update($table, $data);*/
		$passbaru = $this->input->get('passbaru');
		$passlama = $this->input->get('passlama');
		$user = $this->input->get('user');
		/*echo '<script> alert (' . $tgl . ') </script>';*/
		echo $this->db->query("update sysuser set password = '$passbaru'  where username='$user' and password ='$passlama'");
		
	
	}
	/* Fungsi Manage User */
	function manage_user(){
		$a['data']	= $this->model_admin->tampil_user()->result_object();
		$a['page']	= "manage_user";
		
		$this->load->view('admin/index', $a);
	}
	
	

	function tambah_user(){
		$a['page']	= "tambah_user";
		
		$this->load->view('admin/index', $a);
	}

	function insert_user(){
		
		$user 	  = $this->input->post('user');
		$password = $this->input->post('password');
		$nama	  = $this->input->post('nama');

		$object = array(
				'username' => $user,
				'password' => md5($password),
				'nama' => $nama
			);
		$this->model_admin->insert_user($object);

		redirect('admin/manage_user','refresh');
	}
	function edithomespl(){
				 
				$id = $this->uri->segment(3); 
				 $idkaryawan =  $this->session->userdata('idkaryawan');
				/*echo '<script> alert (' . $tgl . ') </script>';*/
				$this->db->query("update tspl set acc = '1',acc_by = '$idkaryawan', acc_time = '" . date('Y-m-d H:i:s') . "' where idspl = $id");
				$this->db->query("update tabsen set acc = '1',acc_by = '$idkaryawan', acc_time = '" . date('Y-m-d H:i:s') . "' where idspl = $id");
				$a['kesiangan']	= $this->model_admin->kesiangan()->result_object();
				$a['mangkir']	= $this->model_admin->mangkir()->result_object();
				$a['pelbaru']	= $this->model_admin->pelbaru()->result_object();
				$a['pelaktif']	= $this->model_admin->pelaktif()->result_object();
				$a['pelberakhir']	= $this->model_admin->pelberakhir()->result_object();
				$a['approve']	= $this->model_admin->approve()->result_object();
				$a['approved']	= $this->model_admin->approved()->result_object();
				$a['reject']	= $this->model_admin->reject()->result_object();
				$a['page']	= "home";
				
				redirect('admin','refresh');
			}
		function rejecthomespl(){
				
				$id = $this->uri->segment(3); 
				$idkaryawan =  $this->session->userdata('idkaryawan');
				/*echo '<script> alert (' . $tgl . ') </script>';*/
				$this->db->query("update tspl set acc = '2',acc_by = '$idkaryawan', acc_time = '" . date('Y-m-d H:i:s') . "' where idspl = $id");
				$this->db->query("update tabsen set acc = '2',acc_by = '$idkaryawan', acc_time = '" . date('Y-m-d H:i:s') . "' where idspl = $id");
				$a['kesiangan']	= $this->model_admin->kesiangan()->result_object();
				$a['mangkir']	= $this->model_admin->mangkir()->result_object();
				$a['pelbaru']	= $this->model_admin->pelbaru()->result_object();
				$a['pelaktif']	= $this->model_admin->pelaktif()->result_object();
				$a['pelberakhir']	= $this->model_admin->pelberakhir()->result_object();
				$a['approve']	= $this->model_admin->approve()->result_object();
				$a['approved']	= $this->model_admin->approved()->result_object();
				$a['reject']	= $this->model_admin->reject()->result_object();
				$a['page']	= "home";
				redirect('admin','refresh');
			}
	function edit_user($id){
		$a['editdata']	= $this->model_admin->edit_user($id)->result_object();		
		$a['page']	= "edit_user";
		
		$this->load->view('admin/index', $a);
	}

	function update_user(){
		$id 	  = $this->input->post('id');
		$user 	  = $this->input->post('user');
		$password = $this->input->post('password');
		$pass_old = $this->input->post('pass_old');
		$nama	  = $this->input->post('nama');

		if (empty($password)) {
			$object = array(
				'username' => $username,
				'password' => $password,
				'nama' => $nama
			);
		}else{
			$object = array(
				'username' => $username,
				'password' => $pass_old,
				'nama' => $nama
			);
		}

		
		$this->model_admin->update_user($id, $object);

		redirect('admin/surat_keluar','refresh');
	}

	function hapus_user($id){
		
		$this->model_admin->hapus_user($id);
		redirect('admin/manage_user','refresh');
	}	

	function hideshowdashboard(){
		
	   $field =  $this->session->userdata('idkaryawan');
       echo $this->model_admin->hideshowdashboard($field);
	}	
	
	function getjson()
    {
	
	$field =  $this->input->get('field');
  
       echo $this->model_admin->get_filterdata($field);
	   
    }
function getjson_popup()
    {
	
	$field =  $this->input->get('field');
  	echo $this->model_admin->get_datapopup($field);
    }
}

