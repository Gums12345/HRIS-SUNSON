<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cabsen extends CI_Controller {

	    public function __construct() {
        parent::__construct();
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		 $this->load->library('pdf');
        $this->load->model('report/mabsen');
    }
    
 
	
	function tampil(){
		
		$a['page']	= "report/absen";

		$this->load->view('admin/index', $a);
	}
	
	
	function json() {
	 $field=$this->input->post('field');
	 $tglawal=$this->input->post('tglawal');
	 $tglakhir=$this->input->post('tglakhir');
       echo $this->mabsen->json($field,$tglawal,$tglakhir);
    }

	

	
	function preview(){

		$field = $_GET['field'];
		$tglawal = $_GET['tglawal'];
		$tglakhir = $_GET['tglakhir'];
		$cari = "where month(tgl_masuk) = month('" .  date("Y-m-d") . "') ";
		if ($field != '' && $tglawal != '' && $tglakhir != '')
		{
			$cari = "where tgl_masuk between  '" . $tglawal . "' and '" . $tglakhir . "'  and (a.nik = '" . $field . "' or b.nama = '" . $field . "' or  c.departemen = '" . $field . "' or d.divisi = '" . $field . "')" ;
		}
		if ($field == '' && $tglawal != '' && $tglakhir != '')
		{
			$cari = "where tgl_masuk between  '" . $tglawal . "' and '" . $tglakhir . "' " ;
		}
		if ($field != '' && ($tglawal == '' || $tglakhir == ''))
		{
			$cari = "where month(tgl_masuk) = month('" .  date("Y-m-d") . "') and (a.nik = '" . $field . "' or b.nama = '" . $field . "' or  c.departemen = '" . $field . "' or d.divisi = '" . $field . "')" ;
		}
        $pdf = new FPDF('l','mm', array(216, 330));
        // membuat halaman baru
        $pdf->AddPage();
		$pdf->SetMargins(8, 25, 1,1);
        // setting jenis font yang akan digunakan
       
       

        // Memberikan space kebawah agar tidak terlalu rapat
/*        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIK',1,0);
        $pdf->Cell(85,6,'NAMA',1,0);
        $pdf->Cell(27,6,'Tanggal Lahir',1,0);
        $pdf->Cell(25,6,'Agama',1,1);*/

        $sql = " SELECT nik,nama,departemen,divisi,
GROUP_CONCAT(m01) AS M01,GROUP_CONCAT(p01) AS P01,
GROUP_CONCAT(m02) AS M02,GROUP_CONCAT(p02) AS P02 ,
GROUP_CONCAT(m03) AS M03,GROUP_CONCAT(p03) AS P03,
GROUP_CONCAT(m04) AS M04,GROUP_CONCAT(p04) AS P04,
GROUP_CONCAT(m05) AS M05,GROUP_CONCAT(p05) AS P05,
GROUP_CONCAT(m06) AS M06,GROUP_CONCAT(p06) AS P06,
GROUP_CONCAT(m07) AS M07,GROUP_CONCAT(p07) AS P07,
GROUP_CONCAT(m08) AS M08,GROUP_CONCAT(p08) AS P08,
GROUP_CONCAT(m09) AS M09,GROUP_CONCAT(p09) AS P09,
GROUP_CONCAT(m10) AS M10,GROUP_CONCAT(p10) AS P10,
GROUP_CONCAT(m11) AS M11,GROUP_CONCAT(p11) AS P11,
GROUP_CONCAT(m12) AS M12,GROUP_CONCAT(p12) AS P12 ,
GROUP_CONCAT(m13) AS M13,GROUP_CONCAT(p13) AS P13,
GROUP_CONCAT(m14) AS M14,GROUP_CONCAT(p14) AS P14,
GROUP_CONCAT(m15) AS M15,GROUP_CONCAT(p15) AS P15,
GROUP_CONCAT(m16) AS M16,GROUP_CONCAT(p16) AS P16,
GROUP_CONCAT(m17) AS M17,GROUP_CONCAT(p17) AS P17,
GROUP_CONCAT(m18) AS M18,GROUP_CONCAT(p18) AS P18,
GROUP_CONCAT(m19) AS M19,GROUP_CONCAT(p19) AS P19,
GROUP_CONCAT(m20) AS M20,GROUP_CONCAT(p20) AS P20,
GROUP_CONCAT(m21) AS M21,GROUP_CONCAT(p21) AS P21,
GROUP_CONCAT(m22) AS M22,GROUP_CONCAT(p22) AS P22 ,
GROUP_CONCAT(m23) AS M23,GROUP_CONCAT(p23) AS P23,
GROUP_CONCAT(m24) AS M24,GROUP_CONCAT(p24) AS P24,
GROUP_CONCAT(m25) AS M25,GROUP_CONCAT(p25) AS P25,
GROUP_CONCAT(m26) AS M26,GROUP_CONCAT(p26) AS P26,
GROUP_CONCAT(m27) AS M27,GROUP_CONCAT(p27) AS P27,
GROUP_CONCAT(m28) AS M28,GROUP_CONCAT(p28) AS P28,
GROUP_CONCAT(m29) AS M29,GROUP_CONCAT(p29) AS P29,
GROUP_CONCAT(m30) AS M30,GROUP_CONCAT(p30) AS P30,
GROUP_CONCAT(m31) AS M31,GROUP_CONCAT(p31) AS P31

FROM
(SELECT a.nik,b.nama,c.departemen,d.divisi,
					CASE WHEN DAY(tgl_masuk)='1'  THEN jam_masuk END AS 'M01',
					CASE WHEN DAY(tgl_pulang)='1'  THEN jam_pulang END AS 'P01',
					CASE WHEN DAY(tgl_masuk)='2'  THEN jam_masuk END AS 'M02',
					CASE WHEN DAY(tgl_pulang)='2'  THEN jam_pulang END AS 'P02',
					CASE WHEN DAY(tgl_masuk)='3'  THEN jam_masuk END AS 'M03',
					CASE WHEN DAY(tgl_pulang)='3'  THEN jam_pulang END AS 'P03',
					CASE WHEN DAY(tgl_masuk)='4'  THEN jam_masuk END AS 'M04',
					CASE WHEN DAY(tgl_pulang)='4'  THEN jam_pulang END AS 'P04',
					CASE WHEN DAY(tgl_masuk)='5'  THEN jam_masuk END AS 'M05',
					CASE WHEN DAY(tgl_pulang)='5'  THEN jam_pulang END AS 'P05',
					CASE WHEN DAY(tgl_masuk)='6'  THEN jam_masuk END AS 'M06',
					CASE WHEN DAY(tgl_pulang)='6'  THEN jam_pulang END AS 'P06',
					CASE WHEN DAY(tgl_masuk)='7'  THEN jam_masuk END AS 'M07',
					CASE WHEN DAY(tgl_pulang)='7'  THEN jam_pulang END AS 'P07',
					CASE WHEN DAY(tgl_masuk)='8'  THEN jam_masuk END AS 'M08',
					CASE WHEN DAY(tgl_pulang)='8'  THEN jam_pulang END AS 'P08',
					CASE WHEN DAY(tgl_masuk)='9'  THEN jam_masuk END AS 'M09',
					CASE WHEN DAY(tgl_pulang)='9'  THEN jam_pulang END AS 'P09',
					CASE WHEN DAY(tgl_masuk)='10'  THEN jam_masuk END AS 'M10',
					CASE WHEN DAY(tgl_pulang)='10'  THEN jam_pulang END AS 'P10',
					CASE WHEN DAY(tgl_masuk)='11'  THEN jam_masuk END AS 'M11',
					CASE WHEN DAY(tgl_pulang)='11'  THEN jam_pulang END AS 'P11',
					CASE WHEN DAY(tgl_masuk)='12'  THEN jam_masuk END AS 'M12',
					CASE WHEN DAY(tgl_pulang)='12'  THEN jam_pulang END AS 'P12',
					CASE WHEN DAY(tgl_masuk)='13'  THEN jam_masuk END AS 'M13',
					CASE WHEN DAY(tgl_pulang)='13'  THEN jam_pulang END AS 'P13',
					CASE WHEN DAY(tgl_masuk)='14'  THEN jam_masuk END AS 'M14',
					CASE WHEN DAY(tgl_pulang)='14'  THEN jam_pulang END AS 'P14',
					CASE WHEN DAY(tgl_masuk)='15'  THEN jam_masuk END AS 'M15',
					CASE WHEN DAY(tgl_pulang)='15'  THEN jam_pulang END AS 'P15',
					CASE WHEN DAY(tgl_masuk)='16'  THEN jam_masuk END AS 'M16',
					CASE WHEN DAY(tgl_pulang)='16'  THEN jam_pulang END AS 'P16',
					CASE WHEN DAY(tgl_masuk)='17'  THEN jam_masuk END AS 'M17',
					CASE WHEN DAY(tgl_pulang)='17'  THEN jam_pulang END AS 'P17',
					CASE WHEN DAY(tgl_masuk)='18'  THEN jam_masuk END AS 'M18',
					CASE WHEN DAY(tgl_pulang)='18'  THEN jam_pulang END AS 'P18',
					CASE WHEN DAY(tgl_masuk)='19'  THEN jam_masuk END AS 'M19',
					CASE WHEN DAY(tgl_pulang)='19'  THEN jam_pulang END AS 'P19',
					CASE WHEN DAY(tgl_masuk)='20'  THEN jam_masuk END AS 'M20',
					CASE WHEN DAY(tgl_pulang)='20'  THEN jam_pulang END AS 'P20',
					CASE WHEN DAY(tgl_masuk)='21'  THEN jam_masuk END AS 'M21',
					CASE WHEN DAY(tgl_pulang)='21'  THEN jam_pulang END AS 'P21',
					CASE WHEN DAY(tgl_masuk)='22'  THEN jam_masuk END AS 'M22',
					CASE WHEN DAY(tgl_pulang)='22'  THEN jam_pulang END AS 'P22',
					CASE WHEN DAY(tgl_masuk)='23'  THEN jam_masuk END AS 'M23',
					CASE WHEN DAY(tgl_pulang)='23'  THEN jam_pulang END AS 'P23',
					CASE WHEN DAY(tgl_masuk)='24'  THEN jam_masuk END AS 'M24',
					CASE WHEN DAY(tgl_pulang)='24'  THEN jam_pulang END AS 'P24',
					CASE WHEN DAY(tgl_masuk)='25'  THEN jam_masuk END AS 'M25',
					CASE WHEN DAY(tgl_pulang)='25'  THEN jam_pulang END AS 'P25',
					CASE WHEN DAY(tgl_masuk)='26'  THEN jam_masuk END AS 'M26',
					CASE WHEN DAY(tgl_pulang)='26'  THEN jam_pulang END AS 'P26',
					CASE WHEN DAY(tgl_masuk)='27'  THEN jam_masuk END AS 'M27',
					CASE WHEN DAY(tgl_pulang)='27'  THEN jam_pulang END AS 'P27',
					CASE WHEN DAY(tgl_masuk)='28'  THEN jam_masuk END AS 'M28',
					CASE WHEN DAY(tgl_pulang)='28'  THEN jam_pulang END AS 'P28',
					CASE WHEN DAY(tgl_masuk)='29'  THEN jam_masuk END AS 'M29',
					CASE WHEN DAY(tgl_pulang)='29'  THEN jam_pulang END AS 'P29',
					CASE WHEN DAY(tgl_masuk)='30'  THEN jam_masuk END AS 'M30',
					CASE WHEN DAY(tgl_pulang)='30'  THEN jam_pulang END AS 'P30',
					CASE WHEN DAY(tgl_masuk)='31'  THEN jam_masuk END AS 'M31',
					CASE WHEN DAY(tgl_pulang)='31'  THEN jam_pulang END AS 'P31'
					
					FROM tabsen AS a LEFT JOIN tkaryawan AS b ON a.nik = b.nik LEFT JOIN tdepartemen AS c ON b.iddepartemen = c.iddepartemen
					LEFT JOIN tdivisi AS d ON b.iddivisi = d.iddivisi " . $cari . " ) as a group by nik";
        $mahasiswa = $this->db->query($sql);
		 $pdf->SetFont('Arial','B',16);
        // mencetak string 
        	$pdf->Cell(320,10,'List Kehadiran Karyawan ' . date("Y-m-d"),0,1,'C');
			$pdf->Cell(25,4,'',0,1); 
        foreach ($mahasiswa->result() as $row){
		
			$pdf->SetFont('Arial','',9);
			
			$pdf->Cell(25,1,'',0,1); 
			
			$pdf->Cell(20,6,'NIK',1,0,'C');;
			$pdf->Cell(60,6,'Nama',1,0,'C');
			$pdf->Cell(30,6,'Departemen',1,0,'C');
			$pdf->Cell(40,6,'Divisi',1,0,'C');
			$pdf->Cell(30,6,'Group',1,1,'C');

			$pdf->Cell(20,6,$row->nik,1,0,'C');
			$pdf->Cell(60,6,$row->nama,1,0, 'c');
			$pdf->Cell(30,6,$row->departemen,1,0,'C');
			$pdf->Cell(40,6,$row->divisi,1,0,'C');
			$pdf->Cell(30,6,'',1,1,'C');
			
			$pdf->Cell(25,1,'',0,1); 
			$pdf->SetFont('Arial','',9);
			

			
            $pdf->Cell(10,6,'01',1,0,'C');
            $pdf->Cell(10,6,'02',1,0,'C');
            $pdf->Cell(10,6,'03',1,0,'C'); 
			$pdf->Cell(10,6,'04',1,0,'C'); 
			$pdf->Cell(10,6,'05',1,0,'C');
            $pdf->Cell(10,6,'06',1,0,'C');
            $pdf->Cell(10,6,'07',1,0,'C'); 
			$pdf->Cell(10,6,'08',1,0,'C');
            $pdf->Cell(10,6,'09',1,0,'C');
            $pdf->Cell(10,6,'10',1,0,'C'); 
			$pdf->Cell(10,6,'11',1,0,'C'); 
			$pdf->Cell(10,6,'12',1,0,'C');
            $pdf->Cell(10,6,'13',1,0,'C');
            $pdf->Cell(10,6,'14',1,0,'C'); 
			$pdf->Cell(10,6,'15',1,0,'C');
            $pdf->Cell(10,6,'16',1,0,'C');
            $pdf->Cell(10,6,'17',1,0,'C'); 
			$pdf->Cell(10,6,'18',1,0,'C'); 
			$pdf->Cell(10,6,'19',1,0,'C');
            $pdf->Cell(10,6,'20',1,0,'C');
            $pdf->Cell(10,6,'21',1,0,'C'); 
			$pdf->Cell(10,6,'22',1,0,'C');
            $pdf->Cell(10,6,'23',1,0,'C');
            $pdf->Cell(10,6,'24',1,0,'C'); 
			$pdf->Cell(10,6,'25',1,0,'C'); 
			$pdf->Cell(10,6,'26',1,0,'C');
            $pdf->Cell(10,6,'27',1,0,'C');
            $pdf->Cell(10,6,'28',1,0,'C'); 
			$pdf->Cell(10,6,'29',1,0,'C');
            $pdf->Cell(10,6,'30',1,0,'C'); 
			$pdf->Cell(10,6,'31',1,1,'C'); 
			
			
			$pdf->Cell(10,6,substr($row->M01,0,5),1,0, 'c');
            $pdf->Cell(10,6,substr($row->M02,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M03,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M04,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M05,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M06,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M07,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M08,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M09,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M10,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M11,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M12,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M13,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M14,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M15,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M16,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M17,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M18,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M19,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M20,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M21,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M22,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M23,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M24,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M25,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M26,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M27,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M28,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M29,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->M30,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->M31,0,5),1,1,'C');

			
		
		
            
			
			$pdf->Cell(10,6,substr($row->P01,0,5),1,0, 'c');
            $pdf->Cell(10,6,substr($row->P02,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P03,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P04,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P05,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P06,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P07,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P08,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P09,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P10,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P11,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P12,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P13,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P14,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P15,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P16,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P17,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P18,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P19,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P20,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P21,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P22,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P23,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P24,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P25,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P26,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P27,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P28,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P29,0,5),1,0,'C'); 
			$pdf->Cell(10,6,substr($row->P30,0,5),1,0,'C');
            $pdf->Cell(10,6,substr($row->P31,0,5),1,1,'C');
			$pdf->Cell(25,1,'',0,1); 
	
			
        }

        $pdf->Output();
    }
	
	
	
	function getjsonshow()
    {
	$id = $_GET['id'];
  	echo $this->mabsen->mgetjsonshow($id);
    }
	
	function getjson_popup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mabsen->get_datapopup($string);
    }
	function getjson_headerpopup()
    {
	
		$string =  $_GET['fields'];
		echo $this->mabsen->get_headerpopup($string);
    }


}


