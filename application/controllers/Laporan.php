<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
	public function __construct(){
		parent:: __construct();


		$this->load->model("LaporanModel");
		
	}
	
    function _remap($method,$args)
    {
 
        if (method_exists($this, $method)){
               $this->$method($args);
        }else{
               $this->index($method,$args);
        }
    }

	public function index($jns)
	{	
		if($this->cekmenu->user_menu($this->session->userdata('cuser'),'Laporan/'.$jns)){
			$data['akses'] = $this->session->userdata('menu');			 			
			$data['act_menu'] = 'Laporan';
			switch ($jns) {
				case 'Pegawai':
					$data["data_pegawai"] = $this->LaporanModel->getDataPegawaiByStatus(3);
					
					$index_page = 'laporan/pegawai/lap_pegawai_layout';
					break;				
				case 'Seksi':
					$data["data_pegawai"] = $this->LaporanModel->getDataPegawaiByStatus(2);
					$index_page = 'laporan/seksi/lap_seksi_layout';
					break;
				case 'Bagian':
					$data["data_pegawai"] = $this->LaporanModel->getDataPegawaiByStatus(1);

					$index_page = 'laporan/bagian/lap_bagian_layout';
					break;
				case 'Detail':
					$data["data_bagian"] = $this->LaporanModel->getDataBagian();

					$index_page = 'laporan/detail/lap_detail_layout';
					break;
				case 'EditHapus':
					$data["data_bagian"] = $this->LaporanModel->getDataBagian();

					$index_page = 'laporan/edit_hapus/lap_edithapus_layout';
					break;															
			}

			$this->load->view('header_layout',$data);
			$this->load->view('menu_layout');
			$this->load->view($index_page);
			$this->load->view('footer_layout');	
		}else{
			redirect(base_url('Login/SignOut'));
		}
	}
	
	public function Cetak()
	{	

			
			$lap = $this->input->post('id_lap');
			
			switch ($lap) {
				case 'PEG':
					$nik = $this->input->post('pegawai');
					$thn = $this->input->post('tahun');
					$bln = $this->input->post('bulan');	
									
					$data["data_pegawai"] = (array)$this->LaporanModel->getDataKinerjaPeg($nik,$bln,$thn);
					$data["data_laporan"] = $this->LaporanModel->getDataRekapTupoksi($nik,$bln,$thn);
					$data["periode"] = $this->bln_to_str($bln).' '.$thn;

					$lap_page = 'laporan/pegawai/lap_pegawai_print';
					$kertas = 'letter';
					$orient = 'potrait';
					break;	

				case 'BAG':					
					$arr = explode('#',$this->input->post('pegawai'));
					$thn = $this->input->post('tahun');
					$bln = $this->input->post('bulan');
					
					$nik = $arr[0];
					$kd = $arr[1];
					
					$data["data_laporan"] = $this->LaporanModel->getDataKinerjaPerBag($kd,$bln,$thn);
					$data["periode"] = $this->bln_to_str($bln).' '.$thn;

					$lap_page = 'laporan/bagian/lap_bagian_print';
					$kertas = 'letter';
					$orient = 'potrait';					
					break;

				case 'SEKSI':					
					$arr = explode('#',$this->input->post('pegawai'));
					$thn = $this->input->post('tahun');
					$bln = $this->input->post('bulan');
					
					$nik = $arr[0];
					$kd = $arr[1];
					
					$data["data_pegawai"] = (array)$this->LaporanModel->getDataKinerjaPeg($nik,$bln,$thn);
					$data["data_laporan"] = $this->LaporanModel->getDataRekapTupoksiSeksi($kd,$bln,$thn);
					$data["periode"] = $this->bln_to_str($bln).' '.$thn;

					$lap_page = 'laporan/seksi/lap_seksi_print';
					$kertas = 'letter';
					$orient = 'potrait';					
					break;					
				case 'DET':
					$arrBag = explode("#",$this->input->post('bagian'));					
					$bag = $arrBag[0];
					$sek = $this->input->post('seksi');
					$thn = $this->input->post('tahun');
					$bln = $this->input->post('bulan');

					$data["nama_bagian"] = $arrBag[1];
					if(!isset($sek)){
						$data["data_laporan"] = $this->LaporanModel->getDataDetailPekerjaanBag($bag,$bln,$thn);
						$lap_page = 'laporan/detail/lap_detail_print_bag';
					}else{
						$data["data_laporan"] = $this->LaporanModel->getDataDetailPekerjaanSek($sek,$bln,$thn);
						$lap_page = 'laporan/detail/lap_detail_print_sek';
					}
					$data["periode"] = $this->bln_to_str($bln).' '.$thn;

					$kertas = 'letter';
					$orient = 'potrait';					
					break;	

				case 'EDIT':
					$bag = $this->input->post('bagian');
					$jns = $this->input->post('jenis');
					$thn = $this->input->post('tahun');
					$bln = $this->input->post('bulan');	
									
					$data["data_laporan"] = $this->LaporanModel->getDataEditHapus($jns,$bag,$bln,$thn);
					$data["periode"] = $this->bln_to_str($bln).' '.$thn;

					$lap_page = 'laporan/edit_hapus/lap_edithapus_print';
					$kertas = 'letter';
					$orient = 'potrait';
					break;																								
			}


			$this->load->view($lap_page,$data);

	}


	public function getSeksi()
	{
		$arrBag = explode("#",$this->input->post('bag'));					
		$bag = $arrBag[0];

		$result = $this->LaporanModel->getDataSeksiPerBagian($bag);

		if(count($result)>0){
			echo json_encode($result);
		}else{
			echo json_encode("-");
		}
	}

	function tri_to_str($tri)
	{
		
		$tri_arr = array("01_02_03"=>"Triwulan I","04_05_06"=>"Triwulan II","07_08_09"=>"Triwulan III","10_11_12"=>"Triwulan IV");
		
		return $tri_arr[$tri];
	}

	function bln_to_str($bln)
	{
		
		$bln_arr = array("01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");
		
		return $bln_arr[$bln];
	}
}
