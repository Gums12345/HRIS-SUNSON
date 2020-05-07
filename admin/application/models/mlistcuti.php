<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mlistcuti extends CI_Model {

	
	public function tampil()
	 {
		return  $this->db->query("");
  
    }
	
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tgapok as b   where b.depatemen like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tgapok' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tgapok as a where a.idgapok = '$id'");	
        
		foreach($query->result_object() as $rows )
        {
		foreach ($query->list_fields() as $field)
			{
				$arr[$field] =$rows->$field ;
			}	   	
       }

        return  json_encode($arr);

    }
	
	public function get_datapopup()
    {
		$field = $this->session->userdata('cari');
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan,a.nik,a.nama,IFNULL(e.penggunaan_cuti,0) AS cuti_digunakan,IFNULL(c.cuti_darilembur,0) AS cuti_darilembur,
		IFNULL(t1.cutitahunan,0) AS cutitahunan,IFNULL(b.cutikip,0) AS cutikip,IFNULL(d.cutiip,0) AS cutiip,
		IFNULL(c.cuti_darilembur,0) + IFNULL(t1.cutitahunan,0) + IFNULL(b.cutikip,0) + IFNULL(d.cutiip,0) AS jmlcuti,
		(IFNULL(c.cuti_darilembur,0) + IFNULL(t1.cutitahunan,0) + IFNULL(b.cutikip,0) + IFNULL(d.cutiip,0))-IFNULL(e.penggunaan_cuti,0)  AS sisa_cuti
		FROM tkaryawan AS a LEFT JOIN (
			  SELECT  a.nik,SUM(jmlcuti) AS cutitahunan FROM  tcutitahunan AS a GROUP BY a.nik
			 ) t1  ON a.`nik` = t1.nik LEFT JOIN
			 (
			  SELECT  c.nik,SUM(jmlcuti) AS cutikip FROM  tkip AS c GROUP BY c.nik
			 ) AS b ON a.nik  = b.nik LEFT JOIN 
			 (
			  SELECT  c.nik,COUNT(c.nik) AS cuti_darilembur FROM  tcuti_uang AS c GROUP BY c.nik
			 ) AS c ON a.nik  = c.nik LEFT JOIN
			 (
			  SELECT  d.nik,SUM(jmlcuti) AS cutiip FROM  tip AS d GROUP BY d.nik
			 ) AS d ON a.nik  = d.nik LEFT JOIN 
			 (
			  SELECT  c.idkaryawan,COUNT(idkaryawan) AS penggunaan_cuti FROM  tlistcuti AS c 
			WHERE c.idcuti NOT IN ( 12,13,14,15,16,17,18,20,23,24) 
			  GROUP BY c.idkaryawan
			 ) AS e ON a.idkaryawan  = e.idkaryawan

   where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')  GROUP BY a.nik limit 1000  ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
}
