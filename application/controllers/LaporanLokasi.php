<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanLokasi extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('LaporanLokasiModel');

	}

	public function index()
	{
		

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'LaporanLokasi')){

			$data['act_menu'] = 'Laporan';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
                $data['respon'] = $resp;
            $data['dtglfilter'] = null;
            $data['dtglfilter'] = null;
            $data['nmfilter'] = null;
            $data['data_table'] = $this->LaporanLokasiModel->getData(date('Y-m-d'));
            $data['data_pegawai'] = $this->LaporanLokasiModel->getDataPegawai();
			$data['akses'] = $this->session->userdata('menu');
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('laporan/laporanlokasi_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }
    public function filterData()
    {
       if($this->cekmenu->user_menu($this->session->userdata('cuser'),'LaporanLokasi')){
            $dtgl = $this->input->post('dtglfilter');
            $stgl = $this->input->post('stglfilter');
            $nm = $this->input->post('pegawai');
            $data['act_menu'] = 'Laporan';
            $data['respon'] = null;
            $resp = $this->session->flashdata('respon');
            if($resp)
                $data['respon'] = $resp;
            $data['nmfilter'] = $nm;
            $data['dtglfilter'] = $dtgl;
            $data['stglfilter'] = $stgl;

            $data['data_pegawai'] = $this->LaporanLokasiModel->getDataPegawai();

            $data['data_table'] = $this->LaporanLokasiModel->getDataByDateORPegawai($dtgl,$stgl, $nm);
            
            $data['akses'] = $this->session->userdata('menu');
            $this->load->view('header_layout',$data);
            $this->load->view('menu_layout');
            $this->load->view('laporan/laporanlokasi_layout');
            $this->load->view('footer_layout');
        }else{
            redirect(base_url('Login/SignOut'));
        }
    }

}
