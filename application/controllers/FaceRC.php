<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FaceRC extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->library('upload');
	}

	public function index()
	{
		$this->load->view('face_layout');

	}

	public function Recognition()
	{
		

	}	
}
