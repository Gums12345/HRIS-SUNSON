<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdepartemen extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tdepartemen where (departemen like '" . $field . "%' or kddepartemen like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusdepartemen($id)
	{
	
		return $this->db->delete('tdepartemen', array('iddepartemen' => $id));
	}
	
	public function editdepartemen($id)
	{
		return $this->db->get_where('tdepartemen',array('iddepartemen'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tdepartemen as b   where b.depatemen like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tdepartemen' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tdepartemen as a where a.iddepartemen = '$id'");	
        
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
