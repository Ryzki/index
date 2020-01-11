<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengumumanModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
	}

	
	public function getData()
	{
		$result = $this->db->query("SELECT * from pengumuman order by id desc")->result_array();
		return $result;
	}

    public function getDataToken()
	{
		$data = $this->db->query('SELECT token from pegawai')->result_array();
		$token = array();
		foreach($data as $row){
			array_push($token,$row['token']);
		}
		return $token;
    }

	public function getDataById($id)
	{
		$result = $this->db->query("SELECT * from pengumuman where id=?",array($id))->row();
		return $result;
	}
	
	public function SaveData($ket)
	{

		$this->db->trans_begin();
		$this->db->query("INSERT INTO pengumuman (pengumuman,tgl) values(?,NOW())",array($ket));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		
	}	
	
	
	public function UpdateData($id,$ket)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE pengumuman set pengumuman=?,tgl=NOW() where id=?",
		array($ket,$id));
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
		$this->db->query("DELETE from pengumuman where id=?",array($id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}	
	
}
