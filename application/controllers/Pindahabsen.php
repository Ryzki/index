<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindahabsen extends CI_Controller {

	public function __construct(){
		parent:: __construct();
        $this->load->model("PindahabsenModel");	
        $this->load->model("PegawaiModel");	
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pindahabsen')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['pegawai'] = $this->PindahabsenModel->getDataPegawaiByGroup();

			$data['akses'] = $this->session->userdata('menu');
			$data['caption'] = 'Tambah';
			$data['action'] = 'TambahData';
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pindahabsen/pindahabsen_first_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}
	public function TambahData()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pindahabsen')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['lokasi'] = $this->PegawaiModel->getDataLokasi();
			$data['parent'] = $this->PindahabsenModel->getFirstAbjad();
			$data['pegawai'] = $this->PindahabsenModel->getDataPegawai();

			$data['akses'] = $this->session->userdata('menu');
			$data['caption'] = 'Tambah';
			$data['action'] = 'SaveData';
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pindahabsen/pindahabsen_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}
	public function SaveData()
	{
		$lokasi = $this->input->post('lokasi');
		$peg =  $this->input->post('peg');

		$this->PindahabsenModel->saveData($peg,$lokasi);
			// $this->PindahabsenModel->updatedata($p,$lokasi);
		
		redirect(base_url('Pindahabsen'));
	}
	public function updatedata($id)
	{
	
		$flag = $this->PindahabsenModel->updatedata($id);
		if($flag){
			$this->PindahabsenModel->deleteData($id);
			redirect(base_url('Pindahabsen'));
		}
		
	}


}

?>