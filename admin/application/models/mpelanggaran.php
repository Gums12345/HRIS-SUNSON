<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mpelanggaran extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT a.idpelanggaran,a.tgl,b.nama AS karyawan,c.nama AS saksi,d.nama AS 
		pelapor,e.master_pelanggaran AS pelanggaran,a.ket,CONCAT_WS('  -  ',a.tglmulai_sangsi, a.tglberakhir_sangsi) as berlaku, IF (a.status IS NULL OR status = '' OR status = '0','Aktif','Tidak Aktif') as status, f.sangsi
		FROM tpelanggaran AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan LEFT JOIN tkaryawan AS c ON a.saksi = 					
		c.idkaryawan LEFT JOIN tkaryawan AS d ON d.idkaryawan = a.pelapor 
		LEFT JOIN tmaster_pelanggaran AS e ON a.idmaster_pelanggaran = e.idmaster_pelanggaran left join tsangsi as f On a.idsangsi = f.idsangsi  where (b.nama like '" . $field . "%' or c.nama like '" . $field . "%' or d.nama like '" . $field . "%' or e.master_pelanggaran like '" . $field . "%') limit 1000 ");
  
    }
	public function hapuspelanggaran($id)
	{
	
		return $this->db->delete('tpelanggaran', array('idpelanggaran' => $id));
	}
	
	public function editpelanggaran($id)
	{
		return $this->db->get_where('tpelanggaran',array('idpelanggaran'=>$id));
		
	}
	
	function getsangsi($id){
		$arr = array();
		$query = $this->db->query("SELECT b.idmaster_pelanggaran as id,b.master_pelanggaran as name FROM tmaster_pelanggaran  as b left join tsangsi as a ON a.idsangsi = b.idsangsi WHERE a.idsangsi='$id'" );
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr); 
    }
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tpelanggaran as b   where b.kdpelanggaran like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tpelanggaran' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT a.idpelanggaran,a.tgl,b.nama AS nama,c.nama AS nama_saksi,d.nama AS 
		nama_pelapor,e.master_pelanggaran AS pelanggaran,a.ket,a.idmaster_pelanggaran,a.idsangsi,a.idkaryawan,a.saksi,a.pelapor,a.tglmulai_sangsi,a.tglberakhir_sangsi
		FROM tpelanggaran AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan LEFT JOIN tkaryawan AS c ON a.saksi = 					
		c.idkaryawan LEFT JOIN tkaryawan AS d ON d.idkaryawan = a.pelapor 
		LEFT JOIN tmaster_pelanggaran AS e ON a.idmaster_pelanggaran = e.idmaster_pelanggaran where a.idpelanggaran = '$id'");	
        
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
	
	public function get_datapopup($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan,a.nik,a.nama  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function get_datapopupsaksi($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan as saksi,a.nik,a.nama as nama_saksi  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function get_datapopuppelapor($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.idkaryawan as pelapor,a.nik,a.nama as nama_pelapor  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
}
