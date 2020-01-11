<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HarianUser extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
        $this->load->model('HarianSalesModel');

	}

	public function index()
	{
		
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'HarianUser')){

			$data['act_menu'] = 'Laporan';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
                $data['respon'] = $resp;
            $data['dtglfilter'] = null;
            $data['dtglfilter'] = null;
            $data['nmfilter'] = null;
            $data['nmcetak'] = 'Semua';
            // $data['data_table'] = $this->HarianUserModel->getData(date('Y-m-d'));
            // $data['data_pegawai'] = $this->HarianUserModel->getDataRumah();
            $data['data_konsumen'] = $this->HarianSalesModel->getDatabyUser($this->session->userdata('cuser'));
            $data['data_pegawai'] = $this->HarianSalesModel->getDataPegawai();
            $data['cek'] = null;

			$data['akses'] = $this->session->userdata('menu');
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('laporanrumah/laporanharianuser_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }

    public function filterData()
    {
       if($this->cekmenu->user_menu($this->session->userdata('cuser'),'HarianUser')){
            $dtgl = $this->input->post('tgl');

            $data['act_menu'] = 'Laporan';
            $data['respon'] = null;
            $resp = $this->session->flashdata('respon');
            if($resp)
                $data['respon'] = $resp;
            $data['dtglfilter'] = $dtgl;
            $data['data_konsumen'] = $this->HarianSalesModel->getDatabyUserTgl($this->session->userdata('cuser'),$dtgl);
            
            $data['akses'] = $this->session->userdata('menu');
            $this->load->view('header_layout',$data);
            $this->load->view('menu_layout');
            $this->load->view('laporanrumah/laporanharianuser_layout');
            $this->load->view('footer_layout');
        }else{
            redirect(base_url('Login/SignOut'));
        }
    }



}
