<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstatuskerja extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tstatus_kerja where (status_kerja like '" . $field . "%' or kdstatus_kerja like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusstatuskerja($id)
	{
	
		return $this->db->delete('tstatus_kerja', array('idstatus_kerja' => $id));
	}
	
	public function editstatus_kerja($id)
	{
		return $this->db->get_where('tstatus_kerja',array('idstatus_kerja'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tstatus_kerja as b   where b.status_kerja like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tstatus_kerja' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tstatus_kerja as a where a.idstatus_kerja = '$id'");	
        
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
