<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdemografi extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT *,b.nama as kecamatan from tdemografi as a left join tkecamatan as b ON a.idkecamatan = b.idkecamatan where (b.nama like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusdemografi($id)
	{
	
		return $this->db->delete('tdemografi', array('iddemografi' => $id));
	}
	
	public function editdemografi($id)
	{
		return $this->db->get_where('tdemografi',array('iddemografi'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tdemografi as b   where b.nama like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tdemografi' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tdemografi as a where a.iddemografi = '$id'");	
        
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
