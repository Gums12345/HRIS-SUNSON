<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mmutasi extends CI_Model {

	
	public function tampil($field)
	 {
		return  $this->db->query("SELECT a.idkaryawan,a.idmutasi,a.tgl,b.nik,b.nama ,c.departemen AS dept_awal,d.divisi AS 
div_awal,e.jabatan AS jab_awal,f.departemen AS dept,g.divisi AS divisi,h.jabatan AS jabatan, a.ket,
a.nmkadep,a.`tglacckadep`,a.`nmhrd`,a.`tglacchrd`,a.`nmdirektur`,a.`tglaccdirektur`,
a.`iddepartemen_baru`,a.`iddivisi_baru`,a.`idjabatan_baru`,
a.`iddepartemen_asal`,a.`iddivisi_asal`,a.`idjabatan_asal`
FROM tmutasi AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan 
LEFT JOIN tdepartemen AS c ON a.iddepartemen_asal = c.iddepartemen 
LEFT JOIN tdivisi AS d ON a.iddivisi_asal = d.iddivisi 
LEFT JOIN tjabatan AS e ON a.idjabatan_asal = b.idjabatan
LEFT JOIN tdepartemen AS f ON a.`iddepartemen_baru` = f.`iddepartemen`
LEFT JOIN tdivisi AS g ON a.`iddivisi_baru` = g.`iddivisi`
LEFT JOIN tjabatan AS h ON a.`idjabatan_baru` = h.idjabatan  where (b.nama like '" . $field . "%' or b.nik like '" . $field . "%') limit 1000 ");
  
    }
	public function hapusmutasi($id)
	{
	
		return $this->db->delete('tmutasi', array('idmutasi' => $id));
	}
	
	public function editmutasi($id)
	{
		return $this->db->get_where('tmutasi',array('idmutasi'=>$id));
		
	}
	
	function getsangsi($id){
		$arr = array();
		$query = $this->db->query("SELECT b.idmaster_mutasi as id,b.master_mutasi as name FROM tmaster_mutasi  as b left join tsangsi as a ON a.idsangsi = b.idsangsi WHERE a.idsangsi='$id'" );
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr); 
    }
	public function get_filterdata($field)
    {
        $arr = array();

		$query = $this->db->query("SELECT * from tmutasi as b   where b.kdmutasi like '" . $field . "%' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
		public function getjson()
    {
        $arr = array();
		
		 $query = $this->db->query("SELECT  column_name, column_type,column_comment FROM database_schema WHERE table_name =  'tmutasi' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  json_encode($arr);
    }

	
	public function mgetjsonshow($id)
    {
        $arr = array();


		$query = $this->db->query("SELECT a.idkaryawan,a.idmutasi,a.tgl,b.nik,b.nama ,c.departemen AS dept_awal,d.divisi AS 
div_awal,e.jabatan AS jab_awal,f.departemen AS dept,g.divisi AS divisi,h.jabatan AS jabatan, a.ket,
a.nmkadep,a.`tglacckadep`,a.`nmhrd`,a.`tglacchrd`,a.`nmdirektur`,a.`tglaccdirektur`,
a.`iddepartemen_baru`,a.`iddivisi_baru`,a.`idjabatan_baru`,
a.`iddepartemen_asal`,a.`iddivisi_asal`,a.`idjabatan_asal`
FROM tmutasi AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan 
LEFT JOIN tdepartemen AS c ON a.iddepartemen_asal = c.iddepartemen 
LEFT JOIN tdivisi AS d ON a.iddivisi_asal = d.iddivisi 
LEFT JOIN tjabatan AS e ON a.idjabatan_asal = b.idjabatan
LEFT JOIN tdepartemen AS f ON a.`iddepartemen_baru` = f.`iddepartemen`
LEFT JOIN tdivisi AS g ON a.`iddivisi_baru` = g.`iddivisi`
LEFT JOIN tjabatan AS h ON a.`idjabatan_baru` = h.idjabatan where a.idmutasi = '$id'");	
        
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
		
	$query = $this->db->query("SELECT b.idkaryawan,b.nik,b.nama ,c.departemen AS dept_awal,d.divisi AS 
div_awal,e.jabatan AS jab_awal,b.iddepartemen AS iddepartemen_asal,b.iddivisi AS iddivisi_asal,b.idjabatan AS idjabatan_asal
FROM tkaryawan AS b  LEFT JOIN tdepartemen AS c ON b.iddepartemen = c.iddepartemen 
LEFT JOIN tdivisi AS d ON b.iddivisi = d.iddivisi 
LEFT JOIN tjabatan AS e ON b.idjabatan = e.idjabatan
  where (b.nama like '" . $field . "%' or b.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function get_datapopupdepartemen($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.nik,a.nama as nmkadep  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function get_datapopuphrd($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.nik,a.nama as nmhrd  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
	public function get_datapopupdirektur($field)
    {
       $arr = array();
		
	$query = $this->db->query("SELECT a.nik,a.nama as nmdirektur  FROM  tkaryawan AS a  where (a.nama like '" . $field . "%' or a.nik like '" . $field . "%')   limit 1000 ");
		
		
        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
        }
        return  "{\"data\":" .json_encode($arr). "}";
    }
	
}
