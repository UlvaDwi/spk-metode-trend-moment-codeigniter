<?php 	

/**
 * 
 */
class DataPenjualan extends CI_Controller
{
	public $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penjualan_Model');
		$this->load->model('Barang_Model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index()
	{
		$data['bulan'] = $this->namaBulan;
		$data['penjualan'] = $this->Penjualan_Model->getAllData();
		$data['lastId'] = $this->Penjualan_Model->getLastId();
		$data['barang'] = $this->Barang_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('penjualan/index', $data);
		$this->load->view('templates/footer');
	}

	public function validation_form(){
		$this->form_validation->set_rules("tahun", "tahun", "required");
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->Penjualan_Model->tambah_data();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('DataPenjualan');
		}	
	}

	public function hapus($kd)
	{
		$this->Penjualan_Model->hapus_data($kd);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('DataPenjualan');	
	}

	public function ubah($kd)
	{
		$this->form_validation->set_rules("tahun", "tahun", "required");
		if ($this->form_validation->run() == FALSE)
		{
			$data['bulan'] = $this->namaBulan;
			$data['ubah']= $this->Penjualan_Model->detail_data($kd);
			$this->load->view('templates/header');
			$this->load->view('penjualan/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Penjualan_Model->ubah_data($kd);
			$this->session->set_flashdata('flash', 'DiUbah');
			redirect('DataPenjualan');
		}	
	}

	public function detail($id)
	{
		$data['bulan'] = $this->namaBulan;
		$data['detail'] = $this->Penjualan_Model->detail_data($id);
		$data['detail_data'] = $this->Penjualan_Model->detail_dataPenjualan($id);
 		$this->load->view('templates/header');
		$this->load->view('penjualan/detail', $data);
		$this->load->view('templates/footer');
	}

}
?>