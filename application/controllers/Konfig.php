<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfig extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model("KonfigModel");		
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Konfig')){
			$data['act_menu'] = 'Setup';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['data_table'] = $this->KonfigModel->getDataKonfigurasi();
			$data['data_shift'] = $this->KonfigModel->getDataShift();
			

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('konfig/konfig_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}


	 public function SaveData() {

    	$jam_m = $this->input->post('jam_masuk');
		$jam_t = $this->input->post('jam_toleransi');
		$min_u = $this->input->post('min_update');
		$data = $this->input->post('data');
		$jam_p = $this->input->post('jam_pulang');
	
		$cek= $this->KonfigModel->SaveData($jam_m,$jam_t,$min_u,$data,$jam_p);
		if ($cek) {
			$respon = array("msg" => "Tambah Data berhasil");
		}else {
			$respon = array("msg" => "Tambah Data gagal");
		}
		$this->sessison->set_flashdata('respon',$respon);
		redirect(base_url().'Konfig');		
	}
		


}

