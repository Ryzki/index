<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiveModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
	}



	public function getDataLocation()
	{
		$qry = $this->db->query("SELECT u.nama,l.id_user,l.koordinat,l.waktu,l.jalan FROM user u JOIN loglokasi l ON u.id_user=l.id_user AND DATE(l.waktu)=DATE(NOW())
		UNION
		SELECT nama, nama, lokasi,tgl,ket FROM konsumen WHERE DATE(tgl)=DATE(NOW())");

		return $qry->result_array();
	}

	public function getDataPegawai()
	{
		return $this->db->query("SELECT * FROM user")->result_array();
	}

	public function getDataById($id, $tgl)
	{
		return $this->db->query("SELECT u.nama,l.id_user,l.koordinat,l.waktu,l.jalan FROM user u JOIN loglokasi l ON u.id_user=l.id_user WHERE l.id_user = ?  AND DATE(l.waktu) =  ?
		UNION
		SELECT nama, nama, lokasi,tgl,ket FROM konsumen WHERE sales = ?  AND DATE(tgl) =  ? ", array($id,$tgl,$id,$tgl))->result_array();
	}
}
