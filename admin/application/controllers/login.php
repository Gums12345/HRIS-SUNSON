<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('url','form'));
		 $this->load->model('model_admin');
	}

	public function index()
	{
		if($this->session->userdata('admin_valid') == TRUE ){
			redirect("admin");
		}
		
		$this->load->view('login');
	}

	public function do_login()
	{
		$u = $this->input->post("user");
		$p = $_COOKIE['src'];
		// echo json_encode('user' => $user, 'pass' => $pass);
		// echo $u."<br>".$p;

		$cari = $this->model_admin->cek_login($u, $p)->row();
		$hitung = $this->model_admin->cek_login($u, $p)->num_rows();
		
		if ($hitung > 0) {
			
				
		
			$data = array('admin_id' => $cari->iduser ,
							'admin_user' => $cari->username, 
							'idkaryawan' => $cari->idkaryawan,
							'admin_nama' => $cari->nama,
							'masuk' => $cari->masuk,	
							'admin_valid' => TRUE			
			);
			
			
			$this->session->set_userdata($data);

			redirect('admin','refresh');
		}else{
			echo "maaf username atau password salah";
		}
		
		
		
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('login');
	}
	public function gantilogin()
	{


		redirect('./login/gantilogin');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */