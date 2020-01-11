<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KirimpesanModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
    }	
    public function getDataPegawai()
	{
		$result = $this->db->query("SELECT * from pegawai WHERE nip NOT IN (SELECT nip from user)")->result_array();
		return $result;
	}
	public function getDataToken()
	{
		$result = $this->db->query("SELECT token from pegawai WHERE nip NOT IN (SELECT nip from user)")->result_array();
			return $result;
	}
	public function savePesan($nip, $pesan)
	{
		$this->db->query("INSERT INTO inbox (tgl_inbox,nip, pesan) VALUES(NOW(),?,?)", array($nip,$pesan));

	}
	public function getTokenByNIP($nip)
	{
		return $this->db->query("SELECT token from pegawai WHERE nip = ?",array($nip))->result_array();
		
	}

}
