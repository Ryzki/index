<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getDataForTable()
	{
		$data = $this->db->query('SELECT p.id_pegawai, p.nip, p.nm_pegawai, p.gol, p.user_app, l.keterangan FROM pegawai p JOIN lokasi l ON p.id_lokasi = l.id_lokasi;');
		return $data->result_array();
	}

	public function getDataPegawai()
	{
		$data = $this->db->query('SELECT * from pegawai');
		return $data->result_array();
    }
    
    public function getDataGol()
	{
		$data = $this->db->query('SELECT * from golongan');
		return $data->result_array();
	}
	public function getDataLokasi()
	{
		$data = $this->db->query('SELECT * from lokasi');
		return $data->result_array();
	}
	public function getDataShift()
	{
		$data = $this->db->query('SELECT * from shift');
		return $data->result_array();
	}
    


	public function getDataById($id)
	{
		$data = $this->db->query("SELECT * from pegawai where id_pegawai=?",array($id));
		return $data->row();
	}

	public function SaveData($nip,$nm,$gol,$user,$pass,$imei,$lok, $shift) {
		
		$data = $this->db->query("INSERT into pegawai (nip,nm_pegawai,gol,user_app,pass_app,imei,id_lokasi,id_shift) 
		VALUES (?,?,?,?,?,?,?,?)",array($nip,$nm,$gol,$user,$pass,$imei,$lok, $shift));
		return $data;
	}

	public function UpdateData($nip,$nm,$gol,$user,$pass,$imei,$id,$lok, $shift) {
		$data = $this->db->query("UPDATE pegawai SET nip=?,nm_pegawai=?,gol=?,user_app=?,pass_app=?,imei=?, id_lokasi=?, id_shift=? WHERE id_pegawai=?",
		array($nip,$nm,$gol,$user,$pass,$imei,$lok, $shift,$id));
		return $data;
	}

	public function DeleteData($id) {
		$data = $this->db->query("DELETE from pegawai WHERE id_pegawai=?",array($id));
		return $data;
	}

}

?>
