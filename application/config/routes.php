<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Truncate

$route['hapus/semua/(:any)'] = 'admin/hapus_semua/$1';

$route['print'] = 'guest/print';
$route['PilihGerbong'] = 'guest/PilihGerbong';

$route['kirimKonfirmasi'] = 'guest/kirimKonfirmasi';
$route['cekKonfirmasi'] = 'guest/cekKonfirmasi';
$route['pembayaran'] = 'guest/keHalamanPembayaran';

$route['pesanTiket'] = 'guest/pesanTiket';
$route['pesan/(:any)'] = 'guest/pesan/$1';

$route['tambahKursi'] = 'admin/tambahKursi';
$route['editJadwal'] = 'admin/edit_jadwal';
$route['admin/dashboard/berangkat-jadwal/(:any)'] = 'admin/prosesBerangkat/$1';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'admin/keHalamanEditJadwal/$1';
$route['hapusJadwal/(:any)'] = 'admin/hapusJadwal/$1';
$route['tambahJadwal'] = 'admin/tambah_jadwal';
$route['admin/dashboard/kelola-jadwal'] = 'admin/keHalamanKelolaJadwal';
$route['admin/dashboard/kelola-gerbong'] = 'admin/keHalamanKelolaGerbong';

$route['admin/konfirmasi-pembayaran'] = 'admin/keHalamanKonfirPem';
$route['Verifikasi/(:num)'] = 'admin/verifikasiPembayaran/$1';


$route['cariTiket'] = 'guest/cari_tiket';

$route['editStasiun'] = 'admin/edit_stasiun';
$route['admin/dashboard/edit/(:any)'] = 'admin/keHalamanEditStasiun/$1';

$route['hapusStasiun/(:any)'] = 'admin/hapus_stasiun/$1';
$route['tambahStasiun'] = 'admin/tambah_stasiun';
$route['admin/dashboard'] = 'admin/keHalamanDashboard';

$route['logout'] = 'admin/logout';
$route['prosesLogin'] = 'admin/login';
$route['login'] = 'admin/keHalamanLogin';

$route['konfirmasi'] = 'guest/keHalamanKonfirmasi';

$route['default_controller'] = 'guest/keHalamanDepan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
