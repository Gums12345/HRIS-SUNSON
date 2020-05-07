<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ckaryawan extends CI_Controller {

	    public function __construct() {
        parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->library('pdf');
        $this->load->model('report/mkaryawan');
    }
    
 
	
	function tampil(){
		
		$a['page']	= "report/karyawan";

		$this->load->view('admin/index', $a);
	}
	
	
	function json() {
	 $field=$this->input->post('field');
       echo $this->mkaryawan->json($field);
    }

	

	
	function preview(){

		$field = $_GET['field'];
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
       
       

        // Memberikan space kebawah agar tidak terlalu rapat
/*        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIK',1,0);
        $pdf->Cell(85,6,'NAMA',1,0);
        $pdf->Cell(27,6,'Tanggal Lahir',1,0);
        $pdf->Cell(25,6,'Agama',1,1);*/

        $sql = " SELECT a.idkaryawan,a.pin,a.nik,a.noktp,a.nobpjs,a.bpjstk,a.nama,a.tempat_lahir,a.tanggal_lahir,a.agama,a.jk,k.gaji_pokok,
				CONCAT_WS(' ',a.alamat, e.name ,f.name,g.name ,h.name) as alt,a.tlp,j.divisi,
				a.hp,b.pendidikan,c.jabatan,d.departemen,i.mgroup_kerja ,a.jobdesk,a.tanggal_masuk,a.tanggal_keluar,a.`tanggal_diangkat`
				
				FROM tkaryawan AS a LEFT JOIN tpendidikan AS b ON a.idpendidikan = b.`idpendidikan`
				LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan`
				LEFT JOIN tdepartemen AS d ON a.`iddepartemen` = d.`iddepartemen` left join villages as e ON a.iddesa = e.id
				left join districts as f on a.idkecamatan = f.id
				left join regencies as g on a.idkota = g.id
				left join provinces as h on a.idpropinsi = h.id
				left join tmgroup_kerja as i on a.idgroup = i.idmgroup_kerja
				left join tdivisi as j on a.iddivisi = j.iddivisi left join tgapok as k ON a.idkaryawan = k.idkaryawan
				  where a.nama like '" . $field . "%' or a.nik like '" . $field . "%' or a.jk like '" . $field . "%'  or c.jabatan like '" . $field . "%' or d.departemen like '" . $field . "%'  or i.mgroup_kerja like '" . $field . "%' or a.hp like '" . $field . "%'";
        $mahasiswa = $this->db->query($sql);
        foreach ($mahasiswa->result() as $row){
		 $pdf->SetFont('Arial','B',16);
        // mencetak string 
        	$pdf->Cell(190,25,'DAFTAR KELUARGA',0,1,'C');
			$pdf->SetFont('Arial','',11);
			
			$pdf->Cell(6,7,'I.     1.     Nama Pekerja                        :  '.$row->nik,0,1, 'L');
			$pdf->Cell(5,7,'       2.     Jabatan                                  :  '.$row->nama,0,1, 'L');
			$pdf->Cell(5,7,'       3.     Dept/Bagian/Group                :  '.$row->departemen,0,1, 'L');
			$pdf->Cell(5,7,'       4.     Tempat/Tgl. Lahir                   :  '.$row->tempat_lahir.' ' .$row->tanggal_lahir,0,1, 'L');
			$pdf->Cell(5,7,'       5.     Alamat Pekerja                       :  '.$row->alt,0,1, 'L');
			$pdf->Cell(5,7,'       6.     Alat Kontrasepsi                     :  ',0,1, 'L');
			$pdf->Cell(5,5,'       7.     Penghasilan                           :  ',0,1, 'L');
			$pdf->ln(1);
			$pdf->Cell(5,5,'              a. Gaji Pokok                           :  '. "Rp " . number_format($row->gaji_pokok,2,',','.'),0,1, 'L');
			$pdf->Cell(5,5,'              b. Premi/Lain-lain                    :  ',0,1, 'L');
			$pdf->Cell(5,5,'              c. Pemberian Makan               :  ',0,1, 'L');
			$pdf->Cell(5,5,'              d. Pemberian Pakaian             :  ',0,1, 'L');

			
			 
            $pdf->SetFont('Arial','B',10);
			
			$pdf->Cell(6,10,'II.     Hubungan Keluarga ( Istri / Suami dan Anak )                        ',0,1, 'L');
			$pdf->SetX(19);
			$pdf->Cell(35,6,'Hub. Keluaraga',1,0,'C');
			$pdf->Cell(65,6,'Nama',1,0,'C');
			$pdf->Cell(27,6,'Tanggal Lahir',1,0,'C');
			$pdf->Cell(35,6,'Alamat',1,0,'C');
			$pdf->Cell(25,6,'Ket',1,1,'C');
			$pdf->SetFont('Arial','',10);
			$pdf->SetX(19);
			$pdf->Cell(35,6,' a. Suami/Istri',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			$pdf->Cell(25,6,'',1,1); 
			$pdf->SetX(19);
			$pdf->Cell(35,6,' b. Anak Ke 1',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			$pdf->Cell(25,6,'',1,1); 
			$pdf->SetX(19);
			$pdf->Cell(35,6,' c. Anak Ke 2',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			$pdf->Cell(25,6,'',1,1); 
			$pdf->SetX(19);
			$pdf->Cell(35,6,' d. Anak Ke 3',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			$pdf->Cell(25,6,'',1,1); 
			$pdf->ln(3);
			
			 $pdf->SetFont('Arial','B',10);
			
			$pdf->Cell(6,10,'III.     Hubungan Keluarga ( Orang Tua )                        ',0,1, 'L');
			$pdf->SetX(19);
			$pdf->Cell(35,6,'Hub. Keluaraga',1,0,'C');
			$pdf->Cell(65,6,'Nama',1,0,'C');
			$pdf->Cell(27,6,'Tanggal Lahir',1,0,'C');
			$pdf->Cell(35,6,'Alamat',1,0,'C');
			$pdf->Cell(25,6,'Ket',1,1,'C');
			$pdf->SetFont('Arial','',10);
			$pdf->SetX(19);
			$pdf->SetX(19);
			$pdf->Cell(35,6,' a. Ayah',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			$pdf->Cell(25,6,'',1,1); 
			$pdf->SetX(19);
			$pdf->Cell(35,6,' b. Ibu',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			$pdf->Cell(25,6,'',1,1); 
			$pdf->SetX(19);
			$pdf->Cell(35,6,' ',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			$pdf->Cell(25,6,'',1,1); 
			$pdf->SetX(19);
			$pdf->Cell(35,6,' ',1,0,'L');
            $pdf->Cell(65,6,'',1,0);
            $pdf->Cell(27,6,'',1,0);
            $pdf->Cell(35,6,'',1,0); 
			
			$pdf->Cell(25,6,'',1,1); 
			
			$pdf->ln(3);
			$pdf->SetX(28);
			$pdf->Cell(35,6,'Daftar Keluarga ini dibuat dengan sebenarnya. Apabila dikemudian hari ternyata Daftar Keluarga ini tidak benar,',0,1,'l');
			$pdf->SetX(19);
			$pdf->Cell(35,4,'maka saya bersedia diselesaikan secara hukum berlaku.',0,1,'l');
			$pdf->ln(20);
			$pdf->SetX(160);
			$pdf->Cell(35,4,'Cianjur, ' . date('d F Y') ,0,1,'l');

			$pdf->SetX(30);
			$pdf->Cell(35,4,'Mengetahui',0,1,'l');
			$pdf->ln(2);
			$pdf->SetX(19);
			$pdf->Cell(35,4,'Ketua RT / Kepala Desa                                                                                                  Karyawan yang bersangkutan',0,1,'l');
			$pdf->ln(30);
			$pdf->SetX(19);
			$pdf->Cell(35,4,'(...................................)                                                                                                  (...............................................)',0,1,'l');
			$pdf->SetX(19);
			$pdf->Cell(35,4,'       ( Nama Jelas )                                                                                                                       ( Nama Jelas )',0,1,'l');
			$pdf->ln(20);
			
        }

        $pdf->Output();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mkaryawan->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mkaryawan->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mkaryawan->get_headerpopup($string);
    }


}


