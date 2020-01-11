<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subs extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model("SubsModel");		
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Subs')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['data_table'] = $this->SubsModel->getDataSubs();
			

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('subs/subs_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}



	public function DeleteData($kd) 
	{
		$cek= $this->SubsModel->DeleteData($kd);
		if ($cek) {
			$respon = array("msg" => "Delete Data berhasil");
		}else {
			$respon = array("msg" => "Delete Data Gagal");

		}
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Subs');		
    }



}
