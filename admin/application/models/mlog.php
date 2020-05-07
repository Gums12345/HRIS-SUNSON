<?php

class mlog extends CI_Model {

	public function __construct() {
        parent::__construct();
    }
   
				
    function json() {
        $this->datatables->select(" * ");
        $this->datatables->from('tlog');
		
        
        return $this->datatables->generate();
    }
	
	

	
	
	
  
  
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tlog as b   where b.nik like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tlog' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tlog as a where a.idlog = '$id'");	
        
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