<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('GolonganModel');

	}

	public function index()
	{
		
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Golongan')){

			$data['act_menu'] = 'Setup';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');

			$data['data_table'] = $this->GolonganModel->getData();
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('golongan/golongan_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}


	public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Golongan')){
			$data['data_table'] = null;
			$data['act_menu'] = 'Setup';
			$data['caption'] = 'Tambah';
			$data['akses'] = $this->session->userdata('menu');
			$data['action'] = 'SaveData';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('golongan/golongan_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}

	public function EditPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Golongan')){
			$data['data_table'] = (array)$this->GolonganModel->getDataById($id);
		
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Setup';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('golongan/golongan_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}
	public function SaveData()
	{

		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');


		$result = $this->GolonganModel->SaveData($kode,$nama);
		if($result){			

			$this->session->set_flashdata('respon',array("msg"=>"Tambah data berhasil"));
		}else{

			$this->session->set_flashdata('respon',array("msg"=>"Tambah data gagal"));
					
		}
		redirect(base_url().'Golongan');	
	}

	public function UpdateData()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');

		$result = $this->GolonganModel->UpdateData($id,$nama);
		if($result){
			$this->session->set_flashdata('respon',array("msg"=>"Edit data berhasil"));
			
		}else{

			$this->session->set_flashdata('respon',array("msg"=>"Edit data Gagal"));

		}
		redirect(base_url().'Golongan');
	}
	
	public function DeleteData($id)
	{

		$result = $this->GolonganModel->DeleteData($id);
		if($result){
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Golongan');
	}	
	
}
