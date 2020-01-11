<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PromoModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	

	public function getDataPromo()
	{
		$data = $this->db->query('SELECT * FROM promo');
		return $data->result_array();
    }
    
	public function getDataById($id)
	{
		$data = $this->db->query("SELECT * from promo where id_promo=?",array($id));
		return $data->row();
	}

	public function SaveData($nm,$desc,$foto) {
		
		$data = $this->db->query("INSERT into promo VALUES (null,?,?,?,now())",array($nm,$desc,$foto));
		return $data;
	}

	public function UpdateData($id,$nm,$desc,$foto) {
		$data = $this->db->query("UPDATE promo SET nm_promo=?, deskripsi=?, foto=? WHERE id_promo=?",
		array($nm,$desc,$foto,$id));
		return $data;
	}

	public function DeleteData($id) {
		$data = $this->db->query("DELETE from promo WHERE id_promo=?",array($id));
		return $data;
	}

}

?>
