<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mspl extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT a.idspl,a.`nospl`,a.tgl,b.nama AS leader,a.jam,a.`jam_mulai`,a.`jam_berakhir`,c.nama AS manager, 								  a.acc,a. ket
FROM tspl AS a LEFT JOIN tkaryawan AS b ON a.`permintaan_dari` = b.idkaryawan LEFT JOIN tkaryawan AS c ON a.`idmanager` = 					
c.idkaryawan  where (b.nama like '" . $field . "%' or c.nama like '" . $field . "%' or a.nospl like '" . $field . "%') limit 1000 ");
  
    }
	
	public function carinik($field)
    {
       $arr = array();
		
		$query = $this->db->query("SELECT a.idkaryawan,a.nik,a.nama,b.departemen FROM  tkaryawan as a left join tdepartemen as b On a.iddepartemen = b.iddepartemen   where (nik = '" . $field . "' )  ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  json_encode($arr);
    }
	
	
	function tampiledit($field){
		$arr = array();
		
		$query = $this->db->query("SELECT  a.idkaryawan,a.nik,a.nama,b.departemen FROM  tspldtl AS c 
LEFT JOIN tkaryawan AS a ON a.idkaryawan = c.idkaryawan 
LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen 
LEFT JOIN tspl AS d ON c.nospl= d.nospl   where (c.nospl = '" . $field . "' )  ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  json_encode($arr);
	}
	
	
	public function hapusspl($id)
	{
	
		return $this->db->delete('tspl', array('idspl' => $id));
	}
	
	public function editspl($id)
	{
		return $this->db->get_where('tspl',array('idspl'=>$id));
		
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tspl as b   where b.nospl like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tspl' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT a.idspl,a.`nospl`,a.tgl,b.nama AS nama_atasan,a.jam,a.`jam_mulai`,a.`jam_berakhir`,c.nama AS nama_manager, a.acc,a. ket,a.idmanager,a.permintaan_dari,a.jam
FROM tspl AS a LEFT JOIN tkaryawan AS b ON a.`permintaan_dari` = b.idkaryawan LEFT JOIN tkaryawan AS c ON a.`idmanager` = 					
c.idkaryawan where a.idspl = '$id'");	
        
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
	public function urlnumber()
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
	
	public function get_datapopupatasan($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan as permintaan_dari,a.nik,a.nama as nama_atasan FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function get_datapopupmanager($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan as idmanager,a.nik,a.nama as nama_manager  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	
	
}
