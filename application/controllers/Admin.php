<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function keHalamanLogin(){
		$this->load->view('admin/login');
	}

	public function login(){
		$data = array(
			'username' => $this->input->post('username'), 
			'password' => sha1($this->input->post('password'))
		);


		$cek = $this->M_Admin->cekLogin($data);

		if ($cek > 0) { // Jika $cek > 0
			$sess = array(
				'status' => TRUE,
				'level'  => 'admin'
			);

			// SET USERDATA / SESSION 
			$this->session->set_userdata($sess);

			redirect(base_url('admin/dashboard'));

		}else{

			redirect(base_url('login'));

		}

	}

	public function logout(){
		session_destroy();
		redirect(base_url());
	}

	public function keHalamanDashboard(){
		if ($this->session->status === TRUE) {

			$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

			$this->load->view('admin/dashboard', $data);

		}else{
			redirect(base_url('login'));
		}
		
	}

	public function tambah_stasiun(){

		$nama = $this->input->post('stasiun');

		$input = $this->M_Admin->tambah_stasiun($nama);

		redirect(base_url('admin/dashboard'));

	}

	public function hapus_stasiun($id){
		$delete = $this->M_Admin->delete_stasiun($id);

		redirect(base_url('admin/dashboard'));
	}

	public function keHalamanEditStasiun($id){
		$data['data_stasiun'] = $this->M_Admin->getDataEditStasiun($id)->row();

		$this->load->view('admin/edit_stasiun', $data);
	}

	public function edit_stasiun(){
		$nama = $this->input->post('nama_stasiun');

		$edit = $this->M_Admin->edit_stasiun($nama);

		redirect(base_url('admin/dashboard'));
	}

	public function keHalamanKelolaGerbong(){
		$data['kursi'] = $this->M_Admin->getKursi()->result();
		$data['jadwal'] = $this->M_Admin->getJadwal()->result();

		$this->load->view('admin/kelola_gerbong', $data);
	}

	public function keHalamanKelolaJadwal(){
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

		$data['jadwal'] = $this->M_Admin->getJadwal()->result();

		$this->load->view('admin/kelola_jadwal', $data);
	}

	public function tambah_jadwal(){
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'), 
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'tgl_berangkat' => $this->input->post('tgl_berangkat'), 
			'tgl_sampai' => $this->input->post('tgl_sampai'), 
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);

		$this->M_Admin->tambah_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

	public function hapusJadwal($id){
		$this->M_Admin->hapusJadwal($id);
		redirect(base_url('admin/dashboard/kelola-jadwal'));
	}

	public function keHalamanEditJadwal($id){
		$data['data_edit'] = $this->M_Admin->getDataEditJadwal($id)->row();
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

		$this->load->view('admin/edit_jadwal', $data);
	}

	public function edit_jadwal(){
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'), 
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'tgl_berangkat' => $this->input->post('tgl_berangkat'), 
			'tgl_sampai' => $this->input->post('tgl_sampai'), 
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);

		$this->M_Admin->edit_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

	public function keHalamanKonfirPem(){
		$data['list']	= $this->M_Admin->getKonfirmasiPembayaran()->result();

		$this->load->view('admin/konfirmasi_pembayaran', $data);
	}

	public function verifikasiPembayaran($id){
		$update = $this->M_Admin->updatePembayaran($id);

		if($update){
			$this->session->set_flashdata('pesan','Berhasil Melakukan Verifikasi!');
			redirect('admin/konfirmasi-pembayaran');
		}else{
			echo "gagal";
		}
	}

	public function prosesBerangkat($id){
		$update = $this->M_Admin->prosesBerangkat($id);

		if($update){
			$this->session->set_flashdata('pesan','Berhasil Mengubah Status Jadwal');
			redirect('admin/dashboard/kelola-jadwal');
		}else{
			echo "Gagal";
		}
	}

	public function tambahKursi(){
		$jumlah = $this->input->post('jumlah');
		$bagian = $this->input->post('bagian');
		$id_jadwal = $this->input->post('jadwal');
		$insert = $this->M_Admin->insertKursi($jumlah, $bagian, $id_jadwal);

		if($insert){
			$this->session->set_flashdata('pesan','Berhasil Menambah '.$jumlah.' Kursi pada Bagian '.$bagian.' di Jadwal '.$jadwal.' ');
			redirect('admin/dashboard/kelola-gerbong');
		}else{
			echo "Gagal";
		}
	}

	// Truncate
	public function hapus_semua($table){
		$truncate = $this->db->truncate($table);

		if($table === 'stasiun'):

			$redirect = 'admin/dashboard';

		elseif($table === 'jadwal'):

			$redirect = 'admin/dashboard/kelola-jadwal';

		elseif($table === 'kursi'):

			$redirect = 'admin/dashboard/kelola-gerbong';

		endif;


		if($truncate){
			$this->session->set_flashdata('pesan','Berhasil Menghapus Data '.$table);
			redirect($redirect);
		}else{
			echo "Gagal";
		}
	}

}
