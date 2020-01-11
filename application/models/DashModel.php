<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getTotalPerumahan()
	{
		$result = $this->db->query("SELECT COUNT(*) as total FROM lokasi")->row();
		return $result;
	}

	public function getTotalRumah()
	{
		$result = $this->db->query("SELECT COUNT(*) as total FROM perumahan")->row();
		return $result;
	}

	public function getTotalTerjual()
	{
		$result = $this->db->query("SELECT COUNT(*) as total FROM perumahan WHERE status=1")->row();
		return $result;
	}

	public function getTotalTersedia()
	{
		$result = $this->db->query("SELECT COUNT(*) as total FROM perumahan WHERE status=0")->row();
		return $result;
	}

	public function getLokasi()
	{
		$lokasi = array();
		$result = $this->db->query("SELECT * FROM lokasi Order by kodeLokasi")->result_array();
		foreach ($result as $r) {
			array_push($lokasi,$r['ket']);
		}
		return $lokasi;
	}

	public function getBar()
	{
		$terjual = array();
		$tersedia = array();

		$result = $this->db->query("SELECT * FROM lokasi Order by kodeLokasi")->result_array();
		foreach ($result as $r) {
			$bar = $this->db->query("SELECT COUNT(*) as total FROM perumahan WHERE STATUS=1 AND kodeLokasi=? ",array($r['kodeLokasi']))->row();
			array_push($terjual,(int)$bar->total);

			$bar2 = $this->db->query("SELECT COUNT(*) as total FROM perumahan WHERE STATUS=0 AND kodeLokasi=? ",array($r['kodeLokasi']))->row();
			array_push($tersedia,(int)$bar2->total);
		}
		return array($terjual,$tersedia);
	}

	public function getPie()
	{
		$terjual = array();
		$bln = Date('m');
		$thn = Date('Y');
		$result = $this->db->query("SELECT * FROM lokasi Order by kodeLokasi")->result_array();
		foreach ($result as $r) {
			$pie = $this->db->query("SELECT COUNT(tx.kodeLokasi) as total FROM 
			(SELECT kodeTransaksi,tgl,status_transaksi,z.kodeLokasi FROM transaksi t JOIN (SELECT perumahan.id_rumah,lokasi.alamat,lokasi.ket,lokasi.kodeLokasi FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah) as tx 
			WHERE tx.status_transaksi=2 AND tx.kodeLokasi=? AND month(tx.tgl)=? AND year(tx.tgl)=? ",
			array($r['kodeLokasi'],$bln,$thn))->row();
			
			$x = array('name'=>$r['ket'],'y'=>(int) $pie->total);
			array_push($terjual,$x);
		}
		return $terjual;
	}

}

?>
