<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model("IzinModel");	
		$this->load->library('upload');  	
			
	}
	public function index()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Izin')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['data_table'] = $this->IzinModel->getDataIzinPegawai();

			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('izin/izin_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}

	public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Izin')){
			$data['act_menu'] = 'Aplikasi';

			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');

			if($resp)
				$data['respon'] = $resp;

			$data['action'] = "SaveData";
			$data['caption'] = "Tambah";		
			$data['data_table'] = null;
			$data['data_pegawai'] = $this->IzinModel->getDataPegawai();
			$data['data_izin'] = $this->IzinModel->getDataJenisIzin();


			$data['akses'] = $this->session->userdata('menu');

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('izin/izin_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}

    public function SaveData() {
	
		$id = $this->input->post('id');
		$nip = $this->input->post('pegawai');
		$jns = $this->input->post('jenis');
		$tgl_m = $this->input->post('tgl_mulai');
		$tgl_s = $this->input->post('tgl_selesai');
		$stat = $this->input->post('status');
		$ket = $this->input->post('ket');

		$upload = $this->UploadFile('userFile','Absen_'.$jns.'_'.date('dmYHis'));		
		if($upload != false){
			$cek= $this->IzinModel->SaveData($nip,$jns,$tgl_m,$tgl_s,$stat,$ket,$upload);
			if ($cek) {
				$respon = array("msg" => "Proses Simpan Berhasil..");
				$this->SendNotifTo($nip,"Izin anda sudah masuk");
			}else {
				$respon = array("msg" => "Proses Gagal..");
			}
		}else{
			$respon = array("msg" => "Proses Upload Gagal..");
		}
		$this->session->set_flashdata('respon',$respon);
		redirect(base_url('Izin'));
    }

    public function UpdateData() {
	
		$id = $this->input->post('id');
		$stat = $this->input->post('stat');
		
		$cek= $this->IzinModel->UpdateData($id,$stat);
		if ($cek) {
			
			$respon = ($stat=='1'?array("msg" => "Permohonan Izin Diterima"):array("msg" => "Permohonan Izin Ditolak"));
			$this->SendNotifTo($id,$respon["msg"]);
			
		}else {
			$respon = array("msg" => "Proses Gagal..");
		}
		$this->session->set_flashdata('respon',$respon);
		echo json_encode($respon);	
    }

	public function DeleteData($id)
	{

		$result = $this->IzinModel->DeleteData($id);
		if($result){
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Izin');
	}

	public function UploadFile($file,$name){

        $config['upload_path']		= './uploads/';
        $config['allowed_types']    = 'pdf|jpg|jpeg';
        $config['file_name']        = $name;
        $config['overwrite']        = true;
        

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($file)){
            return false;
        }else{
            return $this->upload->data('file_name'); ;
        }        
	}

	function SendNotifTo($id,$msg){
		$client = $this->IzinModel->getDataTokenById($id);

		$notif = array('to'=>$client,'data'=>array("message"=>$msg,"title"=>"Izin Pegawai"));
		
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
