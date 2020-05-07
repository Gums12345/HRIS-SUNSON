<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mpendidikan extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tpendidikan as b   where (b.pendidikan like '" . $field . "%' or b.kdpendidikan like '" . $field . "%') ");
  
    }
	public function hapuspendidikan($id)
	{
	
		return $this->db->delete('tpendidikan', array('idpendidikan' => $id));
	}
	
	public function editpendidikan($id)
	{
		return $this->db->get_where('tpendidikan',array('idpendidikan'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tpendidikan as b   where b.nama like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tpendidikan' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tpendidikan as a where a.idpendidikan = '$id'");	
        
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
