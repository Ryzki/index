<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifikasiModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
    }	
    public function getData()
	{
		$result = $this->db->query("SELECT p.`*`,l.alamat,l.ket FROM perumahan p JOIN lokasi l ON p.kodeLokasi=l.kodeLokasi")->result_array();
		return $result;
    }
    
    public function getDataVerifikasi()
	{
		$result = $this->db->query("SELECT * FROM transaksi t JOIN (SELECT perumahan.*,lokasi.alamat,lokasi.ket FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah")->result_array();
		return $result;
	}
    
    public function UpdateData($kode,$jumlah_tf,$tgl,$no_rek,$user)
	{
       
        $this->db->trans_begin();
        $this->db->query("UPDATE transaksi set status_transaksi=2 where kodeTransaksi=?",array($kode));
		$this->db->query("INSERT INTO verifikasi values(null,now(),?,?,?,?,?)",array($kode,$jumlah_tf,$tgl,$no_rek,$user));
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

	public function DeleteData($id)
	{
			$this->db->trans_begin();
			$this->db->query("DELETE from Transaksi where id_rumah=?",array($id));
			if($this->db->trans_status()){
				$this->db->trans_commit();
				return true;
			}else{
				$this->db->trans_rollback();
				return false;
			}
    }

}
