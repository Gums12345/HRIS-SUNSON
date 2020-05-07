<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mijin extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT a.idijin,a.idperijinan,a.tgl,b.nama AS karyawan,a.tgl_keluar,a.jam_keluar,a.tgl_kembali,a.jam_kembali,a.ket,c.nama_perijinan
FROM tijin AS a LEFT JOIN tkaryawan AS b ON a.`idkaryawan` = b.idkaryawan left join tperijinan as c ON a.idperijinan = c.idperijinan  where (b.nama like '" . $field . "%' or c.nama_perijinan like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusijin($id)
	{
	
		return $this->db->delete('tijin', array('idijin' => $id));
	}
	
	public function editijin($id)
	{
		return $this->db->get_where('tijin',array('idijin'=>$id));
		
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tijin as b   where b.kdijin like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tijin' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT a.idijin,a.idperijinan,a.tgl,a.idkaryawan,a.`tgl_keluar`,a.`jam_keluar`,a.`tgl_kembali`,a.`jam_kembali`,a.`ket`,b.`nama`,a.imgbukti1,a.imgbukti2
FROM tijin AS a LEFT JOIN tkaryawan AS b ON a.`idkaryawan` = b.idkaryawan where a.idijin = '$id'");	
        
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
	
	public function get_datapopup($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan,a.nik,a.nama  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
}
