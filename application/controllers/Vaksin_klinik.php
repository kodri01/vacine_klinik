<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_klinik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('vaksin_model');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function index()
	{
		$this->load->view('main');
	}

	public function signUp()
	{
		$nama = $this->input->post('nama_admin');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$data = array(
			'nama_admin' => $nama,
			'user' => $username,
			'pass' => $password,
		);
		if ($data != '') {
			$data = $this->vaksin_model->insert_data($data, 'admin');
		}
		echo "<script>alert('Pendaftaran Berhasil, Silahkan Login!!');</script>";
		$this->load->view('main');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'user' => $username,
			'pass' => md5($password)
		);
		$cek = $this->vaksin_model->cek_login("admin", $where)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("vaksin_klinik/beranda"));
		} else {
			echo "<script>alert('Username dan Password Anda Salah');</script>";
			$this->load->view('main');
		}
	}

	public function beranda()
	{
		$data['admin'] = $this->vaksin_model->data_admin();
		$data['vaksin'] = $this->vaksin_model->hasil_vaksin();
		$data['imun'] = $this->vaksin_model->hasil_imun();
		$data['user'] =  $this->vaksin_model->total_row_registrasi();
		$data['timun'] =  $this->vaksin_model->total_row_imunisasi();
		$data['total'] =  $this->vaksin_model->total_row_vaksin();
		$data['skrining'] =  $this->vaksin_model->total_row_skrining();
		$this->load->view('beranda', $data);
		$this->load->view('template/footer');
	}


	function delete($no_nik)
	{

		$this->vaksin_model->delete($no_nik);
		redirect('vaksin_klinik/data_pasien');
	}

	public function data_pasien()
	{

		$data['pasien'] = $this->vaksin_model->getAll();
		$this->load->view('pasien_vaksin', $data);
		$this->load->view('template/footer');
	}

	public function register()
	{
		$this->load->view('registrasi');
		$this->load->view('template/footer');
	}

	public function proses_register()
	{
		$this->form_validation->set_rules('nama', 'Nama Anda', 'required');
		$this->form_validation->set_rules('no_nik', 'Nomor KTP', 'required|min_length[12]');
		$this->form_validation->set_rules('email', 'Email Anda', 'required|valid_email');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|min_length[12]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registrasi');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'no_nik' => $this->input->post('no_nik'),
				'nama' => $this->input->post('nama'),
				'tgl_lahir' => $this->input->post('date'),
				'umur' => $this->input->post('umur'),
				'jenis_kelamin' => $this->input->post('jk'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'nama_ortu' => $this->input->post('ortu'),
				'alamat' => $this->input->post('alamat'),

			);
			if ($data != '') {
				$data = $this->vaksin_model->insert_data($data, 'registrasi');
			}
			echo "<script>alert('Anda Berhasil Registrasi');</script>";
			$this->load->view('registrasi');
		}
	}

	public function ubah_data($no_nik)
	{
		$data['update'] = $this->vaksin_model->tampil_registrasi($no_nik);
		$this->load->view('ubah_data', $data);
		$this->load->view('template/footer');
	}

	public function proses_update()
	{
		$this->form_validation->set_rules('nama', 'Nama Anda', 'required');
		$this->form_validation->set_rules('email', 'Email Anda', 'required|valid_email');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|min_length[12]');
		if ($this->form_validation->run() == FALSE) {
			$data['update'] = $this->vaksin_model->tampil_registrasi();
			$this->load->view('ubah_data', $data);
			$this->load->view('template/footer');
		} else {
			$no_nik = $this->input->post('no_nik');
			$nama = $this->input->post('nama');
			$tgl_lahir = $this->input->post('date');
			$umur = $this->input->post('umur');
			$jenis_kelamin = $this->input->post('jk');
			$email = $this->input->post('email');
			$no_telp = $this->input->post('no_telp');
			$ortu = $this->input->post('ortu');
			$alamat = $this->input->post('alamat');

			$data = array(
				// 'no_nik' => $no_nik,
				'nama' => $nama,
				'tgl_lahir' => $tgl_lahir,
				'umur' => $umur,
				'jenis_kelamin' => $jenis_kelamin,
				'email' => $email,
				'no_telp' => $no_telp,
				'nama_ortu' => $ortu,
				'alamat' => $alamat,

			);

			$where = array(
				'no_nik' => $no_nik
			);
			if ($data != '') {
				$data = $this->vaksin_model->update_register($where, $data, 'registrasi');
			}
			echo "<script>alert('Data Berhasil di ubah');</script>";

			$data['pasien'] = $this->vaksin_model->getAll();
			$this->load->view('pasien_vaksin', $data);
			$this->load->view('template/footer');
		}
	}

	public function skrining()
	{
		$data['skrining'] = $this->vaksin_model->data_register();
		$this->load->view('vaksin/skrining', $data);
		$this->load->view('template/footer');
	}

	public function cek_skrining()
	{
		$this->form_validation->set_rules('nama', 'Nama Anda', 'required');
		$this->form_validation->set_rules('no_nik', 'Nomor KTP', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['skrining'] = $this->vaksin_model->data_register();
			$this->load->view('vaksin/skrining', $data);
			$this->load->view('template/footer');
		} else {
			$no_nik = $this->input->post('no_nik');
			$suhu = $this->input->post('suhu');
			$darah = $this->input->post('darah');
			$quest1 = $this->input->post('quest1');
			$quest2 = $this->input->post('quest2');
			$quest3 = $this->input->post('quest3');
			$quest4 = $this->input->post('quest4');
			$quest5 = $this->input->post('quest5');
			$quest6 = $this->input->post('quest6');
			$quest7 = $this->input->post('quest7');
			$keterangan = $this->input->post('keterangan');

			if ($suhu > 37.5) {
				$keterangan = "Vaksinasi di Tunda Sampai Sembuh";
			} elseif ($darah > 140) {
				$keterangan = "Vaksinasi di Ulangi lagi 10 Menit Ke Depan";
			} elseif ($quest1 == "Ya") {
				$keterangan = "Vaksinasi di Tunda";
			} elseif ($quest2 == "Ya") {
				$keterangan = "Vaksinasi di Tunda Sampai 3 Bulan Setelah Sembuh";
			} elseif ($quest3 == "Ya") {
				$keterangan = "Vaksinasi di Tunda Selama 2 Minggu";
			} elseif ($quest4 == "Ya") {
				$keterangan = "Vaksinasi di Tunda, dianjurkan Untuk Berobat";
			} elseif ($quest5 == "Ya" or $quest6 == "Ya") {
				$keterangan = "Vaksinasi di Tunda Sampai Diperboleh oleh Dokter yang merawat";
			} elseif ($quest7 == "Ya") {
				$keterangan = "Vaksinasi dilakukan di Rumah Sakit";
			} else {
				$keterangan = "Vaksinasi diperbolehkan. ";
			}
			$data = array(
				'no_nik' => $no_nik,
				'suhu' => $suhu,
				'tekanan_darah' =>  $darah,
				'quest1' => $quest1,
				'quest2' => $quest2,
				'quest3' => $quest3,
				'quest4' => $quest4,
				'quest5' => $quest5,
				'quest6' => $quest6,
				'quest7' => $quest7,
				'keterangan' => $keterangan,
			);
			$data = $this->vaksin_model->insert_data($data, 'skrining');
			return redirect('vaksin_klinik/hasil_skrining');
		}
	}



	public function cetak_skrining($no_nik)
	{
		$data['user'] = $this->vaksin_model->cetak_skrining($no_nik);
		$data['admin'] = $this->vaksin_model->data_admin();
		$this->load->view('cetak/cetak_skrining', $data);
	}

	public function vaksinasi()
	{
		$data['vaksin'] = $this->vaksin_model->data_register();
		$this->load->view('vaksin/vaksinasi', $data);
		$this->load->view('template/footer');
	}

	public function cek_vaksinasi()
	{
		$this->form_validation->set_rules('nama', 'Nama Anda', 'required');
		$this->form_validation->set_rules('no_nik', 'Nomor KTP', 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('vaksin/vaksinasi');
			$this->load->view('template/footer');
		} else {
			$no_nik = $this->input->post('no_nik');
			$date_vaksin = $this->input->post('date_vaksin');
			$jam_vaksin = $this->input->post('jam_vaksin');
			$jvaksin = $this->input->post('jenis_vaksin');
			$fase_dosis = $this->input->post('dosis');
			$takaranan_dosis = $this->input->post('takaran_dosis');
			$keterangan = $this->input->post('vaksin_ket');
			$no_batch = $this->input->post('no_batch');
			$no_tiket = $this->input->post('no_tiket');

			if ($jvaksin == "Sinovac") {
				$keterangan = "Telah diberikan Vaksin Sinovac Untuk Dosis Pertama";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Astra Zeneca" && $takaranan_dosis == "Separuh Dosis") {
				$keterangan = "Telah diberikan Vaksin Astra Zeneca dengan dosis 0.25ml";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Astra Zeneca" && $takaranan_dosis == "Dosis Penuh") {
				$keterangan = "Telah diberikan Vaksin Astra Zeneca dengan dosis 0.5ml";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Pfizer" && $takaranan_dosis == "Separuh Dosis") {
				$keterangan = "Telah diberikan Vaksin Pfizer dengan dosis 0.15ml";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Pfizer" && $takaranan_dosis == "Dosis Penuh") {
				$keterangan = "Telah diberikan Vaksin Pfizer dengan dosis 0.3ml";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Moderna" && $takaranan_dosis == "Separuh Dosis") {
				$keterangan = "Telah diberikan Vaksin Moderna dengan dosis 0.25ml";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Moderna" && $takaranan_dosis == "Dosis Penuh") {
				$keterangan = "Telah diberikan Vaksin Moderna dengan dosis 0.5ml";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Janssen (J&J)") {
				$keterangan = "Telah diberikan Vaksin Janssen (J&J) Untuk Dosis Pertama";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			} elseif ($jvaksin == "Sinopharm") {
				$keterangan = "Telah diberikan Vaksin Sinopharm dengan dosis 0.5ml";
				$no_batch = random_string('numeric', 13);
				$no_tiket = random_string('alnum', 10);
			}

			$data = array(
				'no_nik' => $no_nik,
				'tgl_vaksin' => $date_vaksin,
				'jam_vaksin' => $jam_vaksin,
				'paket_vaksin' => $jvaksin,
				'fase_vaksin' => $fase_dosis,
				'dosis' => $takaranan_dosis,
				'no_batch' => $no_batch,
				'no_tiket' => $no_tiket,
				'vaksin_ket' => $keterangan
			);

			$data = $this->vaksin_model->insert_data($data, 'vaksin');
			return redirect('vaksin_klinik/hasil_vaksin');
		}
	}

	public function hasil_vaksin()
	{
		$data['vaksin'] = $this->vaksin_model->hasil_vaksin();
		$this->load->view('vaksin/hasil_vaksin', $data);
		$this->load->view('template/footer');
	}

	public function hasil_skrining()
	{
		$data['pasien'] = $this->vaksin_model->hasil_skrining();
		$this->load->view('vaksin/hasil_skrining', $data);
		$this->load->view('template/footer');
	}

	public function cetak_vaksin($no_nik)
	{
		$data['user'] = $this->vaksin_model->cetak_vaksin($no_nik);
		$data['admin'] = $this->vaksin_model->data_admin();
		$this->load->view('cetak/cetak_vaksin', $data);
	}

	public function vaksin_anak()
	{
		$data['vaksin'] = $this->vaksin_model->data_register();
		$this->load->view('vaksin/vaksin_anak', $data);
		$this->load->view('template/footer');
	}

	public function cetak_biaya()
	{
		$data['user'] = $this->vaksin_model->data_register();
		$data['vaksin'] = $this->vaksin_model->data_vaksin();
		$data['transaksi'] = $this->vaksin_model->data_transaksi();
		$this->load->view('cetak/cetak_biaya', $data);
	}

	public function biaya()
	{
		$data['user'] = $this->vaksin_model->data_register();
		$data['vaksin'] = $this->vaksin_model->vaksin_anak();
		$data['transaksi'] = $this->vaksin_model->data_transaksi();
		$this->load->view('vaksin/bayar', $data);
		$this->load->view('template/footer');
	}


	public function bayar_vaksin()
	{
		// $no_nik = $this->input->post('no_nik');
		// // $no_bayar = $this->input->post('no_pembayaran');
		// $date_vaksin = $this->input->post('date_vaksin');
		// $jam_vaksin = $this->input->post('jam_vaksin');
		// $jvaksin = $this->input->post('jenis_vaksin');
		// $jenis_paket = $this->input->post('paket_vaksin');
		// $harga = $this->input->post('harga');
		// $diskon = $this->input->post('potongan');
		$total_harga = $this->input->post('total_harga');
		$bayar = $this->input->post('bayar_cash');
		$kembalian = $this->input->post('kembalian');

		// if ($jvaksin == "BCG" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 250000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "BCG" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 500000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "BCG" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1200000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Campak" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 250000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Campak" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 500000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Campak" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1200000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Hepatitis A" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 350000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Hepatitis A" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 550000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Hepatitis A" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1300000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Hepatitis B" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 300000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Hepatitis B" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 600000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Hepatitis B" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1250000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Influenza" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 300000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Influenza" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 600000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Influenza" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1250000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "IPD/PCV" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 550000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "IPD/PCV" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 1300000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "IPD/PCV" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1600000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Japanese Encapalitis" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 250000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Japanese Encapalitis" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 500000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Japanese Encapalitis" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1200000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Rotavirus" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 350000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Rotavirus" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 500000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Rotavirus" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1250000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Rubella" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 550000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Rubella" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 1200000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Rubella" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1750000;
		// 	$diskon = 20;
		// } elseif ($jvaksin == "Varicella" && $jenis_paket == "0 - 6 Bulan") {
		// 	$harga = 250000;
		// 	$diskon = 10;
		// } elseif ($jvaksin == "Varicella" && $jenis_paket == "7 - 12 Bulan") {
		// 	$harga = 500000;
		// 	$diskon = 15;
		// } elseif ($jvaksin == "Varicella" && $jenis_paket == "0 - 12 Bulan") {
		// 	$harga = 1200000;
		// 	$diskon = 20;
		// }
		// $total_harga =  $harga - ($harga * ($diskon / 100));
		$kembalian =  ((int) $bayar - (int)$total_harga);

		$data = array(
			'uang_bayar' => $bayar,
			'kembalian' => $kembalian,
		);

		$data = $this->vaksin_model->update_data($data, 'transaksi');
		return redirect('vaksin_klinik/cetak_biaya');
	}

	public function cek_biaya()
	{
		$this->form_validation->set_rules('nama', 'Nama Anda', 'required');
		$this->form_validation->set_rules('no_nik', 'Nomor KTP', 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('vaksin/vaksin_anak');
			$this->load->view('template/footer');
		} else {
			$no_nik = $this->input->post('no_nik');
			$no_bayar = $this->input->post('no_pembayaran');
			$date_vaksin = $this->input->post('date_vaksin');
			$jam_vaksin = $this->input->post('jam_vaksin');
			$jvaksin = $this->input->post('jenis_vaksin');
			$jenis_paket = $this->input->post('paket_vaksin');
			$harga = $this->input->post('harga');
			$diskon = $this->input->post('potongan');
			$total_harga = $this->input->post('total_harga');
			// $bayar = $this->input->post('bayar_cash');
			// $kembalian = $this->input->post('kembalian');

			if ($jvaksin == "BCG" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 250000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "BCG" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 500000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "BCG" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1200000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Campak" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 250000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Campak" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 500000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Campak" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1200000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Hepatitis A" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 350000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Hepatitis A" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 550000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Hepatitis A" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1300000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Hepatitis B" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 300000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Hepatitis B" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 600000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Hepatitis B" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1250000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Influenza" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 300000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Influenza" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 600000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Influenza" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1250000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "IPD/PCV" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 550000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "IPD/PCV" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 1300000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "IPD/PCV" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1600000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Japanese Encapalitis" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 250000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Japanese Encapalitis" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 500000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Japanese Encapalitis" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1200000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Rotavirus" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 350000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Rotavirus" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 500000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Rotavirus" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1250000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Rubella" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 550000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Rubella" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 1200000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Rubella" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1750000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Varicella" && $jenis_paket == "0 - 6 Bulan") {
				$harga = 250000;
				$diskon = 10;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Varicella" && $jenis_paket == "7 - 12 Bulan") {
				$harga = 500000;
				$diskon = 15;
				$no_bayar = random_string('nozero', 10);
			} elseif ($jvaksin == "Varicella" && $jenis_paket == "0 - 12 Bulan") {
				$harga = 1200000;
				$diskon = 20;
				$no_bayar = random_string('nozero', 10);
			}
			$total_harga =  $harga - ($harga * ($diskon / 100));
			// $kembalian = (int) $bayar - (int)$total_harga;

			$data = array(
				'no_nik' => $no_nik,
				'tgl_imun' => $date_vaksin,
				'jam_imun' => $jam_vaksin,
				'paket_imun' => $jvaksin,
			);
			$dataa = array(
				'no_nik' => $no_nik,
				'no_pembayaran' => $no_bayar,
				'jenis_paket' => $jenis_paket,
				'harga_paket' => $harga,
				'diskon' => $diskon,
				'total_biaya' => $total_harga,
				// 'uang_bayar' => $bayar,
				// 'kembalian' => $kembalian,
			);

			$data = $this->vaksin_model->insert_data($data, 'imunisasi');
			$data = $this->vaksin_model->insert_data($dataa, 'transaksi');
			return redirect('vaksin_klinik/biaya');
		}
	}
}