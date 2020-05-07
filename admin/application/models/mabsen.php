<?php

class mabsen extends CI_Model {

	public function __construct() {
        parent::__construct();
    }
   
				
/*   public function json($field) {
        $this->datatables->select("a.idabsen,a.tgl_load,a.nik,b.nama,a.tgl_masuk,a.tgl_pulang,a.jam_masuk, a.qtyotasli,a.premi_shift,
a.jam_pulang,c.nospl,a.otstart,a.otend,a.ot1,,a.ot2,a.qtyot,a.jam_wajib_masuk,a.jam_wajib_keluar,d.parameter,a.qty_jam,a.transport_lembur",FALSE);
        $this->datatables->from('tabsen as a');
        $this->datatables->join('tkaryawan as b', 'a.nik = b.nik','left');
		 $this->datatables->join('tspl as c', 'a.idspl = c.idspl','left');
		$this->datatables->join('tparameter as d', 'a.idparameter = d.idparameter','left');

		$this->datatables->like('a.nik', $field);
		$this->datatables->or_like('b.nama', $field);
        $this->datatables->add_column('view', ' <div align="right"><a class="btn btn-info" href="editabsen/$1">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  </a>
                 </div>', 'idabsen');
        return $this->datatables->generate();
    }*/

	function json($field) {

$requestData= $_REQUEST;
$columns = array( 	
  0 => 'nik',
  1 => 'nama',
  2 => 'tgl_masuk',
  3 => 'tgl_pulang',
  4 => 'jam_masuk',
  5 => 'jam_pulang',
  6 => 'qty_jam',
  7 => 'nospl',
  8 => 'otstart',
  9 => 'otend',
  10 => 'qtyot',
  11 => 'ot1',
  12 => 'ot2',
  13 => 'qtyotasli',
  14 => 'transport_lembur',
  15 => 'premi_shift',
  16 => 'jam_wajib_masuk',
  17 => 'jam_wajib_keluar',
  18 => 'parameter',
);
		$sql = " SELECT a.idabsen,a.tgl_load,a.nik,b.nama,a.tgl_masuk,a.tgl_pulang,a.jam_masuk,a.jam_pulang, a.qtyotasli,a.premi_shift,
a.jam_pulang,c.nospl,a.otstart,a.otend,a.ot1,a.ot2,a.qtyot,a.jam_wajib_masuk,a.jam_wajib_keluar,d.parameter,a.qty_jam,a.transport_lembur
        FROM tabsen AS a LEFT JOIN tkaryawan AS b ON a.nik = b.nik LEFT JOIN tspl AS c ON a.idspl = c.idspl
		LEFT JOIN tparameter AS d ON a.idparameter = d.idparameter
				  where b.nama like '" . $field . "%' or a.nik like '" . $field . "%' ";
			
	$query =   $this->db->query($sql);
	$totalData = $query->num_rows();
	$totalFiltered = $totalData;
		
	$query =   $this->db->query($sql);
	$totalFiltered = $query->num_rows($sql);
	
	
	$sql.=" ORDER BY a.tgl_masuk desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
	
$query =   $this->db->query($sql);

	//----------------------------------------------------------------------------------
	
/*	<div align='right'  disabled><a class='btn btn-info' href=editabsen/". $rows->idabsen ." disabled  >
                  <i class='glyphicon glyphicon-edit icon-white'></i>
                  </a>
				  
				  </div> tombol edit*/
	$data = array();
	 foreach($query->result_object() as $rows )
        {
		$bagong = 10;
				  
		$nestedData=array(); 
		$nestedData[] =   "<div align='right'  disabled><a class='btn btn-info' href=# disabled  >
                  <i class='glyphicon glyphicon-edit icon-white'></i>
                  </a>
				  
				  </div>";
		$nestedData[] = $rows->nik;
		$nestedData[] = $rows->nama;
		$nestedData[] = $rows->tgl_masuk;
		$nestedData[] = $rows->tgl_pulang;
		$nestedData[] = $rows->jam_masuk;
		$nestedData[] = $rows->jam_pulang;
		$nestedData[] = $rows->qty_jam;
		$nestedData[] = $rows->nospl;
		$nestedData[] = $rows->otstart;
		$nestedData[] = $rows->otend;
		$nestedData[] = $rows->qtyot;
		$nestedData[] = $rows->ot1;
		$nestedData[] = $rows->ot2;
		$nestedData[] = $rows->qtyotasli;
		$nestedData[] = $rows->transport_lembur;
		$nestedData[] = $rows->premi_shift;
		$nestedData[] = $rows->jam_wajib_masuk;
		$nestedData[] = $rows->jam_wajib_keluar;
		$nestedData[] = $rows->parameter;

		

		
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
	
	
	
	


	public function hapusabsen($id)
	{
	
		return $this->db->delete('tabsen', array('idabsen' => $id));
	}
	
	public function editabsen($id)
	{
		return $this->db->get_where('tabsen',array('idabsen'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tabsen as b   where b.nama like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tabsen' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tabsen as a where a.idabsen = '$id'");	
        
		foreach($query->result_object() as $rows )
        {
		foreach ($query->list_fields() as $field)
			{
				$arr[$field] =$rows->$field ;
			}	   	
       }

        return  json_encode($arr);

    
    }
	
}