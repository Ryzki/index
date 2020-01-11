<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ApiModel', 'api');
    }

    public function getAllDataPerumahan_get()
    {
        $data = $this->api->getAllDataPerumahan();
        $this->response(['data' => $data]);
    }

    public function getDataUser_post()
    {
        $username = $this->post('username');
        $pass = $this->post('password');
        $data = $this->api->getDataUser($username, $pass);
        $this->response($data, 200);
    }

 	public function getDataAllUser_get()
    {
        $data = $this->api->getDataAllUser();
        $this->response($data, 200);
    }


    public function updatedatauser_post()
    {
        $iduser = $this->post('id_user');
        $nama = $this->post('nama');
        $username = $this->post('username');

        $isupdated = $this->api->updateDataUser($nama, $username, $iduser);
        if ($isupdated) {
            $this->response(['status' => 'update berhasil', 'updated' => true, 'is_profile'=>true]);
        } else {
            $this->response(['status' => 'update gagal', 'updated' => false]);
        }
    }
    public function updatepassworduser_post()
    {
        $iduser = $this->post('id_user');
        $passwordbaru = $this->post('password_baru');
        $passwordlama = $this->post('password_lama');
        $isupdated = $this->api->updatePasswordUser($passwordlama,$passwordbaru, $iduser);
        if ($isupdated) {
            $this->response(['status' => 'password berhasil diupdate', 'updated' => true, 'is_profile'=>false]);
        } else {
            $this->response(['status' => 'password gagal diupdate', 'updated' => false]);
        }
    }



    public function getDataPelanggan_post()
    {
        $email = $this->post('email');
        $pass = $this->post('password');
        $data = $this->api->getDataPelanggan($email, $pass);
        $this->response($data, 200);
    }

    public function getDataLokasi_get()
    {
        $data = $this->api->getDataLokasi();
        $this->response(['lokasi' => $data]);
    }


    public function getPerumahanByLokasi_post()
    {
        $idlokasi = $this->post('idlokasi');
        $data = $this->api->getPerumahanByLokasi($idlokasi);
        $this->response(['data' => $data]);
    }


    public function registerpelanggan_post()
    {
        $nama = $this->post('nama');
        $alamat = $this->post('alamat');
        $email = $this->post('email');
        $telpon = $this->post('telpon');
        $password = $this->post('password');

        $isregistered = $this->api->registerpelanggan($nama, $alamat, $email, $telpon, $password);
        if ($isregistered) {
            $this->response(['status' => 'registrasi berhasil', 'registered' => true]);
        } else {
            $this->response(['status' => 'registrasi gagal', 'registered' => false]);
        }
    }
    public function updatedatapelanggan_post()
    {
        $idpelanggan = $this->post('id_pelanggan');
        $nama = $this->post('nama');
        $alamat = $this->post('alamat');
        $email = $this->post('email');
        $telpon = $this->post('telpon');

        $isupdated = $this->api->updatedatapelanggan($nama, $alamat, $email, $telpon, $idpelanggan);
        if ($isupdated) {
            $this->response(['status' => 'update berhasil', 'updated' => true, 'is_profile'=>true]);
        } else {
            $this->response(['status' => 'update gagal', 'updated' => false]);
        }
    }
    public function updatePasswordPelanggan_post()
    {
        $idpelanggan = $this->post('id_pelanggan');
        $passwordbaru = $this->post('password_baru');
        $passwordlama = $this->post('password_lama');
        $profile = $this->post('is_profile');
        $isupdated = $this->api->updatePasswordPelanggan($passwordlama,$passwordbaru, $idpelanggan);
        if ($isupdated) {
            $this->response(['status' => 'password berhasil diupdate', 'updated' => true, 'is_profile'=>false]);
        } else {
            $this->response(['status' => 'password gagal diupdate', 'updated' => false]);
        }
    }

    public function getDataTransaksiPelanggan_post()
    {
        $idpelanggan = $this->post('id_pelanggan');
        $data = $this->api->getDataTransaksi($idpelanggan);
        $this->response(['dataTransaksi' => $data]);
    }

    public function bookingRumah_post()
    {
        $idrumah = $this->post('id_rumah');
        $nik = $this->post('nik');
        $nama = $this->post('nama');
        $pekerjaan = $this->post('pekerjaan');
        $alamat = $this->post('alamat');
        $idpelanggan = $this->post('id_pelanggan');

        $nmfd = $this->post('namafd');
        $tmptlfd = $this->post('tmptlfd');
        $tgllfd = $this->post('tgllfd');
        $statusfd = $this->post('statusfd');
        $ktpfd = $this->post('ktpfd');
        $alamatfd = $this->post('statusfd');  
        $telponfd = $this->post('telponfd');
        $hpfd = $this->post('hpfd');
        $emailfd = $this->post('emailfd');
        $npwpfd = $this->post('npwpfd');
        $pekerjaanfd = $this->post('pekerjaanfd');
        $fnpwp = $this->post('fnpwp');
        $fktp = $this->post('fktp');


        $data = $this->api->BookingRumah($idrumah, $nik, $nama, $pekerjaan, $alamat, $idpelanggan,$nmfd,$tmptlfd,$tgllfd, $statusfd,$ktpfd,$alamatfd, $telponfd, $hpfd, $emailfd, $npwpfd, $pekerjaanfd,$fnpwp,$fktp);
        $this->response($data);
    }

    public function cancelBooking_post()
    {
        $idrumah = $this->post('id_rumah');
        $iscanceled = $this->api->cancelBooking($idrumah);
        $this->response($iscanceled);
    }

    public function uploadPembayaran_post()
    {

        $image = $this->post('base64');
        $idpelanggan = $this->post('id_pelanggan');
        $idrumah = $this->post('id_rumah');
        $realImage = base64_decode($image);
        $now = date("YmdHis");
        $buktiTransaksi = 'trs_'. $idpelanggan . '' . $idrumah . '_' . $now . '.jpg';
        $isupdated = $this->api->updateStatusRumah($idrumah, $buktiTransaksi);
        if ($isupdated) {
            if (file_put_contents('././assets/images/transaksi/'.$buktiTransaksi, $realImage) !== false) {
                $success = true;
            } else {
                $success = false;
            }
        }else{
            $success = false;
        }
        $this->response($success);
    }

    public function subscribe_post()
    {
        $email = $this->post('email');
        $telpon = $this->post('telpon');
        $issubscribe = $this->api->subscribe($email,$telpon);
        $this->response($issubscribe);
    }

    public function getDataBank_get()
    {
        $data = $this->api->getDataBank();
        $this->response(['dataBank' => $data]);
    }
    public function getPromo_get()
    {
        $data = $this->api->getPromo();
        $this->response(['dataPromo'=>$data]);
    }
    public function getDetailPromo_post()
    {
        $id = $this->post('id_promo');
        $data = $this->api->getDetailPromoById($id);
        $this->response($data);
    }
    public function getAllPromo_get()
    {
        $data = $this->api->getAllPromo();
        $this->response(['dataPromo'=>$data]);
    }
    public function getProgres_post()
    {
        $data = $this->api->getProgress($this->post('id_rumah'));
        $this->response($data,200);
    }
    public function getDetailLokasi_post()
    {
        $data = $this->api->getDetailLokasi($this->post('id_lokasi'));
        $this->response($data,200);
    }

    public function checkStatusRumah_post()
    {
        $data = $this->api->checkStatusRumah($this->post('id_rumah'));
        $this->response($data,200);
    }
    public function report_post()
    {
        $nama_konsumen = $this->post('nama_konsumen');
        $pekerjaan = $this->post('pekerjaan');
        $detail_pekerjaan = $this->post('detail_pekerjaan');
        $nohp = $this->post('nohp');
        $followup = $this->post('followup');
        $keterangan = $this->post('keterangan');  
        $foto = $this->post('foto');
        $tgl = date("YmdHis");
        $lokasi = $this->post('lokasi');
        $sales = $this->post('sales');
        $realImage = base64_decode($foto);
        $image_to_save = $tgl.'_'.$nama_konsumen.'.jpg';
        $response = $this->api->report($nama_konsumen, $pekerjaan, $detail_pekerjaan, $nohp, $followup, $keterangan,$image_to_save, $tgl, $lokasi,$sales);
        if ($response) {
            if (file_put_contents('././assets/images/pelanggan/'.$image_to_save, $realImage) !== false) {
                $success = true;
            } else {
                $success = false;
            }
        }else{
            $success = false;
        }
        
        $this->response($response,200);
    }
    public function loglokasi_post()
    {
        $id_user = $this->post('id_user');
        $lokasi = $this->post('koordinat');
        $jalan  = $this->post('nama_jalan');
        $tgl = $this->post('waktu');
        $response = $this->api->loglokasi($id_user,$lokasi,$jalan,$tgl);
        $this->response($response, 200);
    }
    public function getKonsumenById_post()
    {
        $id_sales = $this->post('id_sales');
        $res = $this->api->getKonsumenById($id_sales);
        $this->response(['dataKonsumen'=>$res], 200);
    }
    public function updateKonsumen_post()
    {
        $id_kons =  $this->post('id_konsumen');
        $nama =  $this->post('nama');
        $pekerjaan = $this->post('pekerjaan');
        $detail_pekerjaan = $this->post('detail_pekerjaan');
        $nohp = $this->post('nohp');
        $followup = $this->post('followup');
        $keterangan = $this->post('keterangan');
        $isupdated =  $this->api->updateKonsumen($id_kons, $nama,$pekerjaan,$detail_pekerjaan, $nohp,$followup,$keterangan);
        $this->response($isupdated,200);
    }

}
