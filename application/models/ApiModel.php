<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function getAllDataPerumahan()
	{
		$query = "SELECT * FROM perumahan";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function getDataUser($username, $pass)
	{
		$sql = "SELECT * FROM user WHERE username=? AND password=?";
		$query = $this->db->query($sql, array($username, $pass));
		return $query->row();
	}

	public function getDataAllUser()
	{
		$sql = "SELECT * FROM user ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function updateDataUser($nama, $username, $iduser)
	{
		$query = "UPDATE user SET nama=?, username=? WHERE id_user=?";
		$this->db->trans_start();
		$this->db->query($query, array($nama, $username, $iduser));
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function updatePasswordUser($passwordlama, $passwordbaru, $iduser)
	{
		$query = "SELECT * FROM user WHERE password = '$passwordlama'  AND id_user = '$iduser'";
		if ($this->db->query($query)->num_rows() > 0) {
			$query = "UPDATE user SET password=?  WHERE id_user=?";
			$this->db->trans_start();
			$this->db->query($query, array($passwordbaru, $iduser));
			$this->db->trans_complete();
			if ($this->db->trans_status()) {
				$this->db->trans_commit();
				return true;
			} else {
				$this->db->trans_rollback();
				return false;
			}
		} else {
			return false;
		}
	}

	public function getDataPelanggan($email, $pass)
	{
		$sql = "SELECT * FROM pelanggan WHERE email=? AND password=?";
		$query = $this->db->query($sql, array($email, $pass));
		return $query->row();
	}

	public function getDataLokasi()
	{
		$query = "SELECT * FROM lokasi";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function getPerumahanByLokasi($id_lokasi)
	{
		$query = "SELECT p.*, l.ket, l.denah FROM perumahan p JOIN lokasi l ON l.kodeLokasi = p.kodeLokasi WHERE  p.kodeLokasi = ? AND X IS NOT NULL AND Y  IS NOT NULL";
		$sql = $this->db->query($query, array($id_lokasi));
		return $sql->result_array();
	}

	public function registerpelanggan($nama, $alamat, $email, $telpon, $password)
	{
		$query = "INSERT INTO pelanggan(nama,alamat,email,telpon,password) VALUES (?,?,?,?,?)";
		$this->db->trans_start();
		$this->db->query($query, array($nama, $alamat, $email, $telpon, $password));

		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function updatedatapelanggan($nama, $alamat, $email, $telpon, $idpelanggan)
	{

		$query = "UPDATE pelanggan SET nama=?, alamat=?, email=?, telpon=? WHERE id_pelanggan=?";
		$this->db->trans_start();
		$this->db->query($query, array($nama, $alamat, $email, $telpon, $idpelanggan));
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function updatePasswordPelanggan($passwordlama, $passwordbaru, $idpelanggan)
	{
		$query = "SELECT * FROM pelanggan WHERE password = '$passwordlama'  AND id_pelanggan = '$idpelanggan'";
		if ($this->db->query($query)->num_rows() > 0) {
			$query = "UPDATE pelanggan SET password=?  WHERE id_pelanggan=?";
			$this->db->trans_start();
			$this->db->query($query, array($passwordbaru, $idpelanggan));
			$this->db->trans_complete();
			if ($this->db->trans_status()) {
				$this->db->trans_commit();
				return true;
			} else {
				$this->db->trans_rollback();
				return false;
			}
		} else {
			return false;
		}
	}
	public function getDataTransaksi($idpelanggan)
	{
		$query = "SELECT t.*, p.`type` FROM transaksi t JOIN perumahan p ON p.id_rumah = t.id_rumah WHERE t.id_pelanggan = ? AND p.status != 0";
		$sql = $this->db->query($query, array($idpelanggan));
		return $sql->result_array();
	}

	public function BookingRumah($idrumah, $nik, $nama, $pekerjaan, $alamat, $idpelanggan, $nmfd, $tmptlfd, $tgllfd, $statusfd, $ktpfd, $alamatfd, $telponfd, $hpfd, $emailfd, $npwpfd, $pekerjaanfd, $fnpwp, $fktp)
	{
		$now = date("YmdHis");
		$queryupdaterumah = "UPDATE perumahan SET status = 1 WHERE id_rumah= $idrumah";
		$querytransaksi = "INSERT INTO transaksi VALUES(?,?,?,?,?,?,?,?,0,0,null)";
		$querydetailpelanggan = "INSERT INTO detail_transaksi VALUES('','$nmfd','$tmptlfd','$tgllfd','$statusfd','$ktpfd','$alamatfd','$telponfd','$hpfd','$emailfd','$npwpfd','$pekerjaanfd','trs-$idpelanggan $idrumah-$now','$fnpwp', '$fktp')";
		$this->db->trans_start();
		$this->db->query($querytransaksi, array('trs-' . $idpelanggan . $idrumah . '-' . $now, $nik, $nama, $pekerjaan, $alamat, $now, $idrumah, $idpelanggan));
		$this->db->query($querydetailpelanggan);
		$this->db->query($queryupdaterumah);

		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function cancelBooking($idrumah)
	{
		$querytran =  "DELETE FROM transaksi  WHERE id_rumah = ?";
		$queryper = "UPDATE perumahan SET  status = 0 WHERE id_rumah = ?";
		// $querydetail = "DELETE FROM detail_transaksi WHERE kodeTransaksi =(SELECT kdBooking FROM perumahan WHERE id_rumah = ?)";
		$this->db->trans_start();
		$this->db->query($querytran, array($idrumah));
		// $this->db->query($querydetail, array($idrumah));
		$this->db->query($queryper, array($idrumah));
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function updateStatusRumah($idrumah, $buktiTransaksi)
	{
		$query = "UPDATE transaksi SET status_transaksi = 1, bukti_transaksi = ? WHERE id_rumah = ?";
		$this->db->trans_start();
		$this->db->query($query, array($buktiTransaksi, $idrumah));
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function subscribe($email, $telpon)
	{
		$query = "INSERT INTO subscriber VALUES(?,?)";
		$this->db->trans_start();
		$this->db->query($query, array($email, $telpon));
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function getDataBank()
	{
		$query = "SELECT * FROM bank";
		return $this->db->query($query)->result_array();
	}
	public function getPromo()
	{
		$query = "SELECT * FROM promo  ORDER BY id_promo DESC LIMIT 5";
		return $this->db->query($query)->result_array();
	}

	public function getAllPromo()
	{
		$query = "SELECT * FROM promo  ORDER BY id_promo DESC";
		return $this->db->query($query)->result_array();
	}

	public function getDetailPromoById($id)
	{
		$query = "SELECT * FROM promo WHERE id_promo = '$id'";
		return $this->db->query($query)->row();
	}

	public function getProgress($id_rumah)
	{
		$query = "SELECT p.*, pr.* FROM perumahan p JOIN progres pr ON pr.id_rumah = p.id_rumah WHERE p.id_rumah = ?";
		$sql = $this->db->query($query, array($id_rumah));
		return $sql->row();
	}

	public function getDetailLokasi($id_lokasi)
	{
		$query = "SELECT * FROM  lokasi WHERE kodeLokasi = ?";
		$sql = $this->db->query($query, array($id_lokasi));
		return $sql->row();
	}

	public function checkStatusRumah($id_rumah)
	{
		$query = "SELECT status FROM  perumahan WHERE id_rumah = ?";
		$sql = $this->db->query($query, array($id_rumah));
		return $sql->row();
	}

	public function report($nama, $pekerjaan, $detail_pekerjaan, $no_hp, $follo_up, $keterangan, $foto, $tgl, $lokasi, $sales)
	{
		$query =  "INSERT INTO konsumen(nama, pekerjaan, detail_pekerjaan, no_hp, follow_up,sales, ket, foto, tgl, lokasi)VALUES(?,?,?,?,?,?,?,?,?,?)";
		$this->db->trans_start();
		$this->db->query($query, array($nama, $pekerjaan, $detail_pekerjaan, $no_hp, $follo_up, $sales, $keterangan, $foto, $tgl, $lokasi));
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function loglokasi($id_user, $lokasi, $jalan, $tgl)
	{

		$lokasi = json_decode($lokasi);
		$jalan = json_decode($jalan);
		$tgl = json_decode($tgl);
		$this->db->trans_start();
		for ($i = 0; $i < count($lokasi); $i++) {
			$query =  "INSERT INTO loglokasi(id_user, koordinat,jalan, waktu)VALUES(?,?,?,?)";
			$this->db->query($query, array($id_user, $lokasi[$i], $jalan[$i], $tgl[$i]));
		}
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function getKonsumenById($id_sales)
	{
		$query = "SELECT * FROM konsumen WHERE sales = ?";
		$sql = $this->db->query($query, array($id_sales));
		return $sql->result_array();
	}
	public function updateKonsumen($id, $nama, $pekerjaan, $detail_pekerjaan, $no_hp, $follow_up, $keterangan)
	{
		$query = "UPDATE konsumen SET nama = ?, pekerjaan = ?, detail_pekerjaan = ?, no_hp = ?, follow_up = ?, ket = ? WHERE id = ?";
		$this->db->trans_start();
		$sql = $this->db->query($query, array($nama, $pekerjaan, $detail_pekerjaan,$no_hp, $follow_up, $keterangan, $id));
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
}
