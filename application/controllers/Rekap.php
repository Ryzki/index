<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('RekapModel');

	}

	public function index()
	{
		
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Rekap')){

			$data['act_menu'] = 'Laporan';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			$data['data_table'] = $this->RekapModel->getData();
			$data['akses'] = $this->session->userdata('menu');
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('laporan/laporan_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }
    public function filterData()
    {
       if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Rekap')){
        $tgl = $this->input->post('bulan').'-01';
		$bln = date('m',strtotime($tgl));
		$thn = date('Y',strtotime($tgl));
		$data['act_menu'] = 'Laporan';
        $data['respon'] = null;
        $resp = $this->session->flashdata('respon');
        if($resp)
            $data['respon'] = $resp;
        $data['data_table'] = $this->RekapModel->getDataByMonth($bln, $thn);
        $data['akses'] = $this->session->userdata('menu');
        $this->load->view('header_layout',$data);
        $this->load->view('menu_layout');
        $this->load->view('laporan/laporan_layout');
        $this->load->view('footer_layout');
    }else{
        redirect(base_url('Login/SignOut'));
    }
    }



}
