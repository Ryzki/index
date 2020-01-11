<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('VerifikasiModel');
		$this->load->library("MySlim");	
	}

	public function index()
	{
	
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Verifikasi')){

			$data['act_menu'] = 'Aplikasi';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');

			$data['data_table'] = $this->VerifikasiModel->getDataVerifikasi();
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('verifikasi/verifikasi_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }
    
  


    
    
    public function TambahData()
	{
        $kode = $this->input->post('kodeTransaksi');
		$jumlah_tf = str_replace(',','',$this->input->post('jumlah_tf'));
		$tgl = $this->input->post('tanggal_tf');
		$no_rek = $this->input->post('no_rek');
        $user = $this->session->userdata('nama');
		$cek= $this->VerifikasiModel->UpdateData($kode,$jumlah_tf,$tgl,$no_rek,$user);
		if (!isset($cek)) {
						
		}
		else {
			$respon = array("msg" => "Tambah Data berhasil");
			$this->session->set_flashdata('respon',$respon);
			redirect('Verifikasi');
		}

		
	}

			
    public function EditPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Verifikasi')){
			$data['data_table'] = (array)$this->VerifikasiModel->getDataById($id);
		
			$data['caption'] = 'Edit';
			$data['action'] = 'TambahData';
			$data['akses'] = $this->session->userdata('menu');
            $data['act_menu'] = 'Aplikasi';
            

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('verifikasi/verifikasi_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}
	
	
}
