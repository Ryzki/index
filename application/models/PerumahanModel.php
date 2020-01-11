<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerumahanModel extends CI_Model {
	public function __construct(){
		parent:: __construct();
    }	
    public function getData()
	{
		$result = $this->db->query("SELECT p.`*`,l.alamat FROM perumahan p JOIN lokasi l ON p.kodeLokasi=l.kodeLokasi")->result_array();
		return $result;
		}
		
		public function getDataKoordinat()
		{
			$result = $this->db->query("SELECT p.`*`,l.alamat,l.`file` FROM perumahan p JOIN lokasi l ON p.kodeLokasi=l.kodeLokasi AND X is NOT null")->result_array();
			return $result;
			}
    
    public function getDataLokasi()
	{
		$result = $this->db->query("SELECT * FROM lokasi")->result_array();
		return $result;
	}
	
    public function SaveData($blok,$type,$luas,$kamar,$dapur,$ruang_tamu,$kamar_mandi,$lantai,$harga,$progres,$kodeLokasi,$namaFoto,$garasi,$dp,$air,$listrik)
	{
		$this->db->trans_begin();
		$this->db->query("INSERT INTO perumahan (id_rumah,blok,type,luas,kamar,dapur,ruang_tamu,kamar_mandi,lantai,harga,progres,dp,kodeLokasi,foto,garasi,air,listrik) values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($blok,$type,$luas,$kamar,$dapur,$ruang_tamu,$kamar_mandi,$lantai,$harga,$progres,$dp,$kodeLokasi,$namaFoto,$garasi,$air,$listrik));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		
	}
	
	public function SaveDataProgress($id,$progres,$file,$file2,$file3)
	{
		$this->db->trans_begin();
		$this->db->query("INSERT INTO progres (id,id_rumah,progres,tgl,foto1,foto2,foto3) values(null,?,?,now(),?,?,?)",array($id,$progres,$file,$file2,$file3));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		
    }
		
  //   public function UpdateData($ket,$alamat,$kab,$provinsi,$id)
	// {
	// 	$this->db->trans_begin();
	// 	$this->db->query("UPDATE perumahan set ket=?, alamat=?, kabKota=?,provinsi=? where id_rumah=?",array($ket,$alamat,$kab,$provinsi,$id));
	// 	if($this->db->trans_status()){
	// 		$this->db->trans_commit();
	// 		return true;
	// 	}else{
	// 		$this->db->trans_rollback();
	// 		return false;
	// 	}
	// }	
	public function UpdateData($id,$blok,$type,$luas,$kamar,$dapur,$ruang_tamu,$kamar_mandi,$lantai,$harga,$progres,$kodeLokasi,$namaFoto,$garasi,$dp,$air,$listrik)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE perumahan set blok=?, type=?, luas=?,kamar=?, dapur=?, ruang_tamu=?, kamar_mandi=?,lantai=?,harga=?,progres=?,kodeLokasi=?,foto=?,garasi=?, dp=?, air=?, listrik=? where id_rumah=?",array($blok,$type,$luas,$kamar,$dapur,$ruang_tamu,$kamar_mandi,$lantai,$harga,$progres,$kodeLokasi,$namaFoto,$garasi,$dp,$air,$listrik,$id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
  }

  public function UpdateDataProgresPerumahan($id,$progres)
  {
	  $this->db->trans_begin();
	  $this->db->query("UPDATE perumahan set progres=? where id_rumah=?",array($progres,$id));
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
		$result = $this->db->query("SELECT p.`*`,l.`file` from perumahan AS p JOIN lokasi AS l ON p.kodeLokasi=l.kodeLokasi AND p.id_rumah=?",array($id))->row();
		return $result;
	}
	

	public function getProgresMinimal($id)
	{
		$result = $this->db->query("SELECT *,MIN(progres) AS m FROM progres WHERE id_rumah=?",array($id))->row();
		return $result;
	}

	public function getProgresMax($id)
	{
		$result = $this->db->query("SELECT * FROM progres JOIN (SELECT MAX(progres) AS max FROM progres WHERE id_rumah=?) AS t ON progres=max",array($id))->row();
		return $result;
	}

	public function getDataProgresById($id)
	{
		$result = $this->db->query("SELECT * FROM progres WHERE id_rumah=?",array($id))->result_array();
		return $result;
	}

	public function getProgresByIdAndProgress($id,$prog)
	{
		$result = $this->db->query("SELECT * FROM progres WHERE id_rumah=? AND progres=?",array($id,$prog))->row();
		return $result;
	}

	public function getFileById($id)
	{
		$result = $this->db->query("SELECT * from perumahan where id_rumah=?",array($id))->row();
		return $result;
	}

	public function getFotoById($id)
	{
		$result = $this->db->query("SELECT * from perumahan where id_rumah=?",array($id))->row();
		return $result;
	}

	public function DeleteData($id)
	{
			$this->db->trans_begin();
			$this->db->query("DELETE from perumahan where id_rumah=?",array($id));
			if($this->db->trans_status()){
				$this->db->trans_commit();
				return true;
			}else{
				$this->db->trans_rollback();
				return false;
			}
		}
		

		public function UpdateKoordinat($id,$blok,$x,$y)
	{
		$this->db->trans_begin();
		$this->db->query("UPDATE perumahan set blok=?, X=?, Y=? where id_rumah=?",array($blok,$x,$y,$id));
		if($this->db->trans_status()){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
  }

}
