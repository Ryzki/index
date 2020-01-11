<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct(){
		parent:: __construct();

        $this->load->model("BankModel");	
        $this->load->library("MySlim");	
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Bank')){
			$data['act_menu'] = 'Setup';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['data_table'] = $this->BankModel->getDataBank();
			

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('bank/bank_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}

	public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Bank')){
			$data['caption'] = 'Tambah';
			$data['action'] = 'SaveData';
			$data['data_table']=null;

			$data['act_menu'] = 'Setup';
			$data['akses'] = $this->session->userdata('menu');
			
		

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('bank/bank_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}		
	}

	public function EditPage($kd)
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Bank')){
			$data['data_table']= (array)$this->BankModel->getDataById($kd);

			$data['act_menu'] = 'Setup';
			$data['akses'] = $this->session->userdata('menu');	
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
		
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('bank/bank_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}		
	}

	public function SaveData() 
	{
    	$nm = $this->input->post('nama');
        $norek = $this->input->post('no_rek');
        $atas_nama = $this->input->post('atas_nama');
        
        $image = Slim::getImages('foto');
		$foto1 =  $image[0]; //logo
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$file = Slim::saveFile($data1, $nama1,'./assets/images/bank');
		if ($file!=false) {
			$cek= $this->BankModel->SaveData($nm,$norek,$file['name'],$atas_nama);
			if ($cek) {
				$respon = array("msg" => "Tambah Data berhasil");
			}else {
				$respon = array("msg" => "Tambah Data Gagal");
			}
		} else {
			$respon = array("msg" => "Gagal Upload Gambar");
		}
		
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Bank');
    }

	public function UpdateData() 
	{

		$id = $this->input->post('id');
		$nm = $this->input->post('nama');
        $norek = $this->input->post('no_rek');
		$atas_nama = $this->input->post('atas_nama');
		$foto_old = $this->input->post('foto_old');
        
        $files= (array)$this->BankModel->getDataById($id);
		
        unlink('assets/images/bank/'.$files['logo']);
        
        $image = Slim::getImages('foto');
		$foto1 =  $image[0]; //logo
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$file = Slim::saveFile($data1, $foto_old,'./assets/images/bank');
		if ($file!=false) {
			$cek = $this->BankModel->UpdateData($id,$nm,$norek,$file['name'], $atas_nama);
			if ($cek) {
				$respon = array("msg" => "Update Data berhasil");
			}else {
				$respon = array("msg" => "Update Data Gagal");
			}
		}else {
			$respon = array("msg" => "Gagal Upload Gambar");
		}
		
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Bank');		
    }

	public function DeleteData($id) 
	{
		$files= (array)$this->BankModel->getDataById($id);
	
		$result = $this->BankModel->DeleteData($id);
		
		if($result){
			
			unlink('assets/images/bank/'.$files['logo']);
			
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Bank');		
    }



}
