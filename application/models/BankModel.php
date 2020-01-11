<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	

	public function getDataBank()
	{
		$data = $this->db->query('SELECT * FROM bank');
		return $data->result_array();
    }
    
 
    

	public function getDataById($id)
	{
		$data = $this->db->query("SELECT * from bank where id_bank=?",array($id));
		return $data->row();
	}

	public function SaveData($nm,$norek,$logo,$atas_nama) {
		
		$data = $this->db->query("INSERT into bank VALUES (null,?,?,?,?)",array($nm,$atas_nama,$norek,$logo));
		return $data;
	}

	public function UpdateData($id,$nm,$norek,$logo,$atas_nama) {
		$data = $this->db->query("UPDATE bank SET nama=?, no_rek=?, logo=?, atas_nama=? WHERE id_bank=?",
		array($nm,$norek,$logo,$atas_nama,$id));
		return $data;
	}

	public function DeleteData($id) {
		$data = $this->db->query("DELETE from bank WHERE id_bank=?",array($id));
		return $data;
	}

}

?>
