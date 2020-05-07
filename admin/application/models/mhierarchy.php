<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mhierarchy extends CI_Model {

	
	public function tampil()
	 {
		return  $this->db->query("");
  
    }
	
	
	public function direktur()
    {
       $arr = array();
		
		 $query = $this->db->query("SELECT b.departemen,a.`iddepartemen`
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen where departemen is not null
									group by a.iddepartemen" );	

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";

    }
	public function seniormanager($id)
    {
		
       $arr = array();
		 
		$query =   $this->db->query("SELECT  count(*) as jml  FROM tkaryawan AS a  WHERE a.idjabatan = 11 and a.iddepartemen = '$id'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					$query = $this->db->query("SELECT " . $id. " as iddepartemen, 'Senior Manager' as jabatan " );

				}
			if ($jml > 0 )
				{
					$query = $this->db->query("SELECT a.nik, a.nama,b.departemen,c.jabatan,a.`iddepartemen`
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen
									LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan` WHERE a.idjabatan = 11 and a.iddepartemen = '$id' ");	
				}
			

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";

    }
	
	public function manager($id)
    {
		
       $arr = array();
		 
		$query =   $this->db->query("SELECT  count(*) as jml  FROM tkaryawan AS a  WHERE a.idjabatan = 12 and a.iddepartemen = '$id'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					$query = $this->db->query("SELECT " . $id. " as iddepartemen, Manager' as jabatan " );

				}
			if ($jml > 0 )
				{
					$query = $this->db->query("SELECT a.nik, a.nama,b.departemen,c.jabatan,a.`iddepartemen`
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen
									LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan` WHERE a.idjabatan = 12 and a.iddepartemen = '$id' ");	
				}
			

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";

    }
	 
	public function kadep($id)
    {
		
       $arr = array();
		 
		$query =   $this->db->query("SELECT  count(*) as jml  FROM tkaryawan AS a  WHERE a.idjabatan = 13 and a.iddepartemen = '$id'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					$query = $this->db->query("SELECT " . $id. " as iddepartemen, 'Kepala Departemen' as jabatan " );	

				}
			if ($jml > 0 )
				{
					$query = $this->db->query("SELECT a.nik, a.nama,b.departemen,c.jabatan,a.`iddepartemen`
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen
									LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan` WHERE a.idjabatan = 13 and a.iddepartemen = '$id' ");	
				}
			

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";
	}
	
	
	public function kabag($id)
    {
		
       $arr = array();
		 
		$query =   $this->db->query("SELECT  count(*) as jml  FROM tkaryawan AS a  WHERE a.idjabatan = 14 and a.iddepartemen = '$id'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					$query = $this->db->query("SELECT " . $id. " as iddepartemen, 'Kepala Bagian' as jabatan " );

				}
			if ($jml > 0 )
				{
					$query = $this->db->query("SELECT a.nik, a.nama,b.departemen,c.jabatan,a.`iddepartemen`,a.iddivisi
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen
									LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan` WHERE a.idjabatan = 14 and a.iddepartemen = '$id' ");	
				}
			

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";

    }
	
	public function kaur($id,$idbagian)
    {
		
       $arr = array();
		 
		$query =   $this->db->query("SELECT  count(*) as jml  FROM tkaryawan AS a  WHERE a.idjabatan = 15 and a.iddepartemen = '$id' and a.iddivisi = '$idbagian'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					$query = $this->db->query("SELECT " . $id. " as iddepartemen, 'Kepala Urusan' as jabatan " );

				}
			if ($jml > 0 )
				{
					$query = $this->db->query("SELECT a.nik, a.nama,b.departemen,c.jabatan,a.`iddepartemen`,a.iddivisi
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen
									LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan` WHERE a.idjabatan = 15 and a.iddepartemen = '$id' and a.iddivisi = '$idbagian' ");	
				}
			

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";

    }
	
	public function karu($id,$idbagian)
    {
		
       $arr = array();
		 
		$query =   $this->db->query("SELECT  count(*) as jml  FROM tkaryawan AS a  WHERE a.idjabatan = 16 and a.iddepartemen = '$id' and a.iddivisi = '$idbagian'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					$query = $this->db->query("SELECT " . $id. " as iddepartemen, 'Kepala Regu' as jabatan " );

				}
			if ($jml > 0 )
				{
					$query = $this->db->query("SELECT a.nik, a.nama,b.departemen,c.jabatan,a.`iddepartemen`,a.iddivisi
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen
									LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan` WHERE a.idjabatan = 16 and a.iddepartemen = '$id' and a.iddivisi = '$idbagian' ");	
				}
			

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";

    }
	
	public function operator($id,$idbagian)
    {
		
       $arr = array();
		 
		$query =   $this->db->query("SELECT  count(*) as jml  FROM tkaryawan AS a  WHERE a.idjabatan = 17 and a.iddepartemen = '$id' and a.iddivisi = '$idbagian'" );
		foreach ($query->result() as $row)
			{
				$jml= $row->jml;	   
			}
			if ($jml == 0 )
				{
					$query = $this->db->query("SELECT " . $id. " as iddepartemen, 'Operator' as jabatan " );

				}
			if ($jml > 0 )
				{
					$query = $this->db->query("SELECT a.nik, a.nama,b.departemen,c.jabatan,a.`iddepartemen`,a.iddivisi
									FROM tkaryawan AS a LEFT JOIN tdepartemen AS b ON a.iddepartemen = b.iddepartemen
									LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan` WHERE a.idjabatan = 17 and a.iddepartemen = '$id' and a.iddivisi = '$idbagian' ");	
				}
			

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
       return  "{\"data\":" .json_encode($arr). "}";

    }
	
}
