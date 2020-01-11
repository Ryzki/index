<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirimpesan extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("KirimpesanModel");		
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Kirimpesan')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;
	
			$data['data_pegawai'] = $this->KirimpesanModel->getDataPegawai();

			$data['akses'] = $this->session->userdata('menu');
            $data['caption'] = 'Tambah';
			$data['action'] = 'SaveData';
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('pesan/pesan_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}
	public function fcm($client,$msg)
	{
		$notif = array('to'=>$client,'data'=>array("message"=>$msg,"title"=>"Pesan"));
		
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
	function SaveData(){
		// $client = array();
		foreach ($_REQUEST['pegawai'] as $selectedOption){
			if($selectedOption == 'semua'){
				$aa = $this->KirimpesanModel->getDataToken(); 
				$data = $this->KirimpesanModel->getDataPegawai();
				foreach($aa as $c){
					$this->fcm($c['token'], $this->input->post('pesan'));
					
				}
				// $this->KirimpesanModel->savePesan($data,$this->input->post('pesan'));
				foreach($data as $dt){
					$this->KirimpesanModel->savePesan($dt['nip'], $this->input->post('pesan'));
				}
			}else{
				$this->KirimpesanModel->savePesan($selectedOption, $this->input->post('pesan'));
				$tokenbynip = $this->KirimpesanModel->getTokenByNIP($selectedOption);
				foreach($tokenbynip as $token){
					// $client[] =  $token['token'];
					$this->fcm($token['token'],$this->input->post('pesan'));
				}
				
			}
		}
		
		redirect(base_url('Dashboard'));

	}

	




}
