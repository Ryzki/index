<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perumahan extends CI_Controller {
	public function __construct(){
		parent:: __construct();	
		$this->load->model('PerumahanModel');
		$this->load->library("MySlim");
	}

	public function index()
	{
	
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Perumahan')){

			$data['act_menu'] = 'Setup';
			$data['respon'] = null;
			$resp = $this->session->flashdata('respon');
			if($resp)
				$data['respon'] = $resp;
			
			$data['akses'] = $this->session->userdata('menu');

			$data['data_table'] = $this->PerumahanModel->getData();
			
			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('perumahan/perumahan_layout');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

    }
    
    public function AddPage()
	{
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Perumahan')){
			$data['data_table'] = null;
			$data['act_menu'] = 'Setup';
			$data['caption'] = 'Tambah';
			$data['akses'] = $this->session->userdata('menu');
            $data['action'] = 'SaveData';
            $data['data_lokasi'] = $this->PerumahanModel->getDataLokasi();

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('perumahan/perumahan_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Login/SignOut'));
		}

	}

	public function UploadFile($file,$name,$id){

        $config['upload_path']		= './uploads/progres/'.$id;
        $config['allowed_types']    = 'pdf';
        $config['file_name']        = $name;
        $config['overwrite']        = true;
        
		if (!is_dir('uploads/progres/'.$id)) {
		    mkdir('./uploads/progres/' .$id, 0777, TRUE);

		}
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($file)){
            return false;
        }else{
            return $this->upload->data('file_name'); ;
        }        
	}	

    public function SaveData()
	{
		$blok = $this->input->post('blok');
		$type = $this->input->post('type');
		$luas = $this->input->post('luas');
		$kamar = $this->input->post('kamar');
		$dapur = $this->input->post('dapur');
		$ruang_tamu = $this->input->post('ruang_tamu');
		$kamar_mandi = $this->input->post('kamar_mandi');
		$lantai = $this->input->post('lantai');
		$harga = str_replace(',','',$this->input->post('harga'));
		$dp = str_replace(',','',$this->input->post('dp'));
		$progres = $this->input->post('progres');
		$kodeLokasi = $this->input->post('kodeLokasi');
		$garasi = $this->input->post('garasi');
		$air = $this->input->post('air');
		$listrik = $this->input->post('listrik');

			$cek= $this->PerumahanModel->SaveData($blok,$type,$luas,$kamar,$dapur,$ruang_tamu,$kamar_mandi,$lantai,$harga,$progres,$kodeLokasi,'-',$garasi,$dp,$air,$listrik);
			if (!isset($cek)) {
							
			}
			else {
				
				$respon = array("msg" => "Tambah Data berhasil");
				
			}
		

		$this->session->set_flashdata('respon',$respon);
		redirect('Perumahan');

	}
    
    public function UpdateData()
	{
		$id = $this->input->post('id');
		$data['data_fotos'] = $this->PerumahanModel->getFotoById($id);
		
		$blok = $this->input->post('blok');
		$type = $this->input->post('type');
		$luas = $this->input->post('luas');
		$kamar = $this->input->post('kamar');
		$dapur = $this->input->post('dapur');
		$ruang_tamu = $this->input->post('ruang_tamu');
		$kamar_mandi = $this->input->post('kamar_mandi');
		$lantai = $this->input->post('lantai');
		$harga = str_replace(',','',$this->input->post('harga'));
		$dp = str_replace(',','',$this->input->post('dp'));
		$progres = $this->input->post('progres');
		$kodeLokasi = $this->input->post('kodeLokasi');
		$garasi = $this->input->post('garasi');
		$air = $this->input->post('air');
		$listrik = $this->input->post('listrik');

		
			$cek= $this->PerumahanModel->UpdateData($id,$blok,$type,$luas,$kamar,$dapur,$ruang_tamu,$kamar_mandi,$lantai,$harga,$progres,$kodeLokasi,'-',$garasi,$dp,$air,$listrik);
			if (!isset($cek)) {
							
			}
			else {
				
				$respon = array("msg" => "Update Data berhasil");
				
			}
		
		$this->session->set_flashdata('respon',$respon);
		redirect('Perumahan');
	}
	
	public function DeleteData($id)
	{
		$data['data_fotos'] = $this->PerumahanModel->getFotoById($id);
		
		//$file= (array)$this->PerumahanModel->getFileById($id);
		$result = $this->PerumahanModel->DeleteData($id);
		
		if($result){
			//unlink('assets/images/'.$file['file']);
			$datas = explode(',',$data['data_fotos']->foto);
			 //$i=0;
			foreach($datas as $word)
			{
				unlink('assets/images/rumah/'.$word);
				//$data['data_foto'][$i] = $word;
				//$i++;
			}
			$this->session->set_flashdata('respon',array("msg"=>"Delete data berhasil"));
		}else{
			$this->session->set_flashdata('respon',array("msg"=>"Delete data Gagal"));

		}
		redirect(base_url().'Perumahan');
	}
			
    public function EditPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Perumahan')){
			
			$data['data_table'] = (array)$this->PerumahanModel->getDataById($id);
			$data['data_fotos'] = $this->PerumahanModel->getFotoById($id);

			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateData';
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Setup';
			$data['data_lokasi'] = $this->PerumahanModel->getDataLokasi();

			$datas = explode(',',$data['data_fotos']->foto);
			 $i=0;
			foreach($datas as $word)
			{
				$data['data_foto'][$i] = $word;
				$i++;
			}

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('perumahan/perumahan_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}

	public function KoordinatPage($id)
	{

		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Perumahan')){
			$data['data_id'] = $id;
			$data['data_table'] = (array)$this->PerumahanModel->getDataById($id);
			//$data['koordinat'] = $this->crud->select('*', 'perumahan')->result();

			$data['koordinat'] = $this->PerumahanModel->getDataKoordinat();
			$data['caption'] = 'Edit';
			$data['action'] = 'UpdateKoordinat';
			$data['akses'] = $this->session->userdata('menu');
			$data['act_menu'] = 'Setup';
			$data['data_lokasi'] = $this->PerumahanModel->getDataLokasi();

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view('perumahan/koordinat_add');
			$this->load->view('footer_layout');
		}else{
			redirect(base_url('Logout'));
		}
		
	}


	public function UpdateKoordinat()
	{
		
		
		$id = $this->input->post('id');
		$blok = $this->input->post('blok');
		$x = $this->input->post('x');
		$y = $this->input->post('y');
	
		$cek= $this->PerumahanModel->UpdateKoordinat($id,$blok,$x,$y);
		if (!isset($cek)) {
						
		}
		else {
			
			$respon = array("msg" => "Koordinat berhasil di-update");
			$this->session->set_flashdata('respon',$respon);
			redirect('Perumahan');
		}
		
	}
	
	
}
