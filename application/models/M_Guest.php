<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guest extends CI_Model {

	public function getDataStasiun(){
		return $this->db->get('stasiun');
	}

	public function cari_tiket($data){
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->where($data);
		$this->db->like('tgl_berangkat', $this->input->post('tanggal'));
		$this->db->from('jadwal');
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get();
	}

	public function getDataInfoPesan($id){
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->where('jadwal.id', $id);
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get('jadwal');
	}

	public function getTiket(){
		return $this->db->get('tiket');
	}

	public function insertPenumpang($data){
		return $this->db->insert('penumpang', $data);
	}

	public function insertPemesan($data){
		return $this->db->insert('tiket', $data);
	}

	public function insertPembayaran($data){
		return $this->db->insert('pembayaran', $data);
	}

	public function getPembayaran(){
		return $this->db->get('pembayaran');
	}

	public function getPembayaranWhere($kode){
		$this->db->where('no_pembayaran', $kode);
		return $this->db->get("pembayaran");
	}

	public function cekKonfirmasi($nomor){
		$this->db->where('nomor_tiket', $nomor);
		return $this->db->get('penumpang');
	}

	public function insertBukti($nama, $no){
		$data = array(
			'bukti'		=> $nama,
			'status'	=> 1
		);
		$this->db->where('no_pembayaran', $no);
		return $this->db->update("pembayaran", $data);
	}

	public function PilihKursi($data, $no){
		$this->db->where('no_pembayaran', $no);
		return $this->db->update("pembayaran", $data);
	}

	public function PilihGerbong($data, $no, $nama){
		$this->db->where('nomor_tiket', $no);
		$this->db->where('nama', $nama);
		return $this->db->update("penumpang", $data);
	}

	public function getTiketWhere($tiket){
		return $this->db->get_where('tiket', array('nomor_tiket' => $tiket));
	}

	public function validasiGerbong($gerbong,$bagian,$kursi,$id_jadwal){
		$this->db->where('gerbong', $gerbong);
		$this->db->where('bagian', $bagian);
		$this->db->where('kursi', $kursi);
		$this->db->where('tiket.id_jadwal', $id_jadwal);
		$this->db->join('tiket','tiket.nomor_tiket=penumpang.nomor_tiket');
		return $this->db->get('penumpang');
	}

	public function getPrint($no_tiket){
		$this->db->select('*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->join('jadwal','jadwal.id=tiket.id_jadwal');
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		$this->db->where('nomor_tiket', $no_tiket);
		return $this->db->get('tiket');
	}

	public function getKursiWhere($bagian, $no_tiket, $id_jadwal){
		$this->db->select('*, kursi.kursi AS KURSI');
		$this->db->where('kursi.id_jadwal', $id_jadwal);
		$this->db->where('kursi.bagian', $bagian);
		$this->db->where('kursi.status', 0);
		return $this->db->get('kursi');
		
	}

	public function updateKursi($id){
		$data = array(
			'status' => 1
		);
		$this->db->where('id', $id);
		return $this->db->update('kursi', $data);
	}

}

