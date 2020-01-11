<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getUserData($user,$pass)
	{

		$qry = $this->db->query("SELECT * FROM user 
		WHERE username=? and password=?",array($user,$pass));

		 if($qry->num_rows()==0){
			return false;
		 }else{
		 	$rs = $qry->row();
		 	$find_akses =  $this->db->query("SELECT * from vw_hakakses where username=? order by kd_menu",array($user));
		 	$menu = ($find_akses->num_rows()==0?false:$find_akses->result_array());

		 	return array(
		 		'cuser' => $rs->username ,
		 		'nama'=> $rs->nama,
		 		'akses'=>$menu);
		 }
	}

}

?>
