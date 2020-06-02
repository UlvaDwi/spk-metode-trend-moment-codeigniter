<?php 

/**
 * 
 */
class Peramalan_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('peramalan')->result();
	}
	public function getAllDataKhusus()
	{
		return $this->db->get('peramalan')->result_array();
	}

	public function tambah_data($hasil)
	{
		$data = array(
			'tahun' => $this->input->post('tahun', true),
			'bulan' => $this->input->post('bulan', true),
			'hasil' => $hasil
		);
		

		$this->db->insert('peramalan', $data);
	}

	public function hapus_data($kode)
	{
		$this->db->delete('peramalan', ['id_peramalan' => $kode]);
	}

	


}
?>