<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PindahabsenModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}

	public function getFirstAbjad()
	{
		return $this->db->query("SELECT left(nm_pegawai,1) as parent FROM pegawai group by left(nm_pegawai,1) order by nm_pegawai")->result_array();
	}
	public function getDataPegawai()
	{
		return $this->db->query("SELECT nm_pegawai, left(nm_pegawai,1) as parent, nip FROM pegawai order by nm_pegawai")->result_array();
	}
	public function saveData($id_peg, $id_lokasi)
	{
		$kd = date('YmdHis');
		$this->db->trans_begin();
		foreach ($id_peg as $p) {
			$loksbl = $this->db->query("SELECT id_lokasi FROM pegawai WHERE nip = ?",array($p))->row()->id_lokasi;
			$this->db->query("INSERT INTO ubahabsen VALUES (?,?,?,?)", array($kd,$p,$id_lokasi,$loksbl));
			$this->db->query("UPDATE pegawai SET id_lokasi=?  WHERE nip=?", array($id_lokasi,$p));
		}	

		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}
	public function updatedata($id)
	{
		$id_peg = $this->db->query("SELECT nip_pegawai, id_lokasi_sebelum FROM ubahabsen WHERE id_ubahabsen = ?", array($id))->result_array();
		$this->db->trans_begin();
		foreach ($id_peg as $p) {
			$this->db->query("UPDATE pegawai SET id_lokasi = ? WHERE nip = ? ", array($p['id_lokasi_sebelum'],$p['nip_pegawai']));	
		}	
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	public function getDataPegawaiByGroup()
	{
		return $this->db->query("SELECT *,l.keterangan as lokasi_baru, l2.keterangan as lokasi_awal FROM 
		(SELECT ua.*, group_concat(p.nm_pegawai) as nama FROM ubahabsen ua join pegawai p on ua.nip_pegawai = p.nip group by ua.id_ubahabsen) tb 
		join lokasi l on tb.id_lokasi = l.id_lokasi join lokasi l2 on tb.id_lokasi_sebelum = l2.id_lokasi")->result_array();
	}
	public function deleteData($id)
	{
		$this->db->trans_begin();
		$this->db->query("DELETE FROM ubahabsen  WHERE id_ubahabsen = ? ", array($id));	
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}
	


}

?>
