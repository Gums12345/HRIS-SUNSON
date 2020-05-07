<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mmasterpelanggaran extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT a.idmaster_pelanggaran,a.kdmaster_pelanggaran,master_pelanggaran,b.sangsi from tmaster_pelanggaran as a left join tsangsi as b ON a.idsangsi = b.idsangsi where (a.master_pelanggaran like '" . $field . "%' or a.kdmaster_pelanggaran like '" . $field . "%' or b.sangsi like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusmasterpelanggaran($id)
	{
	
		return $this->db->delete('tmaster_pelanggaran', array('idmaster_pelanggaran' => $id));
	}
	
	public function editmaster_pelanggaran($id)
	{
		return $this->db->get_where('tmaster_pelanggaran',array('idmaster_pelanggaran'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tmaster_pelanggaran as b   where b.master_pelanggaran like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tmaster_pelanggaran' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tmaster_pelanggaran as a where a.idmaster_pelanggaran = '$id'");	
        
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
