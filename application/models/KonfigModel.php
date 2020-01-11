<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfigModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getDataKonfigurasi()
	{
		$data = $this->db->query('SELECT * from konfigurasi');
		return $data->row();
	}
	public function getDataShift()
	{
		$data = $this->db->query('SELECT * from shift');
		return $data->result_array();
	}
	public function SaveData($jam_m,$jam_t,$min_u,$data,$jam_p) {
		
		$this->db->trans_begin();
		$this->db->query("DELETE FROM konfigurasi");
		$this->db->query("INSERT INTO konfigurasi VALUES(?,?,?,?)",array($jam_m,$jam_t,$min_u,$jam_p));
		$this->db->query("DELETE FROM shift");
		foreach($data as $dt){
			$this->db->query("INSERT INTO shift (keterangan, jam_masuk, jam_keluar) values (?,?,?)",array($dt[0],$dt[1],$dt[2]));
		}
		if($this->db->trans_status()){
			$this->db->trans_commit();
		}else{
			$this->db->trans_rollback();
		}
		return $this->db->trans_status();
	}

}

?>
