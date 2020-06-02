<?php 	

/**
 * 
 */
class DataPeramalan extends CI_Controller
{
	public $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peramalan_Model');
		$this->load->model('Penjualan_Model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index()
	{
		$data['bulan'] = $this->namaBulan;
		$data['peramalan'] = $this->Peramalan_Model->getAllData();		
		$data['tampil_hitung'] = $this->Penjualan_Model->hitung();
		$this->load->view('templates/header');
		$this->load->view('peramalan/index', $data);
		$this->load->view('templates/footer');
	}

	public function validation_form(){
		
		$this->form_validation->set_rules("tahun", "tahun", "required");
		$this->perhitungan($this->input->post('tahun'), $this->input->post('bulan'));

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$bulan =$this->input->post('bulan', true);
			$tahun =$this->input->post('tahun', true);
			$hasil =$this->perhitungan($tahun, $bulan);

			$this->Peramalan_Model->tambah_data($hasil);
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('DataPeramalan');
		}	
	}

	public function hapus($kd)
	{
		$this->Peramalan_Model->hapus_data($kd);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('DataPeramalan');	
	}

	public function ubah($kd)
	{
		$this->form_validation->set_rules("tahun", "tahun", "required");
		$this->form_validation->set_rules("hasil_penjualan", "Hasil Penjualan", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$data['bulan'] = $this->namaBulan;
			$data['ubah']= $this->Peramalan_Model->detail_data($kd);
			$this->load->view('templates/header');
			$this->load->view('peramalan/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Peramalan_Model->ubah_data($kd);
			$this->session->set_flashdata('flash', 'DiUbah');
			redirect('DataPeramalan');
		}	
	}

	
	public function perhitungan($tahun, $bulan){

		$x = 0;
		$jumlahx = 0;
		$jumlahy = 0;
		$jumlahxy = 0;
		$jumlahx2 = 0;

		foreach ($this->Penjualan_Model->hitung() as $key => $value):
			
			$jumlahy += $value->hasil ;
			$jumlahx += $x;
			$jumlahxy += ($value->hasil)*$x ;
			$jumlahx2 += pow($x,2);
			$x++;
			$rata_rata = $jumlahy/$x;
			$tahun_lama = $value->tahun;
			$bulan_lama = $value->bulan;
			$jarak = (($tahun - $tahun_lama)*12)+($bulan-$bulan_lama);
			$waktu_x = $jarak+($x-1);
			

		endforeach;
		



		echo "tahun lama: " .$tahun_lama."</br>";
		echo "bulan lama: " .$bulan_lama."</br>";
		echo "tahun baru: " .$tahun."</br>";
		echo "bulan baru: " .$bulan."</br>";
		echo "jumlah data(n): " .$x. "</br>";
		echo "X: " .$x."</br>";
		echo "jumlah y: " .$jumlahy."</br>";
		echo "jumlah x: " .$jumlahx."</br>";
		echo "jumlah xy: " .$jumlahxy."</br>";
		echo "jumlah x2: " .$jumlahx2."</br>";
		echo "jumlah rata: " .$rata_rata."</br>";
		echo "jarak: " .$jarak ."</br>" ;
		echo "waktu(X): " .$waktu_x ."</br>" ;




		$b=($x*($jumlahxy)-($jumlahx)*($jumlahy))/($x*($jumlahx2)-pow($jumlahx,2));
		echo "nilai b: " .$b ."</br>";

		$a=($jumlahy-($b*($jumlahx)))/$x ;
		echo "nilai a: " .$a ."</br>";
		
		$Y = $a + ($b*$waktu_x);
		echo $Y;
		return $Y;

	}
}






?>