<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class malatkontrasepsi extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from talat_kontrasepsi where (alat_kontrasepsi like '" . $field . "%' or kdalat_kontrasepsi like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusalatkontrasepsi($id)
	{
	
		return $this->db->delete('talat_kontrasepsi', array('idalat_kontrasepsi' => $id));
	}
	
	public function editalat_kontrasepsi($id)
	{
		return $this->db->get_where('talat_kontrasepsi',array('idalat_kontrasepsi'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from talat_kontrasepsi as b   where b.alat_kontrasepsi like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'talat_kontrasepsi' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from talat_kontrasepsi as a where a.idalat_kontrasepsi = '$id'");	
        
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
