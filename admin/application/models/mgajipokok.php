<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mgajipokok extends CI_Model {

	
	public function tampil()
	 {
		return  $this->db->query("SELECT * from tgapok  ");
  
    }
	public function hapusidgapok($id)
	{
	
		return $this->db->delete('tgapok', array('idgapok' => $id));
	}
	
	public function editgapok($id)
	{
		return $this->db->get_where('tgapok',array('idgapok'=>$id));
	}
	
	
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tgapok as b   where b.depatemen like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tgapok' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT * from tgapok as a where a.idgapok = '$id'");	
        
		foreach($query->result_object() as $rows )
        {
		foreach ($query->list_fields() as $field)
			{
				$arr[$field] =$rows->$field ;
			}	   	
       }

        return  json_encode($arr);

    }
	
	public function get_datapopup()
    {
	  $field = $this->session->userdata('cari');
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan,b.idgapok,c.kdstatus_kerja,a.nik,a.nama, 
b.gaji_pokok,b.tunj_jabatan,b.tunj_prestasi,b.tunj_fungsional,b.tunj_hadir,
b.tunj_masakerja,b.tunj_lainnya,
b.pot_astek, b.pot_spsi,b.pot_koperasi,b.pot_bisnis FROM tkaryawan AS a LEFT JOIN tgapok AS b ON a.idkaryawan = b.idkaryawan
left join tstatus_kerja as c ON a.idstatus_kerja = c.idstatus_kerja  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000  ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
}
