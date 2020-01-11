<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GolonganModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
	}


	public function getData()
	{
		$result = $this->db->query("SELECT * from golongan order by gol")->result_array();
		return $result;
	}



	public function getDataById($id)
	{
		$result = $this->db->query("SELECT * from golongan where id_gol=?",array($id))->row();
		return $result;
	}
	

	public function SaveData($kd,$nama)
	{
		$this->db->trans_begin();
		$this->db->query("INSERT INTO golongan (gol, keterangan) values(?,?)",array($kd,$nama));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		
	}	
	
	
	public function UpdateData($id,$nama)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE golongan set keterangan=? where id_gol=?",array($nama,$id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}	
	public function DeleteData($id)
	{
		$this->db->trans_begin();
		$this->db->query("DELETE from golongan where id_gol=?",array($id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}	
	

}
