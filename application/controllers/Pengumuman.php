<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('PengumumanModel');

	}

	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pengumuman')){

			$data['act_menu'] = 'Aplikasi';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');

			$data['data_table'] = $this->PengumumanModel->getData();
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pengumuman/pengumuman_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}
	public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pengumuman')){
			$data['data_table'] = null;
			$data['act_menu'] = 'Aplikasi';
			$data['caption'] = 'Tambah';
			$data['akses'] = $this->session->userdata('menu');
			$data['action'] = 'SaveData';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pengumuman/pengumuman_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}

	public function EditPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Pengumuman')){
			$data['data_table'] = (array)$this->PengumumanModel->getDataById($id);		
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Aplikasi';

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pengumuman/pengumuman_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
		
	}
	public function SaveData()
	{
		$ket = $this->input->post('ket');

		$result = $this->PengumumanModel->SaveData($ket);
		if($result){			

			$this->session->set_flashdata('respon',array("msg"=>"Tambah data berhasil"));
			$this->SendNotifToAll($ket);
		}else{

			$this->session->set_flashdata('respon',array("msg"=>"Tambah data gagal"));
					
		}
		redirect(base_url().'Pengumuman');	
	}

	public function UpdateData()
	{
		$id = $this->input->post('id');
		$ket = $this->input->post('ket');

		$result = $this->PengumumanModel->UpdateData($id,$ket);
		if($result){
			$this->session->set_flashdata('respon',array("msg"=>"Edit data berhasil"));
			$this->SendNotifToAll($ket);
		}else{

			$this->session->set_flashdata('respon',array("msg"=>"Edit data Gagal"));

		}
		redirect(base_url().'Pengumuman');
	}
	
	public function DeleteData($id)
	{


		$result = $this->PengumumanModel->DeleteData($id);
		if($result){
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Pengumuman');
	}

	function SendNotifToAll($msg){
		//header('Content-Type: application/json');
		//header('Authorization: key=AAAAKxAq95g:APA91bFA3IaqKb2owA09Xa7GRr-kgQomH9ezw3teoymbb_LlXK8Fd-FcnqDx8YACoMrlWIOn5OsmBqKs2-ww4Q8DWm5yD0uvGwME2FCOiUB7W32Mbqfblk7zeKwCUKQ4ZhxFd5iByAAB');

		$client = $this->PengumumanModel->getDataToken();

		$notif = array('registration_ids'=>$client,'data'=>array("message"=>$msg,"title"=>"Pengumuman"));
		
		$json =  json_encode($notif);	
		$url = "https://fcm.googleapis.com/fcm/send";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: key=AAAAKxAq95g:APA91bFA3IaqKb2owA09Xa7GRr-kgQomH9ezw3teoymbb_LlXK8Fd-FcnqDx8YACoMrlWIOn5OsmBqKs2-ww4Q8DWm5yD0uvGwME2FCOiUB7W32Mbqfblk7zeKwCUKQ4ZhxFd5iByAAB'));

		curl_exec($ch);

		curl_close($ch);


	}

}

