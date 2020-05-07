<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	
	public function kesiangan()
		 {
			return  $this->db->query("SELECT DISTINCT a.tgl_masuk,a.nik,b.nama,c.departemen,a.jam_masuk,
			FORMAT(TIME_TO_SEC(TIMEDIFF(jam_masuk,jam_wajib_masuk))/(60*60),2) as selisih_jam FROM tabsen AS a LEFT JOIN tkaryawan AS b ON a.nik = b.nik LEFT JOIN tdepartemen AS c ON b.iddepartemen = c.iddepartemen where jam_masuk > jam_wajib_masuk and a.tgl_masuk = CURRENT_DATE()");
									
  
    }
	public function mangkir()
		 {
		 	date_default_timezone_set('Asia/Jakarta');
			$jam =  date('H:i:s'); // Hasil: 20-01-2017 05:32:15
			
			return  $this->db->query("SELECT CURRENT_DATE() as tgl,a.nik,a.nama,departemen,tgl_masuk FROM (
										SELECT a.nik,b.nama,c.departemen,tgl_masuk 
										FROM  tabsen AS a  LEFT JOIN  tkaryawan AS b ON a.nik = b.nik 
										LEFT JOIN tdepartemen AS c ON b.iddepartemen = c.iddepartemen 
										WHERE a.tgl_masuk = CURRENT_DATE()
									) AS subquery 
									RIGHT JOIN  tkaryawan AS a ON  subquery.nik = a.`nik` left join tmgroup_kerja as b ON a.idgroup = b.idmgroup_kerja left join tjadwal_kerja as c ON a.idgroup = c.idmgroup_kerja left join tparameter as d ON c.idparameter = d.idparameter where c.tgl = CURRENT_DATE() and subquery.tgl_masuk is null"  );
									
  
    }
	
	public function pelbaru()
		 {
			return  $this->db->query("SELECT  a.tgl,b.nik,b.nama,c.departemen,d.sangsi 
									FROM tpelanggaran AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan 
									LEFT JOIN tdepartemen AS c ON b.iddepartemen = c.iddepartemen
									LEFT JOIN tsangsi AS d ON a.idsangsi = d.`idsangsi` where  status is null and DATEDIFF(CURRENT_DATE(),a.tglmulai_sangsi) < 14");								
    }

	public function pelaktif()
		 {
			return  $this->db->query("SELECT  a.tgl,b.nik,b.nama,c.departemen,d.sangsi 
									FROM tpelanggaran AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan 
									LEFT JOIN tdepartemen AS c ON b.iddepartemen = c.iddepartemen
									LEFT JOIN tsangsi AS d ON a.idsangsi = d.`idsangsi` where  status is null and DATEDIFF(CURRENT_DATE(),a.tglmulai_sangsi) > 14");								
    }
	
	public function pelberakhir()
		 {
			return  $this->db->query("SELECT  a.tgl,b.nik,b.nama,c.departemen,d.sangsi 
									FROM tpelanggaran AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan 
									LEFT JOIN tdepartemen AS c ON b.iddepartemen = c.iddepartemen
									LEFT JOIN tsangsi AS d ON a.idsangsi = d.`idsangsi` where status = '1'");								
    }
	public function approve()
		 {
			return  $this->db->query("SELECT  a.idspl,a.tgl,a.nospl,CONCAT(jam_mulai, ' ', jam_berakhir) AS jam,b.nama
										FROM tspl AS a LEFT JOIN tkaryawan AS b ON b.idkaryawan = a.permintaan_dari where a.acc is null");								
    }

	public function approved()
		 {
			return  $this->db->query("SELECT  a.tgl,a.nospl,CONCAT(jam_mulai, ' ', jam_berakhir) AS jam,b.nama
										FROM tspl AS a LEFT JOIN tkaryawan AS b ON b.idkaryawan = a.permintaan_dari where a.acc ='1'");								
    }
	
	public function reject()
		 {
			return  $this->db->query("SELECT  a.tgl,a.nospl,CONCAT(jam_mulai, ' ', jam_berakhir) AS jam,b.nama
										FROM tspl AS a LEFT JOIN tkaryawan AS b ON b.idkaryawan = a.permintaan_dari where a.acc ='2'");								
    }
	
	public function profile1($idkaryawan)
		 {
			return  $this->db->query("SELECT 		a.idkaryawan,a.pin,a.nik,a.noktp,a.nobpjs,a.bpjstk,a.nama,a.tempat_lahir,a.tanggal_lahir,a.agama,a.jk,a.jmlcuti,f.name,a.photo,
				CONCAT_WS(' ',a.alamat, e.name ,f.name,g.name ,h.name) as alt,a.tlp,j.divisi,
				a.hp,b.pendidikan,c.jabatan,d.departemen,i.mgroup_kerja ,a.jobdesk,a.tanggal_masuk,a.tanggal_keluar,a.`tanggal_diangkat`
				
				FROM tkaryawan AS a LEFT JOIN tpendidikan AS b ON a.idpendidikan = b.`idpendidikan`
				LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan`
				LEFT JOIN tdepartemen AS d ON a.`iddepartemen` = d.`iddepartemen` left join villages as e ON a.iddesa = e.id
				left join districts as f on a.idkecamatan = f.id
				left join regencies as g on a.idkota = g.id
				left join provinces as h on a.idpropinsi = h.id
				left join tmgroup_kerja as i on a.idgroup = i.idmgroup_kerja
				left join tdivisi as j on a.iddivisi = j.iddivisi where a.idkaryawan =10");								
    }
	
	public function kontrakberakhir()
		 {

			return  $this->db->query("SELECT 		a.idkaryawan,a.pin,a.nik,a.noktp,a.nobpjs,a.bpjstk,a.nama,a.tempat_lahir,a.tanggal_lahir,a.agama,a.jk,a.jmlcuti,f.name,
				CONCAT_WS(' ',a.alamat, e.name ,f.name,g.name ,h.name) as alt,a.tlp,j.divisi,
				a.hp,b.pendidikan,c.jabatan,d.departemen,i.mgroup_kerja ,a.jobdesk,a.tanggal_masuk,a.tanggal_keluar,a.`tanggal_diangkat`,a.tglhabis_kontrak
				
				FROM tkaryawan AS a LEFT JOIN tpendidikan AS b ON a.idpendidikan = b.`idpendidikan`
				LEFT JOIN tjabatan AS c ON a.`idjabatan` = c.`idjabatan`
				LEFT JOIN tdepartemen AS d ON a.`iddepartemen` = d.`iddepartemen` left join villages as e ON a.iddesa = e.id
				left join districts as f on a.idkecamatan = f.id
				left join regencies as g on a.idkota = g.id
				left join provinces as h on a.idpropinsi = h.id
				left join tmgroup_kerja as i on a.idgroup = i.idmgroup_kerja
				left join tdivisi as j on a.iddivisi = j.iddivisi where DATEDIFF(CURRENT_DATE(), a.tglhabis_kontrak) < 30  ");								
    }
	public function tampil_demografi()
	{
		return $this->db->get('tdemografi');
	}
/*
	public function edit_jenis($id)
	{
		return $this->db->get_where('tkeluarga',array('jenis_id'=>$id));
	}
*/
	

	public function cek_login($user, $pass)
	{
		return  $this->db->query("SELECT a.iduser,a.username,a.idkaryawan,a.nama,b.tanggal_masuk as masuk FROM sysuser AS a LEFT JOIN tkaryawan AS b ON a.idkaryawan = b.idkaryawan where a.username = '$user' and password = '$pass'");
	}
	
	
	public function hideshowdashboard($field)
	{
		 $arr = array();

		$query = $this->db->query("SELECT DISTINCT  b.code,b.nameof,b.filename,b.icon  FROM sysuseraccess AS a LEFT JOIN 
				sysappmenuitem AS b ON a.fcode = b.code LEFT JOIN sysappmenu AS c ON b.fcode=c.code 
				WHERE b.fcode = '106' AND idkaryawan = '$field' " );

        foreach($query->result_object() as $rows )
        {
            $arr[] = $rows;
			
        }
        return  json_encode($arr);
	}


	public function tampil_user()
	{
		return $this->db->get('login');
	}

	public function insert_user($object)
	{
		$this->db->insert('login', $object);
	}

	public function edit_user($id)
	{
		return $this->db->get_where('login',array('id_user'=>$id));
	}

	public function update_user($id, $object)
	{
		$this->db->where('id_user', $id);
		$this->db->update('login', $object); 
	}

	public function hapus_user($id)
	{
		return $this->db->delete('login', array('id_user' => $id));
	}
	
	
	
	
	
	
	
	
}
