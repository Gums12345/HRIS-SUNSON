<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdivisi extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT a.iddivisi,a.kddivisi,a.divisi FROM tdivisi as a where (a.divisi like '" . $field . "%' or a.kddivisi like '" . $field . "%' ) limit 1000 ");
  
    }
	public function hapusdivisi($id)
	{
	
		return $this->db->delete('tdivisi', array('iddivisi' => $id));
	}
	
	public function editdivisi($id)
	{
		return $this->db->get_where('tdivisi',array('iddivisi'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tdivisi as b   where b.divisi like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tdivisi' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tdivisi as a where a.iddivisi = '$id'");	
        
		foreach($query->result_object() as $rows )
        {
		foreach ($query->list_fields() as $field)
			{
				$arr[$field] =$rows->$field ;
			}	   	
       }

        return  json_encode($arr);

    }
	public function url()
    {
        $arr = array();
		$link=decrypt_url($_GET['link']);
		$query = $this->db->query($link );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  json_encode($arr);
    }
}
