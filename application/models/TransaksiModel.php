<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
    }	
    public function getData()
	{
		$result = $this->db->query("SELECT p.`*`,l.alamat,l.ket FROM perumahan p JOIN lokasi l ON p.kodeLokasi=l.kodeLokasi")->result_array();
		return $result;
    }
    
    public function getDataTransaksi()
	{
		$result = $this->db->query("SELECT * FROM transaksi t JOIN (SELECT perumahan.*,lokasi.alamat,lokasi.ket FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah")->result_array();
		return $result;
	}

    public function SaveData($kode,$nik,$nama,$alamat,$pekerjaan,$kodeLokasi)
	{
        $kd = "Trs-".date('YmdHms');
		$this->db->trans_begin();
		$this->db->query("INSERT INTO transaksi (kodeTransaksi,nik,nama,alamat,pekerjaan,id_rumah,tgl) values (?,?,?,?,?,?,now())",array($kd,$nik,$nama,$alamat,$pekerjaan,$kodeLokasi));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		
    }
		
    public function UpdateData($kode,$nik,$nama,$alamat,$pekerjaan,$kodeLokasi)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE transaksi set nik=?, nama=?, alamat=?,pekerjaan=?,id_rumah=? where kodeTransaksi=?",array($nik,$nama,$alamat,$pekerjaan,$kodeLokasi,$kode));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}	

	
	public function UpdateDataDetail($kode,$nama,$alamat,$pekerjaan,$tempat,$tgl,$status,$ktp,$npwp,$tlp,$hp,$email,$fktp,$fnpwp)
	{
		$this->db->trans_begin();
		$this->db->query("DELETE from detail_transaksi where kodeTransaksi=?",array($kode));

		$this->db->query("INSERT INTO detail_transaksi values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($nama,$tempat,$tgl,$status,$ktp,$alamat,$tlp,$hp,$email,$npwp,$pekerjaan,$kode,$fnpwp,$fktp));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	public function updateDataEdit($id,$ket,$alamat,$kab,$provinsi,$file)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE transaksi set ket=?, alamat=?, kabKota=?,provinsi=?, file=? where id_rumah=?",array($ket,$alamat,$kab,$provinsi,$file,$id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}
	
	
    public function getDataById($id)
	{
		$result = $this->db->query("SELECT * from transaksi where kodeTransaksi=?",array($id))->row();
		return $result;
	}

	public function getDataDetailById($id)
	{
		$result = $this->db->query("SELECT * from detail_transaksi where kodeTransaksi=?",array($id))->row();
		return $result;
	}

	public function getFileById($id)
	{
		$result = $this->db->query("SELECT * from transaksi where id_rumah=?",array($id))->row();
		return $result;
	}

	public function DeleteData($id)
	{
			$this->db->trans_begin();
			$this->db->query("DELETE from transaksi where kodeTransaksi=?",array($id));
			if($this->db->trans_status()){
				$this->db->trans_commit();
				return true;
			}else{
				$this->db->trans_rollback();
				return false;
			}
    }

}
