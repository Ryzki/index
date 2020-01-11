<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HarianSalesModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
    }
	
	public function getData()
    {
        $result = $this->db->query("SELECT * FROM konsumen")->result_array();
		return $result;
        
    }

    public function getDatabyUser($nm)
    {
        $result = $this->db->query("SELECT * FROM konsumen k JOIN user u WHERE k.sales=u.id_user AND u.username='$nm' ORDER BY tgl DESC")->result_array();
		return $result;
        
    }

    public function getDatabyUserTgl($nm,$tgl)
    {
        $result = $this->db->query("SELECT * FROM konsumen k JOIN user u WHERE k.sales=u.id_user AND u.username='$nm' AND DATE(k.tgl)='$tgl' ORDER BY tgl DESC")->result_array();
		return $result;
        
    }

    public function getDataByDateORRumah($dtgl,$nm)
    {
            if($nm == 'semua'){
                $query = "SELECT * FROM konsumen WHERE DATE(tgl)='$dtgl' ORDER BY tgl DESC";
                  
            }
            else {
                $query = "SELECT * FROM konsumen WHERE DATE(tgl)='$dtgl' AND sales ='$nm' ORDER BY tgl DESC";
                  
            }
            
           
            return $this->db->query($query)->result_array();
    }

    public function getDataPegawai()
	{
		$result = $this->db->query("SELECT * FROM user")->result_array();
		return $result;
    }

    public function getDataPegawaiByID($id)
	{
		$result = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->result_array();
		return $result;
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
