<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mmgroupkerja extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tmgroup_kerja where (mgroup_kerja like '" . $field . "%' or kdmgroup_kerja like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusmgroupkerja($id)
	{
	
		return $this->db->delete('tmgroup_kerja', array('idmgroup_kerja' => $id));
	}
	
	public function editmgroup_kerja($id)
	{
		return $this->db->get_where('tmgroup_kerja',array('idmgroup_kerja'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tmgroup_kerja as b   where b.mgroup_kerja like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tmgroup_kerja' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tmgroup_kerja as a where a.idmgroup_kerja = '$id'");	
        
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
