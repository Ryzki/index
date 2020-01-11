<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("AbsensiModel");		
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Absensi')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;
	
			$data['data_table'] = $this->AbsensiModel->getDataAbsensi();

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('absen/absen_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}

	public function Filter()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Absensi')){
			
			$tgl = $this->input->post('tgl');
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			
			$data['data_table'] = $this->AbsensiModel->getDataAbsensiByTgl($tgl);

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('absen/absen_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}

	public function EditPage($id,$nip) {
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Absensi')){
			
			$data['action'] = ($id==0?"SaveData":"UpdateData");
			$data['data_table'] = ($id==0?null:$this->AbsensiModel->getDataAbsensiById($id));
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Aplikasi';
			$data['caption'] = ($id==0?"Tambah":"Edit");
			$data['data_pegawai'] = $this->AbsensiModel->getDataPegawaiById($nip);
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;	
				
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('absen/absen_add');
			$this->load->view('footer_layout');			
			
		}else{
			redirect(base_url('Login/SignOut'));
		}


	}

	public function SaveData() {

    	$nip = $this->input->post('nip');
		$tgl = $this->input->post('tgl_absen');
		
		$cek= $this->AbsensiModel->SaveData($nip,$tgl);
		if ($cek) {
			$respon = array("msg" => "Tambah Data berhasil");
		}else {
			$respon = array("msg" => "Gagal Tambah Data ");
		}
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Absensi');
	}

	public function UpdateData() {

		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$tgl = $this->input->post('tgl_absen');
		
		$cek= $this->AbsensiModel->UpdateData($nip,$tgl);
		if ($cek) {
			$respon = array("msg" => "Edit Data berhasil");
		}else {
			$respon = array("msg" => "Edit Data Gagal ");
		}
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Absensi');

	}


}
