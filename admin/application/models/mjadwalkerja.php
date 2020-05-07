<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mjadwalkerja extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT a.idjadwal_kerja,a.tgl,b.mgroup_kerja,c.parameter from tjadwal_kerja as a left join
		tmgroup_kerja as b ON a.idmgroup_kerja = b.idmgroup_kerja left join tparameter as c on a.idparameter = c.idparameter where (c.parameter like '" . $field . "%' or b.mgroup_kerja like '" . $field . "%' ) limit 1000 ");
  
    }
	public function hapusjadwal_kerja($id)
	{
	
		return $this->db->delete('tjadwal_kerja', array('idjadwal_kerja' => $id));
	}
	
	public function editjadwal_kerja($id)
	{
		return $this->db->get_where('tjadwal_kerja',array('idjadwal_kerja'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tjadwal_kerja as b   where b.depatemen like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tjadwal_kerja' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tjadwal_kerja as a where a.idjadwal_kerja = '$id'");	
        
		foreach($query->result_object() as $rows )
        {
		foreach ($query->list_fields() as $field)
			{
				$arr[$field] =$rows->$field ;
			}	   	
       }

        return  json_encode($arr);

    }
	
	public function get_datapopup1($mtahun,$idmgroupkerja)
    {
       $arr = array();
		
		$query = $this->db->query("SELECT *, CASE
									WHEN bln  = '1' THEN 'Januari'
									WHEN bln  = '2' THEN 'Fabruari'
									WHEN bln  = '3' THEN 'Maret'
									WHEN bln  = '4' THEN 'April'
									WHEN bln  = '5' THEN 'Mei'
									WHEN bln  = '6' THEN 'Juni'
									WHEN bln  = '7' THEN 'Juli'
									WHEN bln  = '8' THEN 'Agustus'
									WHEN bln  = '9' THEN 'September'
									WHEN bln  = '10' THEN 'Oktober'
									WHEN bln  = '11' THEN 'Novemver'
									ELSE 'Desember'
									
								END AS bln
								FROM tmjadwal_kerja WHERE thn =  '$mtahun' and idmgroup_kerja = '$idmgroupkerja'    limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
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
	
	function arrayparameter()
    {
        $arr = array();
		$query = $this->db->query("select idparameter,kdparameter from tparameter " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  json_encode($arr);
    }
}
