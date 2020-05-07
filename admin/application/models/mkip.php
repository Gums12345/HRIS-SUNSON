<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mkip extends CI_Model {

	
	public function tampil()
	 {
		return  $this->db->query("SELECT * from tgapok  ");
  
    }
	public function hapusidgapok($id)
	{
	
		return $this->db->delete('tgapok', array('idgapok' => $id));
	}
	
	public function editgapok($id)
	{
		return $this->db->get_where('tgapok',array('idgapok'=>$id));
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
		
	$query = $this->db->query("SELECT a.idkaryawan,a.nik,a.nama,a.`tanggal_diangkat`, t1.cuti2018,t1.cuti2019,
t1.cuti2020,b.kip2018,b.kip2019,
b.kip2020,d.jml2020

FROM tkaryawan AS a LEFT JOIN (
      SELECT  a.nik,

	SUM(IF(a.tahun='2018',a.jmlcuti,0)) AS cuti2018,
	SUM(IF(a.tahun='2019',a.jmlcuti,0)) AS cuti2019,
	SUM(IF(a.tahun='2020',a.jmlcuti,0)) AS cuti2020
	FROM  tcutitahunan AS a GROUP BY a.nik
	
     ) t1  ON a.`nik` = t1.nik LEFT JOIN
     (
      SELECT  c.nik,

	SUM(IF(c.tahun='2018',c.jmlcuti,0)) AS kip2018,
	SUM(IF(c.tahun='2019',c.jmlcuti,0)) AS kip2019,
	SUM(IF(c.tahun='2020',c.jmlcuti,0)) AS kip2020
	FROM  tkip AS c GROUP BY c.nik
     ) AS b ON a.nik  = b.nik
     LEFT JOIN 
     (
      SELECT  d.nik,

	SUM(IF(d.tahun='2020',d.jmlcuti,0)) AS jml2020
	FROM  tip AS d GROUP BY d.nik
     ) AS d ON a.nik  = d.nik

   where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')  GROUP BY a.nik limit 1000  ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
}
