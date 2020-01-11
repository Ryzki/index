<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('TransaksiModel');
		$this->load->library("MySlim");	
	}

	public function index()
	{
	
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Transaksi')){

			$data['act_menu'] = 'Aplikasi';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');

			$data['data_table'] = $this->TransaksiModel->getDataTransaksi();
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('transaksi/transaksi_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }
    
    public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Transaksi')){
			$data['data_table'] = null;
			$data['act_menu'] = 'Aplikasi';
			$data['caption'] = 'Tambah';
			$data['akses'] = $this->session->userdata('menu');
            $data['action'] = 'SaveData';
            $data['data_lokasi'] = $this->TransaksiModel->getData();

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('transaksi/transaksi_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}

	public function EditPageDetail($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Transaksi')){
			$data['data_table'] = (array)$this->TransaksiModel->getDataDetailById($id);
			$data['transaksi'] = (array)$this->TransaksiModel->getDataById($id);
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateDataDetail';
			$data['akses'] = $this->session->userdata('menu');
            $data['act_menu'] = 'Aplikasi';
			$data['data_lokasi'] = $this->TransaksiModel->getData();
			
			if ($data['data_table']!=null) {
				$this->load->view('header_layout',$data);
				$this->load->view('menu_layout');
				$this->load->view('transaksi/transaksidetail');
				$this->load->view('footer_layout');
			}else {
				$respon = array("msg" => "Detail Transaksi tidak ada!");
				$this->session->set_flashdata('respon',$respon);
				redirect('Transaksi');
			}

			
		}else{
			redirect(base_url('Logout'));
		}
		
	}
		
    public function SaveData()
	{
		

		$kode = $this->input->post('kodeTRansaksi');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$kodeLokasi = $this->input->post('kodeLokasi');
		
		$cek= $this->TransaksiModel->SaveData($kode,$nik,$nama,$alamat,$pekerjaan,$kodeLokasi);
		if (!isset($cek)) {
						
		}
		else {
			$respon = array("msg" => "Tambah Data berhasil");
			$this->session->set_flashdata('respon',$respon);
			redirect('Transaksi');
		}

	}
    
    public function UpdateData()
	{
        $kode = $this->input->post('kodeTransaksi');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$kodeLokasi = $this->input->post('kodeLokasi');
		
		$cek= $this->TransaksiModel->UpdateData($kode,$nik,$nama,$alamat,$pekerjaan,$kodeLokasi);
		if (!isset($cek)) {
						
		}
		else {
			$respon = array("msg" => "Tambah Data berhasil");
			$this->session->set_flashdata('respon',$respon);
			redirect('Transaksi');
		}

		
	}

	public function UpdateDataDetail()
	{
        $kode = $this->input->post('kodeTransaksi');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$tempat = $this->input->post('tmpt_lahir');
		$tgl = $this->input->post('tanggal_lahir');
		$status = $this->input->post('status');
		$ktp = $this->input->post('ktp');
		$npwp = $this->input->post('npwp');
		$tlp = $this->input->post('telpon');
		$hp = $this->input->post('handphone');
		$email = $this->input->post('email');

		$files= (array)$this->TransaksiModel->getDataDetailById($kode);

		if (isset($files['fktp'])){
			unlink('assets/images/transaksi/'.$files['fktp']);
			unlink('assets/images/transaksi/'.$files['fnpwp']);
		}
		
		$image = Slim::getImages('foto');
		$foto1 =  $image[0]; //ktp
		$foto2 =  $image[1]; //npwp
		
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$nama2 = $foto2['input']['name'];
		$data2 = $foto2['output']['data'];

		$file = Slim::saveFile($data1, $nama1,'./assets/images/transaksi');
		$file2 = Slim::saveFile($data2, $nama2,'./assets/images/transaksi');

		$cek= $this->TransaksiModel->UpdateDataDetail($kode,$nama,$alamat,$pekerjaan,$tempat,$tgl,$status,$ktp,$npwp,$tlp,$hp,$email,$file['name'],$file2['name']);
		if (!isset($cek)) {
						
		}
		else {
			$respon = array("msg" => "Tambah Data berhasil");
			$this->session->set_flashdata('respon',$respon);
			redirect('Transaksi');
		}

		
	}
	
	public function DeleteData($id)
	{

		
		$result = $this->TransaksiModel->DeleteData($id);
		
		if($result){
			unlink('assets/images/'.$file['file']);
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Transaksi');
	}
			
    public function EditPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Transaksi')){
			$data['data_table'] = (array)$this->TransaksiModel->getDataById($id);
		
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
			$data['akses'] = $this->session->userdata('menu');
            $data['act_menu'] = 'Aplikasi';
            $data['data_lokasi'] = $this->TransaksiModel->getData();

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('transaksi/transaksi_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}
	
	
}
