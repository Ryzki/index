<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekapModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getData()
    {
        $query = "SELECT nip,nm_pegawai, IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Alpha' AND nip = p.nip GROUP BY ket_absen),0) as alpha,
                    IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Izin' AND nip = p.nip GROUP BY ket_absen),0) as izin,
                    IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Sakit' AND nip = p.nip GROUP BY ket_absen),0) as sakit,
                    IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Cuti' AND nip = p.nip GROUP BY ket_absen),0) as cuti
            FROM pegawai p GROUP BY p.nip ";
        return $this->db->query($query)->result_array();
        
    }
    public function getDataByMonth($mon,$year)
    {
        $query = "SELECT nip,nm_pegawai, IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Alpha' AND nip = p.nip AND MONTH(tgl) = '$mon' AND YEAR(tgl) = '$year' GROUP BY ket_absen),0) as alpha,
                    IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Izin' AND nip = p.nip AND MONTH(tgl) = '$mon' AND YEAR(tgl) = '$year'  GROUP BY ket_absen),0) as izin,
                    IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Sakit' AND nip = p.nip AND MONTH(tgl) = '$mon' AND YEAR(tgl) = '$year' GROUP BY ket_absen),0) as sakit,
                    IFNULL((SELECT count(ket_absen) FROM data_absen WHERE ket_absen='Cuti' AND nip = p.nip AND MONTH(tgl) = '$mon' AND YEAR(tgl) = '$year' GROUP BY ket_absen),0) as cuti
            FROM pegawai p GROUP BY p.nip ";
        return $this->db->query($query)->result_array();
    }
}

?>
