<?php 

session_start();
include_once 'sesi.php';
$nama_app = " Kasir";
$modul = (isset($_GET['m']))?$_GET['m']:"awal";

switch ($modul) {
	
	case 'awal': default: $judul="Beranda Admin $nama_app"; include "awal.php"; break;
	case 'admin': $judul="Menu User $nama_app"; include 'modul/admin/index.php';  break;
	case 'produk': $judul="Menu Produk $nama_app"; include 'modul/produk/index.php'; break;
	case 'kategori': $judul="Menu Kategori $nama_app"; include 'modul/kategori/index.php'; break;
	case 'laporan': $judul="Menu laporan $nama_app"; include 'modul/laporan/index.php';	 			
	
	
}


 ?>