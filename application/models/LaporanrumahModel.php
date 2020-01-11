<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanrumahModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
    }
	
	public function getData()
    {
        $result = $this->db->query("SELECT * FROM transaksi t JOIN (SELECT perumahan.*,lokasi.alamat,lokasi.ket FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah")->result_array();
		return $result;
        
    }

    public function getDataByDateORRumah($dtgl,$stgl,$nm)
    {
            if($nm == 'semua'){
                $query = "SELECT * FROM transaksi t JOIN (SELECT perumahan.*,lokasi.alamat,lokasi.ket FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah WHERE DATE(t.tgl) BETWEEN '$dtgl' AND '$stgl' ORDER BY t.tgl DESC";
                  
            }
            else if ($nm == 'belum'){
                $query = "SELECT * FROM transaksi t JOIN (SELECT perumahan.*,lokasi.alamat,lokasi.ket FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah WHERE DATE(t.tgl) BETWEEN '$dtgl' AND '$stgl' AND status_transaksi=0 ORDER BY t.tgl DESC ";
                  
            }
            else if ($nm == 'terbayar'){
                $query = "SELECT * FROM transaksi t JOIN (SELECT perumahan.*,lokasi.alamat,lokasi.ket FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah WHERE DATE(t.tgl) BETWEEN '$dtgl' AND '$stgl' AND status_transaksi=1 ORDER BY t.tgl DESC ";
                  
            }else {
                $query = "SELECT * FROM transaksi t JOIN (SELECT perumahan.*,lokasi.alamat,lokasi.ket FROM perumahan JOIN lokasi ON perumahan.kodeLokasi=lokasi.kodeLokasi) AS z ON t.id_rumah=z.id_rumah WHERE DATE(t.tgl) BETWEEN '$dtgl' AND '$stgl' AND status_transaksi=2 ORDER BY t.tgl DESC ";
                  
            }
           
            return $this->db->query($query)->result_array();
    }


    // public function getDataPegawai()
	// {
	// 	$result = $this->db->query("SELECT * from pegawai")->result_array();
	// 	return $result;
    // }
    // public function getDataByDateORPegawai($dtgl,$stgl,$nm)
    // {
    //         if($nm == 'semua'){
    //             $query = "SELECT p.nip,
    //                              p.nm_pegawai,
    //                              l.location,
    //                              l.jalan,
    //                              l.tgl FROM pegawai p JOIN log_location l ON p.nip = l.nip WHERE DATE(l.tgl) BETWEEN '$dtgl' AND '$stgl' ORDER BY l.tgl DESC";
                  
    //         }else{
    //             $query = "SELECT p.nip,
    //             p.nm_pegawai,
    //             l.location,
    //             l.jalan,
    //             l.tgl FROM pegawai p JOIN log_location l ON p.nip = l.nip WHERE p.nip='$nm' AND DATE(l.tgl) BETWEEN '$dtgl' AND '$stgl' ORDER BY l.tgl DESC ";
                  
    //         }
           
            
        
    //         return $this->db->query($query)->result_array();
    // }
	

}

?>
