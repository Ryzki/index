<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IzinModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getDataIzinPegawai()
	{
		$data = $this->db->query("SELECT a.*,b.nm_pegawai from  izin_pegawai a join pegawai b on a.nip=b.nip ORDER BY a.id desc");
		return $data->result_array();
	}

	public function getDataPegawai()
	{
		$today = date('Y-m-d');
		$data = $this->db->query("SELECT * from  pegawai WHERE nip NOT IN 
		(SELECT nip from izin_pegawai WHERE '$today' between tgl_mulai and tgl_selesai UNION ALL 
		SELECT nip from absen_pegawai where date(tgl_absen)=?)",array($today));
		return $data->result_array();
	}

    public function getDataTokenById($id)
	{
		$data = $this->db->query('SELECT b.token from izin_pegawai a JOIN pegawai b ON a.nip=b.nip WHERE a.id=?',array($id))->row();
		$token = $data->token;

		return $token;
    }

	public function getDataJenisIzin()
	{
		$data = $this->db->query("SELECT * from  jenis_absen");
		return $data->result_array();
	}	


	public function SaveData($nip,$jns,$tgl_m,$tgl_s,$stat,$ket,$file)
	{
		$this->db->trans_begin();
		$this->db->query("INSERT INTO izin_pegawai (tgl_mohon,nip,ket_absen,tgl_mulai,tgl_selesai,status,keterangan,file) 
		VALUES (NOW(),?,?,?,?,?,?,?)",array($nip,$jns,$tgl_m,$tgl_s,$stat,$ket,$file));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	public function UpdateData($id,$stat) {
		$data = $this->db->query("UPDATE izin_pegawai SET status=? WHERE id=?",array($stat,$id));
		return $data;
	}

	public function DeleteData($id) {
		$filename = $this->db->query("SELECT file from izin_pegawai WHERE id=?",array($id))->row()->file;

		$path = './uploads/'.$filename;
		if(!empty($filename)){
			if (is_readable($path) && unlink($path)) {
				$data = $this->db->query("DELETE FROM izin_pegawai WHERE id=?",array($id));
				return $data;
			} else {
				return false;
			}		
		}else{
			$data = $this->db->query("DELETE FROM izin_pegawai WHERE id=?",array($id));
			return $data;
		}
		
		
	}

}

?>
