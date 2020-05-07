<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mmijin extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tperijinan  where (kode_perijinan like '" . $field . "%' or nama_perijinan like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusperijinan($id)
	{
	
		return $this->db->delete('tperijinan', array('idperijinan' => $id));
	}
	
	public function editperijinan($id)
	{
		return $this->db->get_where('tperijinan',array('idperijinan'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tperijinan as b   where b.kdijin like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tperijinan' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tperijinan as a where a.idperijinan = '$id'");	
        
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
