<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('LiveModel');

	}

	public function index()
	{
		
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Live')){

			$data['act_menu'] = 'Aplikasi';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');
			$data['select'] = null;
			$data['data_table'] = $this->LiveModel->getDataLocation();
			$data['data'] = $this->LiveModel->getDataPegawai();
			$data['action'] = "pilih";
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('live/live_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}


	public function pilih()
	{
	
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Live')){

			$data['act_menu'] = 'Aplikasi';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$nama = $this->input->post('pegawai');
			$tgl = $this->input->post('tgl');
			$data['akses'] = $this->session->userdata('menu');
			$data['data'] = $this->LiveModel->getDataPegawai();
			$data['select'] = $nama;
			if($nama == 'semua'){
				$data['data_table'] = $this->LiveModel->getDataLocation();
			}else{
				$data['data_table'] = $this->LiveModel->getDataById($nama,$tgl);
			}
			$data['action'] = "pilih";
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('live/live_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}


	}

}
