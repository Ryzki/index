<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HarianSales extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
        $this->load->model('HarianSalesModel');

	}

	public function index()
	{
		
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'HarianSales')){

			$data['act_menu'] = 'Laporan';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
                $data['respon'] = $resp;
            $data['dtglfilter'] = null;
            $data['dtglfilter'] = null;
            $data['nmfilter'] = null;
            $data['nmcetak'] = 'Semua';
            // $data['data_table'] = $this->HarianSalesModel->getData(date('Y-m-d'));
            // $data['data_pegawai'] = $this->HarianSalesModel->getDataRumah();
            $data['data_konsumen'] = $this->HarianSalesModel->getData();
            $data['data_pegawai'] = $this->HarianSalesModel->getDataPegawai();
            $data['cek'] = null;

			$data['akses'] = $this->session->userdata('menu');
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('laporanrumah/laporanhariansales_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }
    public function filterData()
    {
       if($this->cekmenu->user_menu($this->session->userdata('cuser'),'HarianSales')){
            $dtgl = $this->input->post('tgl');
         
            $nm = $this->input->post('pegawai');
            $data['act_menu'] = 'Laporan';
            $data['respon'] = null;
            $resp = $this->session->flashdata('respon');
            if($resp)
                $data['respon'] = $resp;
            $data['nmfilter'] = $nm;
            $data['dtglfilter'] = $dtgl;
           

            //$data['data_rumah'] = $this->HarianSalesModel->getData();
            $data['cek'] = $nm;
            $data['data_konsumen'] = $this->HarianSalesModel->getDataByDateORRumah($dtgl,$nm);
            $data['data_pegawai'] = $this->HarianSalesModel->getDataPegawai();
            if ($nm=='semua') {
                $data['nmcetak'] = 'SEMUA';
            }else {
                $data['data_pegawaibyid'] = (array)$this->HarianSalesModel->getDataPegawaiByID($nm);
                $data['nmcetak'] = $data['data_pegawaibyid'][0]['nama'];
            }
            

            
            $data['akses'] = $this->session->userdata('menu');
            $this->load->view('header_layout',$data);
            $this->load->view('menu_layout');
            $this->load->view('laporanrumah/laporanhariansales_layout');
            $this->load->view('footer_layout');
        }else{
            redirect(base_url('Login/SignOut'));
        }
    }

    public function cetak()
    {
        if($this->cekmenu->user_menu($this->session->userdata('cuser'),'HarianSales')){

			$data['act_menu'] = 'Laporan';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
                $data['respon'] = $resp;
            $data['dtglfilter'] = null;
            $data['dtglfilter'] = null;
            $data['nmfilter'] = null;
            $data['nmcetak'] = 'Semua';
            
            // $data['data_table'] = $this->HarianSalesModel->getData(date('Y-m-d'));
            // $data['data_pegawai'] = $this->HarianSalesModel->getDataRumah();
            $data['data_konsumen'] = $this->HarianSalesModel->getData();
            $data['data_pegawai'] = $this->HarianSalesModel->getDataPegawai();
            
            $data['cek'] = null;

			$data['akses'] = $this->session->userdata('menu');
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('laporanrumah/harian');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
            
       
    }



}
