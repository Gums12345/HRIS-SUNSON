<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mliburnasional extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tlibur_nasional where (libur_nasional like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusliburnasional($id)
	{
	
		return $this->db->delete('tlibur_nasional', array('idlibur_nasional' => $id));
	}
	
	public function editliburnasional($id)
	{
		return $this->db->get_where('tlibur_nasional',array('idlibur_nasional'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tlibur_nasional as b   where b.libur_nasional like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tlibur_nasional' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tlibur_nasional as a where a.idlibur_nasional = '$id'");	
        
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
