<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class msangsi extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tsangsi where (sangsi like '" . $field . "%' or kdsangsi like '" . $field . "%') limit 1000 ");
  
    }
	public function hapussangsi($id)
	{
	
		return $this->db->delete('tsangsi', array('idsangsi' => $id));
	}
	
	public function editsangsi($id)
	{
		return $this->db->get_where('tsangsi',array('idsangsi'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tsangsi as b   where b.uraian like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tsangsi' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tsangsi as a where a.idsangsi = '$id'");	
        
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
