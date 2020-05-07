<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mgambar extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tgambar  ");

  
    }
	public function hapusgambar($id)
	{
	
		return $this->db->delete('tgambar', array('idgambar' => $id));
	}
	
	public function editgambar($id)
	{
		return $this->db->get_where('tgambar',array('idgambar'=>$id));
	}
	
	

	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tgambar as b   where b.ket like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tgambar' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT *, a.path as preview from tgambar as a where a.idgambar = '$id'");	
        
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
