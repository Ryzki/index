<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubsModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	

	public function getDataSubs()
	{
		$data = $this->db->query('SELECT * FROM subscriber');
		return $data->result_array();
    }



	public function DeleteData($id) {
		$data = $this->db->query("DELETE from subscriber WHERE email=?",array($id));
		return $data;
	}

}

?>
