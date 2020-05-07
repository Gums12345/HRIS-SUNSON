<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mslipgaji extends CI_Model {

	
function json($field) {

$requestData= $_REQUEST;
$columns = array( 	
  0 => 'bln',
  1 => 'thn',
  2 => 'periode',
  3 => 'periodetglgaji',
  4 => 'nik',
  5 => 'nama',
  6 => 'jabatan',
  7 => 'departemen',
  8 => 'divisi',
   9 => 'hk',
  10 => 'hl',
   11 => 'mhk',
  12 => 'mhl',
  13 => 'mhk',
  14 => 'mhl',
  15 => 'qtyot',
  16 => 'ot1',
  17 => 'ot2',
  18 => 'qtyotasli',
  
  
  
  19 => 'status_kerja',
  
  
  20 => 'gapok',
  21 => 'tunj_jabatan',
  22 => 'tunj_prestasi',
  23 => 'premi_hadir',
  24 => 'tunj_rajin',
  25 => 'lembur',
  26 => 'tunj_masakerja',
  27 => 'premi_shift',
  28 => 'transport_lembur',
  29 => 'tunj_lainnya',
  30 => 'totgaji',
  31 => 'pot_absen',
  32 => 'pot_astek',
  33 => 'pot_spsi',
  34 => 'pot_koperasi',
  35 => 'tot_potongan',
  36 => 'gaji_bersih',
  
  


);
		$sql = " SELECT idslipgaji,bln,thn,periode,periodetglgaji,nik,nama,jabatan,departemen, divisi,hk,hl,mhk,mhl, qtyot,ot1,ot2,qtyotasli,status_kerja,gapok,tunj_jabatan,tunj_prestasi,premi_hadir,
tunj_rajin,lembur, tunj_masakerja, premi_shift,transport_lembur,tunj_lainnya,totgaji, pot_absen,pot_astek, pot_spsi,pot_bisnis, pot_koperasi,
tot_potongan, gaji_bersih FROM tslipgaji where nama like '" . $field . "%' or nik like '" . $field . "%' or jabatan like '" . $field . "%' or departemen like '" . $field . "%'  ";

	$query =   $this->db->query($sql);
	$totalData = $query->num_rows();
	$totalFiltered = $totalData;
		
	if( !empty($requestData['search']['value']) ) {
		//----------------------------------------------------------------------------------
		/*$sql.=" AND ( niks LIKE '".$requestData['search']['value']."%' ";    
		$sql.=" OR nama LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR agama LIKE '".$requestData['search']['value']."%' )";*/
	}
	
	
	$query =   $this->db->query($sql);
	$totalFiltered = $query->num_rows($sql);
	
	
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
	
$query =   $this->db->query($sql);

	//----------------------------------------------------------------------------------
	
	$data = array();
	 foreach($query->result_object() as $rows )
        {
		$bagong = 10;
	 /*"<div align='right'><a class='btn btn-info' href='cdivisi/editdivisi/' $rows->nik  >
                  <i class='glyphicon glyphicon-edit icon-white'></i>
                  </a>";*/
				  /*"<a href=cjadwalkerja/editjadwalkerja/" .$bagong ." >delete</a>";*/
				  
		$nestedData=array(); 

              
					$nestedData[] = $rows->bln;
					$nestedData[] = $rows->thn;
					$nestedData[] = $rows->periode;
					$nestedData[] = $rows->periodetglgaji;
					$nestedData[] = $rows->nik;
					$nestedData[] = $rows->nama;
					$nestedData[] = $rows->jabatan;
					$nestedData[] = $rows->departemen;
					$nestedData[] = $rows->divisi;
					$nestedData[] = $rows->hk;
				    $nestedData[] = $rows->hl;
					$nestedData[] = $rows->mhk;
				    $nestedData[] = $rows->mhl;
					
				    $nestedData[] = $rows->qtyot;
				    $nestedData[] = $rows->ot1;
				    $nestedData[] = $rows->ot2;
				    $nestedData[] = $rows->qtyotasli;
				    $nestedData[] = $rows->status_kerja;
					$nestedData[] = number_format($rows->gapok, 2);
					$nestedData[] = number_format($rows->tunj_jabatan, 2);
					$nestedData[] = number_format($rows->tunj_prestasi, 2);
					$nestedData[] = number_format($rows->premi_hadir, 2);
					$nestedData[] = number_format($rows->tunj_rajin, 2);
					$nestedData[] = number_format($rows->lembur, 2);
					$nestedData[] = number_format($rows->tunj_masakerja, 2);
					$nestedData[] = number_format($rows->premi_shift, 2);
					$nestedData[] = number_format($rows->transport_lembur, 2);
					$nestedData[] = number_format($rows->tunj_lainnya, 2);
					$nestedData[] = number_format( $rows->totgaji, 2);
					$nestedData[] = number_format( $rows->pot_absen, 2);
					$nestedData[] = number_format($rows->pot_astek, 2);
					$nestedData[] = number_format($rows->pot_spsi, 2);
					$nestedData[] = number_format($rows->pot_koperasi, 2);
					$nestedData[] = number_format($rows->pot_koperasi, 2);
					$nestedData[] = number_format($rows->tot_potongan, 2);
					$nestedData[] = number_format($rows->gaji_bersih, 2);
  



		
		$data[] = $nestedData;
	}
	//----------------------------------------------------------------------------------
	$json_data = array(
		"draw"            => intval( $requestData['draw'] ),  
		"recordsTotal"    => intval( $totalData ), 
		"recordsFiltered" => intval( $totalFiltered ), 
		"data"            => $data );
	//----------------------------------------------------------------------------------
	return  json_encode($json_data);
    }
	
	
	
	
	public function tampil1($field)
	 {
	
	
}
//----------------------------------------------------------------------------------
	
	
	
	
	
	
	
	public function hapusslipgaji($id)
	{
	
		return $this->db->delete('tslipgaji', array('idslipgaji' => $id));
	}
	
	public function editslipgaji($id)
	{
		return $this->db->get_where('tslipgaji',array('idslipgaji'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tslipgaji as b   where b.nama like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tslipgaji' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tslipgaji as a where a.idslipgaji = '$id'");	
        
		foreach($query->result_object() as $rows )
        {
		foreach ($query->list_fields() as $field)
			{
				$arr[$field] =$rows->$field ;
			}	   	
       }

        return  json_encode($arr);

    }
	public function url()
    {
        $arr = array();
		$link=decrypt_url($_GET['link']);
		$query = $this->db->query($link );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  json_encode($arr);
    }
	
}
