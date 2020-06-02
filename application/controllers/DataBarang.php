<?php 	

/**
 * 
 */
class DataBarang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_Model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index()
	{
		$data['barang'] = $this->Barang_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('barang/index', $data);
		$this->load->view('templates/footer');
	}

	public function validation_form(){
		$this->form_validation->set_rules("nama_barang", "nama barang", "required");
		$this->form_validation->set_rules("stok", "stok", "required");
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->Barang_Model->tambah_data();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('DataBarang');
		}	
	}

	public function hapus($kd)
	{
		$this->Barang_Model->hapus_data($kd);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('DataBarang');	
	}

	public function ubah($kd)
	{
		$this->form_validation->set_rules("nama_barang", "nama barang", "required");
		$this->form_validation->set_rules("stok", "stok", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$data['ubah']= $this->Barang_Model->detail_data($kd);
			$this->load->view('templates/header');
			$this->load->view('barang/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Barang_Model->ubah_data($kd);
			$this->session->set_flashdata('flash', 'DiUbah');
			redirect('DataBarang');
		}	
	}


}
?>