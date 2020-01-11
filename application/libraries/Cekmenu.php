<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cekmenu{
	public function user_menu($user,$controller)
	{
		$CI =& get_instance();
		$CI->load->database();
		$qry = $CI->db->query("SELECT kd_menu From vw_hakakses WHERE username=? AND controller=?",array($user,$controller));

		$return = false;
		if($qry->num_rows()>0)
			$return = true;
		return $return;
	}

}
