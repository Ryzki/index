<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanLokasiModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
    }
	
	public function getData($tgl)
    {
        $query = "SELECT u.nama,l.* FROM user u JOIN loglokasi l ON u.id_user=l.id_user WHERE DATE(l.waktu) = '$tgl' ORDER BY l.waktu DESC";
        return $this->db->query($query)->result_array();
        
    }

    public function getDataPegawai()
	{
		$result = $this->db->query("SELECT * FROM user")->result_array();
		return $result;
    }
    public function getDataByDateORPegawai($dtgl,$stgl,$nm)
    {
            if($nm == 'semua'){
                $query = "SELECT u.nama,l.* FROM user u JOIN loglokasi l ON u.id_user=l.id_user WHERE DATE(l.waktu) BETWEEN '$dtgl' AND '$stgl' ORDER BY l.waktu DESC";
                  
            }else{
                $query = "SELECT u.nama,l.* FROM user u JOIN loglokasi l ON u.id_user=l.id_user WHERE l.id_user='$nm' AND DATE(l.waktu) BETWEEN '$dtgl' AND '$stgl' ORDER BY l.waktu DESC ";
                  
            }
           
            
        
            return $this->db->query($query)->result_array();
    }
	

}

?>
