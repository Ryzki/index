<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model("DashModel");				
	}
	public function index()
	{
		
		$data['act_menu'] = 'Dashboard';
		$data['respon'] = null;	
		$data['akses'] = $this->session->userdata('menu');
		 $data['total_perumahan'] = (array)$this->DashModel->getTotalPerumahan();
		 $data['total_rumah'] = (array)$this->DashModel->getTotalRumah();
		 $data['tersedia'] = (array)$this->DashModel->getTotalTersedia();
		 $data['terjual'] = (array)$this->DashModel->getTotalTerjual();
		 
		 $data['data_lokasi'] = $this->DashModel->getLokasi(); 	
		 $data['data_bar'] = $this->DashModel->getBar(); 
		 $data['data_pie'] = $this->DashModel->getPie(); 	

		$this->load->view('header_layout',$data);
		$this->load->view('menu_layout');
		$this->load->view('dash_layout');
		$this->load->view('footer_layout');
	}

}
