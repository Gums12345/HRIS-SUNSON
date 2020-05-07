<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mtransportlembur extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from ttransportlembur where (jurusan like '" . $field . "%' or jurusan like '" . $field . "%') limit 1000 ");
  
    }
	public function hapustransportlembur($id)
	{
	
		return $this->db->delete('ttransportlembur', array('idtransportlembur' => $id));
	}
	
	public function edittransportlembur($id)
	{
		return $this->db->get_where('ttransportlembur',array('idtransportlembur'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from ttransportlembur as b   where b.jurusan like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'ttransportlembur' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from ttransportlembur as a where a.idtransportlembur = '$id'");	
        
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
