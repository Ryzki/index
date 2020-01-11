<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

	public function __construct(){
		parent:: __construct();

        $this->load->model("PromoModel");	
        $this->load->library("MySlim");	
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Promo')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['data_table'] = $this->PromoModel->getDataPromo();
			

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('promo/promo_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}

	public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Promo')){
			$data['caption'] = 'Tambah';
			$data['action'] = 'SaveData';
			$data['data_table']=null;

			$data['act_menu'] = 'Aplikasi';
			$data['akses'] = $this->session->userdata('menu');
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('promo/promo_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}		
	}

	public function EditPage($kd)
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Promo')){
			$data['data_table']= (array)$this->PromoModel->getDataById($kd);

			$data['act_menu'] = 'Aplikasi';
			$data['akses'] = $this->session->userdata('menu');	
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
		
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('promo/promo_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}		
	}

	public function SaveData() 
	{
    	$nm = $this->input->post('nm_promo');
        $desc = $this->input->post('desc');
        
        $image = Slim::getImages('foto');
		$foto1 =  $image[0]; //logo
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$file = Slim::saveFile($data1, $nama1,'./assets/images/promo');
		
		if ($file!=false) {
			$cek= $this->PromoModel->SaveData($nm,$desc,$file['name']);
			if ($cek) {
				$respon = array("msg" => "Tambah Data berhasil");
			}else {
				$respon = array("msg" => "Tambah Data Gagal");
			}
		} else {
			$respon = array("msg" => "Gagal mengupload Data");
		}
	
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Promo');
    }

	public function UpdateData() 
	{

		$id = $this->input->post('id');
		$nm = $this->input->post('nm_promo');
        $desc = $this->input->post('desc');
        
        $files= (array)$this->PromoModel->getDataById($id);
		
        unlink('assets/images/promo/'.$files['foto']);
        
        $image = Slim::getImages('foto');
		$foto1 =  $image[0]; //logo
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$file = Slim::saveFile($data1, $files['foto'],'./assets/images/promo');
		if($file!=false) {
			$cek = $this->PromoModel->UpdateData($id,$nm,$desc,$file['name']);
			if ($cek) {
				$respon = array("msg" => "Update Data berhasil");
			}else {
				$respon = array("msg" => "Update Data Gagal");
			}
		}else {
			$respon = array("msg" => "Gagal mengupload data");
		}
		
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url().'Promo');		
    }

	public function DeleteData($id) 
	{
		$files= (array)$this->PromoModel->getDataById($id);
	
		$result = $this->PromoModel->DeleteData($id);
		
		if($result){
			
			unlink('assets/images/promo/'.$files['foto']);
			
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Promo');		
    }



}
