<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstatuspernikahan extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tstatus_pernikahan where (status_pernikahan like '" . $field . "%' or kdstatus_pernikahan like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusstatuspernikahan($id)
	{
	
		return $this->db->delete('tstatus_pernikahan', array('idstatus_pernikahan' => $id));
	}
	
	public function editstatus_pernikahan($id)
	{
		return $this->db->get_where('tstatus_pernikahan',array('idstatus_pernikahan'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tstatus_pernikahan as b   where b.status_pernikahan like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tstatus_pernikahan' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tstatus_pernikahan as a where a.idstatus_pernikahan = '$id'");	
        
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
