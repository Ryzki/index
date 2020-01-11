<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsensiModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getDataPegawaiById($nip)
	{
		$data = $this->db->query("SELECT * from pegawai where nip=?",array($nip))->row();
		return (array)$data;
	}

	public function getDataAbsensi()
	{
		$jam_batas = $this->db->query("SELECT jam_toleransi from konfigurasi")->row()->jam_toleransi;

		$data = $this->db->query("SELECT a.id,a.nip,b.nm_pegawai,DATE(a.tgl_absen) tgl,TIME(a.tgl_absen) jam,(IF(TIME(a.tgl_absen)>'$jam_batas','Terlambat','Tepat Waktu')) cstatus 
		from absen_pegawai a JOIN pegawai b ON a.nip=b.nip WHERE DATE(a.tgl_absen)=DATE(NOW()) UNION ALL ".
		"SELECT 0 id,c.nip,c.nm_pegawai,'-' tgl,'-' jam, 'Belum Absen' cstatus from pegawai c WHERE c.nip not in (SELECT nip from absen_pegawai where DATE(tgl_absen)=DATE(NOW()))
		AND c.nip NOT IN (SELECT nip from izin_pegawai WHERE DATE(NOW()) between tgl_mulai and tgl_selesai) UNION ALL ".
		"SELECT -1 id,d.nip,e.nm_pegawai,'-' tgl,'-' jam,d.ket_absen cstatus from izin_pegawai d JOIN pegawai e ON d.nip=e.nip 
		WHERE tgl_mulai<=DATE(NOW()) and tgl_selesai>=DATE(NOW()) AND status=1");
		return $data->result_array();
	}
	
	public function getDataAbsensiById($id)
	{
		$data = $this->db->query("SELECT * FROM absen_pegawai WHERE id=?",array($id))->row();
		return (array)$data;
	}

	public function getDataAbsensiByTgl($tgl)
	{
		$jam_batas = $this->db->query("SELECT jam_toleransi from konfigurasi")->row()->jam_toleransi;
		
		$data = $this->db->query("SELECT a.id,a.nip,b.nm_pegawai,DATE(a.tgl_absen) tgl,TIME(a.tgl_absen) jam,(IF(TIME(a.tgl_absen)>'$jam_batas','Terlambat','Tepat Waktu')) cstatus 
		from absen_pegawai a JOIN pegawai b ON a.nip=b.nip WHERE DATE(a.tgl_absen)=? UNION ALL ".
		"SELECT 0 id,c.nip,c.nm_pegawai,'-' tgl,'-' jam, 'Belum Absen' cstatus from pegawai c WHERE c.nip not in (SELECT nip from absen_pegawai where DATE(tgl_absen)=?)
		AND c.nip NOT IN (SELECT nip from izin_pegawai WHERE '$tgl' between tgl_mulai and tgl_selesai) UNION ALL ".
		"SELECT -1 id,d.nip,e.nm_pegawai,'-' tgl,'-' jam,d.ket_absen cstatus from izin_pegawai d JOIN pegawai e ON d.nip=e.nip 
		WHERE tgl_mulai<=? and tgl_selesai>=? AND status=1",array($tgl,$tgl,$tgl,$tgl));
		return $data->result_array();
	}
	

    public function SaveData($nip,$tgl)
	{

		$this->db->trans_begin();
		$this->db->query("INSERT INTO absen_pegawai (tgl_absen,nip,location) VALUES(?,?,'-')",array($tgl,$nip));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		
	}
    public function UpdateData($tgl,$id)
	{

		$this->db->trans_begin();
		$this->db->query("UPDATE absen_pegawai SET tgl_absen=? WHERE id=?",array($tgl,$id));
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
