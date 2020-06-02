<?php 

/**
 * 
 */
class Penjualan_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('penjualan')->result();
	}
	public function getAllDataKhusus()
	{
		return $this->db->get('penjualan')->result_array();
	}

	public function getLastId()
	{
		$this->db->order_by('id_penjualan', 'DESC');
		return $this->db->get('penjualan')->row();
	}
	public function tambah_data()
	{
		$hasil = 0;
		$barang = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah');

		for ($i=0; $i < sizeof($barang); $i++) {
			$hasil += $jumlah[$i];
			$data = array(
				'id_penjualan' => $this->input->post('id_penjualan', true),
				'id_barang' => $barang[$i],
				'jumlah' => $jumlah[$i]
			);
			$this->db->insert('detail_penjualan', $data);
		}

		$data = array(
			'id_penjualan' => $this->input->post('id_penjualan', true),
			'tahun' => $this->input->post('tahun', true),
			'bulan' => $this->input->post('bulan', true),
			'hasil_penjualan' => $hasil
		);
		$this->db->insert('penjualan', $data);
	}

	public function ubah_data($kd)
	{
		$data = array(
			'tahun' => $this->input->post('tahun', true),
			'bulan' => $this->input->post('bulan', true),
			'hasil_penjualan' => $this->input->post('hasil_penjualan', true),
		);
		$this->db->where('id_penjualan', $kd);
		$this->db->update('penjualan', $data);
	}

	public function hapus_data($kode)
	{
		$this->db->delete('penjualan', ['id_penjualan' => $kode]);
		$this->db->delete('detail_penjualan', ['id_penjualan' => $kode]);
	}

	public function detail_data($kode)
	{
		return $this->db->get_where('penjualan', ['id_penjualan' => $kode]) ->row_array(); 
	}

	public function detail_dataPenjualan($kd)
	{
		$this->db->select("*");
		$this->db->from("detail_penjualan");
		$this->db->join("barang", "detail_penjualan.id_barang = barang.id_barang");
		$this->db->where('detail_penjualan.id_penjualan', $kd);
		return $this->db->get()->result(); 
	}

	public function hitung(){
		// $this->db->query("SELECT tahun, bulan, SUM(hasil_penjualan) FROM penjualan GROUP BY tahun, bulan ORDER BY tahun, bulan ASC");

		$this->db->select("tahun, bulan, sum(hasil_penjualan) as hasil");
		$this->db->from("penjualan");
		$this->db->order_by('tahun', 'ASC');
		$this->db->order_by('bulan', 'ASC');
		$this->db->group_by(array('tahun', 'bulan'));
		// $this->db->group_by('bulan', 'ASC');

		return $this->db->get()->result();
	}





}
?>