<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model("PegawaiModel");		
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pegawai')){
			$data['act_menu'] = 'Setup';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['data'] = $this->PegawaiModel->getDataForTable();
			// $data['lokasi'] = $this->PegawaiModel->getDataLokasi();

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pegawai/pegawai_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}

	public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pegawai')){
			$data['caption'] = 'Tambah';
			$data['action'] = 'SaveData';
			$data['data_table']=null;

			$data['act_menu'] = 'Setup';
			$data['akses'] = $this->session->userdata('menu');
			
			$data['golongan'] = $this->PegawaiModel->getDataGol();
			$data['lokasi'] = $this->PegawaiModel->getDataLokasi();
			$data['shift'] = $this->PegawaiModel->getDataShift();

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pegawai/pegawai_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}		
	}

	public function EditPage($kd)
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pegawai')){
			$data['data_table']= (array)$this->PegawaiModel->getDataById($kd);

			$data['act_menu'] = 'Setup';
			$data['akses'] = $this->session->userdata('menu');	
			$data['golongan'] = $this->PegawaiModel->getDataGol();
			$data['lokasi'] = $this->PegawaiModel->getDataLokasi();
			$data['shift'] = $this->PegawaiModel->getDataShift();
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
		
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pegawai/pegawai_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}		
	}

	public function SaveData() 
	{
    	$nip = $this->input->post('nip');
		$nm = $this->input->post('nama');
		$gol = $this->input->post('gol');
		$lok = $this->input->post('lokasi');
		$shift = $this->input->post('shift');
		$user = $this->input->post('user');
		$pass =  $this->input->post('pass');
		$imei =  $this->input->post('imei');
		
		$cek= $this->PegawaiModel->SaveData($nip,$nm,$gol,$user,$pass,$imei, $lok, $shift);
		if ($cek) {
			$respon = array("msg" => "Tambah Data berhasil");
		}else {
			$respon = array("msg" => "Tambah Data Gagal");
		}
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Pegawai');
    }

	public function UpdateData() 
	{

		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nm = $this->input->post('nama');
		$gol = $this->input->post('gol');
		$user = $this->input->post('user');
		$pass =  $this->input->post('pass');
		$imei =  $this->input->post('imei');
		$lok = $this->input->post('lokasi');
		$shift = $this->input->post('shift');

		$cek = $this->PegawaiModel->UpdateData($nip,$nm,$gol,$user,$pass,$imei,$id, $lok, $shift);
		if ($cek) {
			$respon = array("msg" => "Update Data berhasil");
		}else {
			$respon = array("msg" => "Update Data Gagal");
		}
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Pegawai');		
    }

	public function DeleteData($kd) 
	{
		$cek= $this->PegawaiModel->DeleteData($kd);
		if ($cek) {
			$respon = array("msg" => "Delete Data berhasil");
		}else {
			$respon = array("msg" => "Delete Data Gagal");

		}
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Pegawai');		
    }



}
