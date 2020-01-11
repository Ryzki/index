<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
    }	
    public function getData()
	{
		$result = $this->db->query("SELECT * from lokasi")->result_array();
		return $result;
	}

    public function SaveData($ket,$alamat,$kab,$provinsi,$brosur,$denah,$file,$deskripsi)
	{
		$this->db->trans_begin();
		$this->db->query("INSERT INTO lokasi values(null,?,?,?,?,?,?,?,?)",array($ket,$alamat,$kab,$provinsi,$deskripsi,$file,$denah,$brosur));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		
    }
		
    public function UpdateData($id,$ket,$alamat,$kab,$provinsi,$brosur,$denah,$file,$deskripsi)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE lokasi set ket=?, alamat=?, kabKota=?,provinsi=?, brosur=?, denah=?, file=?, deskripsi=? where kodeLokasi=?",array($ket,$alamat,$kab,$provinsi,$brosur,$denah,$file,$deskripsi,$id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}	
	
	public function updateDataEdit($id,$ket,$alamat,$kab,$provinsi,$file)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE lokasi set ket=?, alamat=?, kabKota=?,provinsi=?, file=? where kodeLokasi=?",array($ket,$alamat,$kab,$provinsi,$file,$id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
  }
    public function getDataById($id)
	{
		$result = $this->db->query("SELECT * from lokasi where kodeLokasi=?",array($id))->row();
		return $result;
	}

	public function getFileById($id)
	{
		$result = $this->db->query("SELECT * from lokasi where kodeLokasi=?",array($id))->row();
		return $result;
	}

	public function DeleteData($id)
	{
			$this->db->trans_begin();
			$this->db->query("DELETE from lokasi where kodeLokasi=?",array($id));
			if($this->db->trans_status()){
				$this->db->trans_commit();
				return true;
			}else{
				$this->db->trans_rollback();
				return false;
			}
    }

}
