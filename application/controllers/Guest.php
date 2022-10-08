<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function keHalamanDepan(){
		$data['judul'] = 'Halaman Depan';
		$data['stasiun'] = $this->M_Guest->getDataStasiun()->result();

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}

	public function keHalamanKonfirmasi(){
		$data['judul'] = 'Halaman Konfirmasi';

		if(isset($_GET['kode'])):
			$kode = $_GET['kode'];
			$data['no_tiket'] = $this->M_Guest->getPembayaranWhere($kode)->row();
			$data['detail'] = $this->M_Guest->cekKonfirmasi($data['no_tiket']->no_tiket)->result();
			$tiket = $this->M_Guest->getTiketWhere($data['no_tiket']->no_tiket)->row();

			$data['bagian_a'] = $this->M_Guest->getKursiWhere('a',$data['no_tiket']->no_tiket,$tiket->id_jadwal)->result();
			$data['bagian_b'] = $this->M_Guest->getKursiWhere('b',$data['no_tiket']->no_tiket,$tiket->id_jadwal)->result();
		endif;

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_konfirmasi');
		$this->load->view('guest/template/footer');
	}
	
	public function cari_tiket(){
		$data = array(
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'),
			'status' => 0
		);

		$data['tiket']  = $this->M_Guest->cari_tiket($data)->result();
		$data['penumpang'] = $this->input->post('jumlah');


		$data['judul'] = 'Halaman Depan';
		$data['stasiun'] = $this->M_Guest->getDataStasiun()->result();

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}

	public function pesan($id){
		$data['judul'] = 'Formulir Data Diri';

		$data['info'] = $this->M_Guest->getDataInfoPesan($id)->row();
		$data['id_jadwal'] = $id;

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/data_diri');
		$this->load->view('guest/template/footer');
	}

	public function pesanTiket(){
		$penumpang = $this->input->post('penumpang');

		// Generate No Pembayaran
		$cek = $this->M_Guest->getPembayaran()->num_rows()+1;

		$no_pembayaran = 'AC246'.$cek;
		
		$harga = $this->input->post('harga');

		$total_pembayaran = $penumpang*$harga;

		// Input Pembayaran
		$no_tiket = 'T00'.$cek;

		$data = array(
			'no_pembayaran' => $no_pembayaran,
			'no_tiket' => $no_tiket,
			'total_pembayaran' => $total_pembayaran,
			'status' => 0
		);

		$this->M_Guest->insertPembayaran($data);


		// Generate Nomor Tiket
		$cek = $this->M_Guest->getTiket()->num_rows()+1;

		

		// Input data Penumpang
		for ($i=1;$i<=$penumpang;$i++) { 
			$data = array(
				'nomor_tiket' => $no_tiket,
				'nama' => $this->input->post('nama'.$i),
				'no_identitas' => $this->input->post('identitas'.$i)
			);

			$this->M_Guest->insertPenumpang($data);
		}

		// input Data Pemesan
		$data = array(
			'nomor_tiket' => $no_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'), 
			'email' => $this->input->post('email'), 
			'no_telepon' => $this->input->post('no_telp'), 
			'alamat' => $this->input->post('alamat'),
			'tanggal' => date('Y-m-d h:i:s')

		);

		$this->M_Guest->insertPemesan($data);

		$this->session->set_flashdata('nomor', $no_pembayaran);
		$this->session->set_flashdata('total', $total_pembayaran);
		redirect('pembayaran', $total_pembayaran);
		
	}

	public function keHalamanPembayaran(){
		$data['judul'] = 'Konfirmasi Pembayaran';


		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/pembayaran');
		$this->load->view('guest/template/footer');
	}

	public function cekKonfirmasi(){
		$kode = $this->input->post('kode');

		redirect("konfirmasi?kode=".$kode);

	}

	public function PilihGerbong(){
		$kodenya = $this->input->post('kode');
		$nama = $this->input->post('nama');

		$kode = $this->M_Guest->getPembayaranWhere($kodenya)->row();

		// Deklarasi
		$gerbong = $this->input->post('gerbong');
		$bagian = $this->input->post('bagian');
		$kursi = $this->input->post('kursi');

		$data = array(
			'gerbong'	=> $gerbong,
			'bagian'	=> $bagian,
			'kursi'		=> $kursi,
		);

		// Validasi Kursi
		$tiket = $this->M_Guest->getTiketWhere($kode->no_tiket)->row();
		$cek = $this->M_Guest->validasiGerbong($gerbong,$bagian,$kursi,$tiket->id_jadwal)->num_rows();

		if($cek > 0){ // Jika ada
			$this->session->set_flashdata('alert','Maaf Gerbong, Bagian, dan Kursi sudah tidak tersedia ');
			redirect('konfirmasi?kode='.$kodenya);
		}else{ // Jika tidak ada
			$update = $this->M_Guest->PilihGerbong($data, $kode->no_tiket, $nama );
		}


		// Update Kursi
		$tiket = $this->M_Guest->getTiketWhere($kode->no_tiket)->row();
		$update = $this->M_Guest->updateKursi($kursi);

		if($update){
			redirect('konfirmasi?kode='.$kodenya);
		}else{
			echo "Gagal";
		}
		

	}

	public function kirimKonfirmasi(){
		// Uploading Gambar
		$config['upload_path']          = './assets/bukti/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048; // 2MB

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
			$data = $this->upload->data();
			$fileName = $data['file_name'];
			
			$no = $this->input->post('no_pembayaran');
			$this->M_Guest->insertBukti($fileName, $no );

			$this->session->set_flashdata("pesan","Berhasil Mengirim Bukti! Silahkan Cek Kembali 12 Jam Kemudian. Untuk Mengecek Pembayaran Anda");
			redirect("konfirmasi");
		}
	}

	
	
}
