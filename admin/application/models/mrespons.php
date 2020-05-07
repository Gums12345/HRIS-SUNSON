<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mrespons extends CI_Model {



	public function tampil($src)
	 {
	 
		$table =  decrypt_url($this->session->userdata(encrypt_url('table')));
		$modelsql =  decrypt_url($this->session->userdata(encrypt_url('modelsql')));
		$modelsql=str_replace("src",$src,$modelsql);
		/*echo '<script type="text/javascript">alert(' .$src .');</script>';*/
		return  $this->db->query($modelsql);
    }
	

	
	public function hapusrespons($id)
	{
		$table =   decrypt_url($this->session->userdata(encrypt_url('table')));
		$idtable =   decrypt_url($this->session->userdata(encrypt_url('idtable')));

		return $this->db->delete($table, array($idtable => $id));
	}
	
	public function editrespons($id)
	{
		$table =   decrypt_url($this->session->userdata(encrypt_url('table')));
		$idtable =   decrypt_url($this->session->userdata(encrypt_url('idtable')));
		
		return $this->db->get_where($table,array($idtable=>$id));
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
	
	public function getjson()
    {
        $arr = array();
		$table =   decrypt_url($this->session->userdata(encrypt_url('table')));
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  '" . $table . "' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }
	
	public function babiarray($query)
    {
        

		if ($query != "query")
		{
			$table =   decrypt_url($this->session->userdata(encrypt_url('table')));
		 	$query = $this->db->query("SELECT  distinct column_name, column_type,column_comment FROM database_schema WHERE table_name =  '" . $table . "' 			" );
		}
		else
		{
			$modelsql =   decrypt_url($this->session->userdata(encrypt_url('query')));
			$modelsql =  '"' .str_replace(",",'"'.",".'"',$modelsql) .'"';
			$table =   decrypt_url($this->session->userdata(encrypt_url('table')));
		 	$data = "SELECT  distinct column_name, column_type,column_comment FROM database_schema WHERE column_name IN(".$modelsql.") AND  column_comment <>''" ;
		}

	
        /*$anjing =  $query->list_fields();*/
/*		foreach ($query->list_fields() as $field)
			{
				$arr[] =$field ;
			}*/	 

        return  $this->db->query($data);
		/*$editdata	= $this->db->query("SELECT * from tbabinsa as a  where a.idbabinsa = '" . $id . "%'")->result_object();	*/
    }
	
	public function mgetjsonshow($id)
    {
        $arr = array();

		$getfield =  decrypt_url($this->session->userdata(encrypt_url('getfield')));
		$getfield =  str_replace("idrecord%",$id,$getfield);
		$query = $this->db->query($getfield);	
        
		foreach($query->result_object() as $rows )
        {
		foreach ($query->list_fields() as $field)
			{
				$arr[$field] =$rows->$field ;
			}	   	
       }

        return  json_encode($arr);
		/*$editdata	= $this->db->query("SELECT * from tbabinsa as a  where a.idbabinsa = '" . $id . "%'")->result_object();	*/
    }
	
	public function get_datapopup($string)
    {
        $arr = array();
		$query = $this->db->query($string);

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function get_headerpopup($string)
    {
        $arr = array();
		$headersql =  '"' .str_replace(",",'"'.",".'"',$string) .'"';
		
		$data = "SELECT  distinct column_name, column_type,column_comment FROM database_schema WHERE column_name IN(".$headersql.") AND  column_comment <>'' " ;
		$query = $this->db->query($data);

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }
	
}
