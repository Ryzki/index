<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('LokasiModel');
		$this->load->library("MySlim");

	}

	public function index()
	{
	
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Lokasi')){

			$data['act_menu'] = 'Setup';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');

			$data['data_table'] = $this->LokasiModel->getData();
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('lokasi/lokasi_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }
    
    public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Lokasi')){
			$data['data_table'] = null;
			$data['act_menu'] = 'Setup';
			$data['caption'] = 'Tambah';
			$data['akses'] = $this->session->userdata('menu');
			$data['action'] = 'SaveData';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('lokasi/lokasi_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}
		
    public function SaveData()
	{
		$ket = $this->input->post('ket');
		$alamat = $this->input->post('alamat');
		$kab = $this->input->post('kabKota');
		$provinsi = $this->input->post('provinsi');
		$deskripsi = $this->input->post('des');

		$image = Slim::getImages('foto');
		$foto1 =  $image[0]; //brosur
		$foto2 =  $image[1]; //denah
		$foto3 =  $image[2]; //masterplan
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$nama2 = $foto2['input']['name'];
		$data2 = $foto2['output']['data'];

		$nama3 = $foto3['input']['name'];
		$data3 = $foto3['output']['data'];

		$file = Slim::saveFile($data1, $nama1,'./assets/images/lokasi');
		$file2 = Slim::saveFile($data2, $nama2,'./assets/images/lokasi');
		$file3 = Slim::saveFile($data3, $nama3,'./assets/images/lokasi');
		
		//$namaFoto = $file['name'].",".$file2['name'].",".$file3['name'];

		if ($file!=false && $file2!=false && $file3!=false) {
			$cek= $this->LokasiModel->saveData($ket,$alamat,$kab,$provinsi,$file['name'],$file2['name'],$file3['name'],$deskripsi);
				if (!isset($cek)) {
					
				}
				else {
					$respon = array("msg" => "Tambah Data berhasil");
					
				}
		} else {
			$respon = array("msg" => "Gagal upload gambar");
		}

		$this->session->set_flashdata('respon',$respon);
		redirect('Lokasi');
		
		
	}
    
    public function UpdateData()
	{
		$id = $this->input->post('id');
		$ket = $this->input->post('ket');
		$alamat = $this->input->post('alamat');
		$kab = $this->input->post('kabKota');
		$provinsi = $this->input->post('provinsi');
		$deskripsi = $this->input->post('des');
		$brosure_old = $this->input->post('brosure_old');
		$denah_old = $this->input->post('denah_old');
		$file_old = $this->input->post('file_old');

		$files= (array)$this->LokasiModel->getFileById($id);
		
		unlink('assets/images/lokasi/'.$files['file']);
		unlink('assets/images/lokasi/'.$files['denah']);
		unlink('assets/images/lokasi/'.$files['brosur']);
		
		$image = Slim::getImages('foto');
		$foto1 =  $image[0]; //brosur
		$foto2 =  $image[1]; //denah
		$foto3 =  $image[2]; //masterplan
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$nama2 = $foto2['input']['name'];
		$data2 = $foto2['output']['data'];

		$nama3 = $foto3['input']['name'];
		$data3 = $foto3['output']['data'];

		$file = Slim::saveFile($data1, $brosure_old,'./assets/images/lokasi');
		$file2 = Slim::saveFile($data2, $denah_old,'./assets/images/lokasi');
		$file3 = Slim::saveFile($data3, $file_old,'./assets/images/lokasi');

		if ($file!=false && $file2!=false && $file3!=false) {
			$cek= $this->LokasiModel->UpdateData($id,$ket,$alamat,$kab,$provinsi,$file['name'],$file2['name'],$file3['name'],$deskripsi);
			if (!isset($cek)) {
							
			}
			else {
				$respon = array("msg" => "Update Data berhasil");

			}
		} else {
			$respon = array("msg" => "Gagal upload data");
		}
		$this->session->set_flashdata('respon',$respon);
		redirect('Lokasi');
		
		
	}
	
	public function DeleteData($id)
	{
		$files= (array)$this->LokasiModel->getFileById($id);
		//$file= (array)$this->LokasiModel->getFileById($id);
		$result = $this->LokasiModel->DeleteData($id);
		

		if($result){
			//unlink('assets/images/'.$file['file']);
			unlink('assets/images/lokasi/'.$files['file']);
			unlink('assets/images/lokasi/'.$files['denah']);
			unlink('assets/images/lokasi/'.$files['brosur']);
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Lokasi');
	}
			
    public function EditPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Lokasi')){
			$data['data_table'] = (array)$this->LokasiModel->getDataById($id);
		
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Setup';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('lokasi/lokasi_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}
	
	
}
