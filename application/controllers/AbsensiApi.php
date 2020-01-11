<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class AbsensiApi extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('ApiModel', 'api');
        $this->load->library('upload');	

    }
 
     public function doLogin_post()
     { 
          $data = $this->api->doLogin($this->post('user_app'),$this->post('pass_app'),$this->post('imei'));
          $this->response($data);
     }

	public function getKonfigurasi_get()
     { 
        $data = $this->api->getKonfigurasi();
          $this->response($data);

     }

	function getKonfigurasiShift_post()
    {
      $data=$this->api->getKonfigurasiShift($this->post('nip'));
      $this->response($data);
    }



	public function getPengumuman_get()
     { 
        $data = $this->api->getPengumuman();
          $this->response($data);

     }

	public function saveTimeline_post()
     { 
          $data = $this->api->saveTimeline($this->post('nip'),$this->post('ket_status'),$this->post('location'));
          $this->response(array('message' => 'Timeline berhasil di upload',));
     }

	function izin_post()
    {
      $data=$this->api->getIzin($this->post('nip'));
      $this->response($data);
    }

	function inbox_post()
    {
      $data=$this->api->getInbox($this->post('nip'));
      $this->response($data);
    }

	function getInboxCount_post()
    {
      $data=$this->api->getInboxCount($this->post('nip'));
      $this->response($data);
    }



	function izinNotif_post()
    {
      $data=$this->api->getIzinNotif($this->post('nip'));
      $this->response($data);
    }


	public function updateLoc_post()
     { 
          $data = $this->api->updateLoc($this->post('nip'),$this->post('location'));
          $this->response(array('message' => 'Lokasi berhasil di update',));
     }

	public function getAbsenToday_post()
     { 
          $data = $this->api->getAbsenToday($this->post('nip'));
		if ($data) {
			 $this->response($data);
		} else {
			$this->response(array('tgl_absen' => null));
		}
	 	          
     }

     public function getAbsenKeluarToday_post()
     { 
          $data = $this->api->getAbsenKeluarToday($this->post('nip'));
		if ($data) {
			 $this->response($data);
		} else {
			$this->response(array('tgl_pulang' => null));
		}
	 	          
     }


	public function insertLogLoc_post()
     { 
          $data = $this->api->insertLogLokasi($this->post('nip'),$this->post('location'));
          $this->response(array('message' => 'Lokasi berhasil di update',));
     }

	public function updateInbox_post()
     { 
          $data = $this->api->updateInbox($this->post('nip'));
          $this->response(array('message' => 'Inbox berhasil di update',));
     }


	public function updateToken_post()
     { 
          $data = $this->api->updateToken($this->post('nip'),$this->post('token'));
          $this->response(array('message' => 'Token Added',));
     }


	public function updateIzin_post()
     { 
          $data = $this->api->updateIzin($this->post('nip'));
          $this->response(array('message' => 'Lokasi berhasil di update',));
     }



	public function getTimeline_get()
     { 
        $data = $this->api->getTimeline();
          $this->response($data);

     }

     public function getJenisAbsen_get(){
	$data = $this->api->getJenisAbsen();
          $this->response($data);
    }
    public function saveIzinAbsensi_post(){
	$mulai = strtotime($this->post('tgl_mulai'));
 	$mulai = date('Y-m-d',$mulai);	

	$selesai = strtotime($this->post('tgl_selesai'));
 	$selesai= date('Y-m-d',$selesai);	


	$data = $this->api->saveIzinAbsensi($this->post('nip'),$this->post('ket_absen'),$this->post('keterangan'),$mulai,$selesai,$this->post('foto'));
    	$this->response(array('message' => 'Izin berhasil di upload',));
    }
    
    public function uploadImage_post()
     { 
    
        $target_dir = "././uploads/";
        $target_file_name = $target_dir .basename($_FILES["file"]["name"]);
        $response = array();
        // Check if image file is a actual image or fake image
        if (isset($_FILES["file"])){
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)){
                $success = true;
                $message = "Successfully Uploaded";
            }else{
                $success = false;
                $message = "Error while uploading";
            }
        }else{
            $success = false;
            $message = "Required Field Missing";
        } 
        $response["success"] = $success;
        $response["message"] = $message;
        echo json_encode($response);
            
     }
   public function saveAbsensiWajah_post(){

	$data = $this->api->saveAbsensiWajah($this->post('nip'),$this->post('location'));
    	$this->response(array('message' => 'absen wajah berhasil di upload',));
    }
    public function getIAS_post(){
     $data = $this->api->getIAS($this->post('nip'));
     $this->response($data);
      }

    public function setHit_post(){
     $data = $this->api->setHit();
     $this->response(array('message' => $data));
    }

    public function getHit_get(){
     	$data = $this->api->getHit();
     	$this->response($data);
    }

 public function savefaceid_post()
     {
          $save = $this->api->savefaceid($this->post('nip'),$this->post('faceid'));
          if($save){
               $this->response(array('message' => 'face id saved'));
          }else{
               $this->response(array('message' => 'face id not saved'));
          }
     }
     public function getfaceid_post()
     {
          $data = $this->api->getfaceid($this->post('nip'));
          if($data){
               $this->response($data);
          }else{
               $this->response(array('face_id' => null));
          }
     }

  public function saveAbsensiWajahKeluar_post()
     {
          $save = $this->api->saveAbsensiWajahkeluar($this->post('nip'));
          if($save){
               $this->response(array('message' => 'absen berhasil'));
          }else{
               $this->response(array('message' => 'absen tak berhasil'));
          }
     }



 }
