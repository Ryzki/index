<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model("LoginModel");				
	}
	public function index()
	{
		$data['respon'] = null;
		$resp = $this->session->flashdata('respon');
		if($resp)
			$data['respon'] = $resp;
		

		$this->load->view('login_layout',$data);
	}

	public function Auth()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$auth = $this->LoginModel->getUserData($user,$pass);
		if($auth!=FALSE){
			$respon = array("msg"=>"Login Berhasil.. ");

			$this->session->set_userdata("cuser",$auth['cuser']);
			$this->session->set_userdata("nama",$auth['nama']);
			$this->session->set_userdata("menu",$auth['akses']);

			$this->session->set_flashdata('respon',$respon);						
			redirect(base_url().'Dashboard');
			
		}else{
			$respon = array("msg" => "Login Gagal, Cek kembali username dan password anda..");
			$this->session->set_flashdata('respon',$respon);
			redirect(base_url().'Login');
		}
	}

	public function SignOut()
	{

		$this->session->unset_userdata("cuser");
		$this->session->unset_userdata("nama");
		$this->session->unset_userdata("nip");
		$this->session->unset_userdata("menu");					
		redirect(base_url().'Login');
			

	}

}
