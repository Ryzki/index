<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	

	public function getDataPegawaiByStatus($status)
	{
		$sql = "SELECT * from vw_pegawai WHERE nStatusJab=? order by cNmPegawai";
		$query = $this->db->query($sql,array($status));
		return $query->result_array();
	}

	public function getDataBagian()
	{
		$sql = "SELECT * from m_bagian ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getDataSeksiPerBagian($bag)
	{
		
		$seksi = array();
		if($bag!="ALL"){
			array_push($seksi,array("id"=>"ALL","text"=>"Keseluruhan"));
		}
		$sql = "SELECT * FROM m_seksi where cKdBagian=?";
		$query = $this->db->query($sql,array($bag))->result_array();

		foreach($query as $rs){
			array_push($seksi,array("id"=>$rs['cKdSeksi'],"text"=>$rs['cNmSeksi']));
		}		
		return $seksi;		
	}

	public function getDataKinerjaPeg($id,$bln,$thn)
	{
		
		$sql = "SELECT a.cNIK,a.cNmPegawai,a.cNmJab,a.cNmSeksi,b.Nilai FROM vw_pegawai a JOIN m_posting b ON a.cNIK=b.Nik 
		WHERE b.nBln=? and b.nThn=? AND a.cNIK=?";
		$query = $this->db->query($sql,array($bln,$thn,$id));
	 	return $query->row();
	}

	function getDataRekapTupoksi ($id,$bln,$thn){
		$sql = "SELECT a.cNIK,b.cNmPegawai,a.cKdKerja,c.cNmKerja,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND cNIK=a.cNIK AND lBatal=0 AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nJumlah,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND cNIK=a.cNIK AND lBatal=0 AND nVerifikasi=1 AND dTargetTglSelesai>=dTglSelesai AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nSelesai,		
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND cNIK=a.cNIK AND lBatal=0 AND nVerifikasi=1 AND dTargetTglSelesai>=dTglSelesai AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nTepat,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND cNIK=a.cNIK AND lBatal=0 AND nVerifikasi=1 AND nQtySelesai>=nQty AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nKuantitas,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND cNIK=a.cNIK AND lBatal=0 AND nVerifikasi=1 AND nQualitasSelesai>=100 AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nKualitas
		FROM m_kerjapegawai a 
		JOIN m_pegawai b ON a.cNIK=b.cNIK
		JOIN m_pekerjaan c ON a.cKdKerja=c.cKdKerja WHERE a.cNIK = ?";
		$query = $this->db->query($sql,array($bln,$thn,$bln,$thn,$bln,$thn,$bln,$thn,$bln,$thn,$id));
		return $query->result_array();		
	}

	function getDataRekapTupoksiSeksi ($id,$bln,$thn){
		$sql = "SELECT a.cKdSeksi,b.cNmSeksi,a.cKdKerja,a.cNmKerja,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND lBatal=0 AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nJumlah,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND lBatal=0 AND nVerifikasi=1 AND dTargetTglSelesai>=dTglSelesai AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nSelesai,		
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND lBatal=0 AND nVerifikasi=1 AND dTargetTglSelesai>=dTglSelesai AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nTepat,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND lBatal=0 AND nVerifikasi=1 AND nQtySelesai>=nQty AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nKuantitas,
		(SELECT COUNT(cKdPenugasan) FROM d_penugasan WHERE cKdKerja=a.cKdKerja AND lBatal=0 AND nVerifikasi=1 AND nQualitasSelesai>=100 AND MONTH(dTargetTglSelesai)=? AND YEAR(dTargetTglSelesai)=?) nKualitas
		FROM m_pekerjaan a 
		JOIN m_seksi b ON a.cKdSeksi=b.cKdSeksi WHERE a.cKdSeksi = ?";
		$query = $this->db->query($sql,array($bln,$thn,$bln,$thn,$bln,$thn,$bln,$thn,$bln,$thn,$id));
		return $query->result_array();		
	}
	
	function getDataKinerjaPerBag ($id,$bln,$thn){
		$lcAnd = ($id=="ALL"?"":" AND a.cKdBagian='$id'");
		$sql = "SELECT * FROM (SELECT a.cNIK,a.cNmPegawai,b.cNmSeksi,c.cNmJab,d.cNmBagian,IFNULL(e.Nilai,0) Nilai,c.nStatusJab,d.cKdBagian,a.cKdSeksi from m_pegawai a LEFT JOIN m_seksi b on a.cKdSeksi=b.cKdSeksi
		JOIN m_bagian d ON a.cKdBagian=d.cKdBagian JOIN m_jabatan c ON a.cKdJab=c.cKdJab LEFT JOIN m_posting e  ON a.cNIK=e.NIK WHERE
		 e.nBln=? AND e.nThn=?  ".$lcAnd.") tbl ORDER BY cKdBagian,cKdSeksi,nStatusJab,cNmPegawai ";
		$query = $this->db->query($sql,array($bln,$thn));
		return $query->result_array();			  
	}

	function getDataDetailPekerjaanBag ($bag,$bln,$thn){
		$lcAnd = ($bag=="ALL"?"":" AND cKdBagian='$bag'");
		$sql = "SELECT * FROM vw_penugasan WHERE month(dTglPenugasan)=? and YEAR(dTglPenugasan)=? AND lBatal=0 ".$lcAnd." ORDER BY cKdBagian,cKdSeksi,cNmPegawai";
		$query = $this->db->query($sql,array($bln,$thn));
		return $query->result_array();			  
	}

	function getDataEditHapus ($jns,$bag,$bln,$thn){
		$lcAnd = ($bag=="ALL"?"":" AND cKdBagian='$bag'");
		switch($jns){
			case "EditHapus":
				$lcAndOR = " AND (lBatal=1 OR lEdit=1)";
				break;
			case "Edit":
				$lcAndOR = " AND lEdit=1";
				break;
			case "Hapus":
				$lcAndOR = " AND lBatal=1";
				break;								

		}
		$sql = "SELECT cKdPenugasan,dTglPenugasan,cNmKerja,dTargetTglMulai,dTargetTglSelesai,nQty,
		GROUP_CONCAT(cNmPegawai) pegawai,lBatal,cKetBatal,lEdit,cKetEdit,cNmSeksi,cNmBagian FROM vw_penugasan 
		WHERE month(dTglPenugasan)=? and YEAR(dTglPenugasan)=? ".$lcAndOR.$lcAnd." GROUP BY cKdPenugasan ORDER BY dTglPenugasan";
		$query = $this->db->query($sql,array($bln,$thn));
		return $query->result_array();			  
	}		
}
?>
