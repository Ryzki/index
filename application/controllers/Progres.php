<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progres extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('PerumahanModel');
		$this->load->library("MySlim");
	}

	public function index()
	{
	
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Progres')){

			$data['act_menu'] = 'Produksi';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');

			$data['data_table'] = $this->PerumahanModel->getData();
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('progres/perumahan_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }

	public function ProgresPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Progres')){
			$data['data_id'] = $id;
			$data['data_table'] =$this->PerumahanModel->getDataProgresById($id);
			$data['data_min'] = (array)$this->PerumahanModel->getProgresMinimal($id);
			$data['data_progres'] = null;
            $data['akses'] = $this->session->userdata('menu');
            $data['data_max'] = (array)$this->PerumahanModel->getProgresMax($id);
			$data['act_menu'] = 'Produksi';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('progres/progres_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}

	public function CariProgres($id)
	{
		$id = $id;
		$prog = $this->input->post('progres');

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Progres')){
			
            $data['data_table'] =$this->PerumahanModel->getDataProgresById($id);
            $data['data_max'] = (array)$this->PerumahanModel->getProgresMax($id);
			$data['data_min'] = (array)$this->PerumahanModel->getProgresByIdAndProgress($id,$prog);
			$data['data_progres'] = (array)$this->PerumahanModel->getProgresByIdAndProgress($id,$prog);
			$data['data_id'] = $id;
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Produksi';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('progres/progres_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}

	public function AddProgress($id)
	{
		
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Progres')){

			$cek = $this->PerumahanModel->getProgresMax($id);
			if (!empty($cek)) {
				$data['data_table'] = (array)$this->PerumahanModel->getProgresMax($id);
			} else {
				$data['data_table'] = null;
			}
			
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Produksi';
			$data['data_id'] = $id;
			$data['action'] = 'SaveProgres';
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('progres/progres_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}

	public function SaveDataProgress()
	{
		$id = $this->input->post('id');
		$progres = $this->input->post('progres');
	
		$image = Slim::getImages('foto');
		$foto1 =  $image[0];
		$foto2 =  $image[1];
		$foto3 =  $image[2];
		
		$nama1 = $foto1['input']['name'];
		$data1 = $foto1['output']['data'];

		$nama2 = $foto2['input']['name'];
		$data2 = $foto2['output']['data'];

		$nama3 = $foto3['input']['name'];
		$data3 = $foto3['output']['data'];

	
		$file = Slim::saveFile($data1, $nama1,'./assets/images/rumah/progres');
		$file2 = Slim::saveFile($data2, $nama2,'./assets/images/rumah/progres');
		$file3 = Slim::saveFile($data3, $nama3,'./assets/images/rumah/progres');
		
		if ($file!=false && $file2!=false && $file3!=false) {
			$cek= $this->PerumahanModel->SaveDataProgress($id,$progres,$file['name'],$file2['name'],$file3['name']);
			$cek= $this->PerumahanModel->UpdateDataProgresPerumahan($id,$progres);
			if (!isset($cek)) {
							
			}
			else {
				
				$respon = array("msg" => "Tambah Data berhasil");
				
			}
		}else{
			$respon = array("msg" => "Gagal mengupload Gambar");
		}

		$this->session->set_flashdata('respon',$respon);
		redirect('Progres');

	}

	
	
}
