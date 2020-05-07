<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mparameter extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT * from tparameter where (parameter like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusparameter($id)
	{
	
		return $this->db->delete('tparameter', array('idparameter' => $id));
	}
	
	public function editparameter($id)
	{
		return $this->db->get_where('tparameter',array('idparameter'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tparameter as b   where b.depatemen like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tparameter' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }
	
	public function get_datapopup1($mtahun,$idmgroupkerja)
    {
       $arr = array();
		
		$query = $this->db->query("SELECT idparameter,kdparameter from tparameter  limit 1000");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tparameter as a where a.idparameter = '$id'");	
        
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
