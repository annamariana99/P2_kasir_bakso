<?php 

// koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'kasir_anna');  

// summon admin
function summon_admin()
{
	global $koneksi;
	$id = $_SESSION['idkaskit'];
	return mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id ='$id'");
}

// -------------------------------------USER SECTION--------------------------------------------------------------------
// select user by admin
function select_user()
{
	global $koneksi;
	if (isset($_POST['go'])) {
		$cari = $_POST['cari'];
		return mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nama LIKE '%".$cari."%'");
	}else{
		return mysqli_query($koneksi, "SELECT * FROM tb_user");
	}
}

function select_user_2()
{
	global $koneksi;
	$query =  mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM tb_user ORDER BY id DESC");
	$key = mysqli_fetch_array($query);
	echo $key['jadmin'];
}

// Insert user
function insert_user()
{
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$foto = $_FILES['foto']['name'];

	// cek username
	$cek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username ='$username'");
	$row = mysqli_fetch_row($cek);

	if ($row) {
		echo "username  '%".$username."%' sudah ada";
	}else if($foto != ""){
		
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
   		$nama_file_baru = $angka_acak.'-'.$foto;
   		    if (in_array($ekstensi, $allowed_ext) 	=== true) {
      			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
      			$result = mysqli_query($koneksi, "INSERT INTO tb_user SET username='$username', password='$password', nama='$nama', level='$level', foto='$nama_file_baru'");
      			
    }

	}else if($foto==""){
		return mysqli_query($koneksi, "INSERT INTO tb_user SET username='$username', password='$password', nama='$nama', level='$level'");
	}
}

// delete user
function delete_user()
{
	global $koneksi;
	$id = $_POST['id'];
	$cekimg = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id'");
	$row = mysqli_fetch_array($cekimg);

	// hapus gambar
	$foto = $row['foto'];
	unlink("img/$foto");
	return mysqli_query($koneksi, "DELETE FROM tb_user WHERE id='$id'");
}

// update user
function update_user()
{
	global $koneksi;
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$foto = $_FILES['foto']['name'];

	// unlink
	$unlink = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id'");
	$row = mysqli_fetch_array($unlink);

	$hapus_foto = $row['foto'];
	
	// update
	if(isset($_POST['ubahfoto']))
	{
		if ($row['foto']=="") 
		{
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		if (in_array($ekstensi, $allowed_ext) === true) {
		      		move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      		$result =  mysqli_query($koneksi, "UPDATE tb_user SET username='$username', password='$password', nama='$nama', level='$level', foto='$nama_file_baru' WHERE id='$id'");
		   		}
			}
		}else if ($row['foto']!="") {
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		if (in_array($ekstensi, $allowed_ext) === true) {
		      		move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      		$result =  mysqli_query($koneksi, "UPDATE tb_user SET username='$username', password='$password', nama='$nama', level='$level', foto='$nama_file_baru' WHERE id='$id'");
		      		if ($result) {
		      			unlink("img/$hapus_foto");
		      		}
		   		}
			}
		}	
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE tb_user SET username='$username', password='$password', nama='$nama', level='$level' WHERE id='$id'");
	}
}

// ------------------------------------------------------------PRODUK SECTION----------------------------------------------------\\

function insert_produk()
{
	global $koneksi;
	$kdproduk = $_POST['kdproduk'];
	$nm_produk = $_POST['nm_produk'];
	$kategori = $_POST['kategori'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];

	return mysqli_query($koneksi, "INSERT INTO tb_produk SET kdproduk='$kdproduk', nm_produk='$nm_produk', kategori='$kategori', stok='$stok', harga='$harga'");
}

function delete_produk()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id='$id'");
}

function update_produk()
{
	global $koneksi;
	$id = $_POST['id'];
	$kdproduk = $_POST['kdproduk'];
	$nm_produk = $_POST['nm_produk'];
	$kategori = $_POST['kategori'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];

	return mysqli_query($koneksi, "UPDATE tb_produk SET kdproduk='$kdproduk', nm_produk='$nm_produk', kategori='$kategori', stok='$stok', harga='$harga' WHERE id='$id'");
}

function select_produk()
{
	global $koneksi;
	$query = mysqli_query($koneksi, "SELECT count(id) AS jproduk FROM tb_produk");
	$row = mysqli_fetch_array($query);
	echo $row['jproduk'];
}

// ------------------------------------------------KATEGORI SECTION---------------------------------------------------------------\\\

function insert_kategori()
{
	global $koneksi;
	$kategori = $_POST['kategori'];
	return mysqli_query($koneksi, "INSERT INTO tb_kat SET kategori='$kategori'");
}

function hapus_kategori()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM tb_kat WHERE id='$id'");
}

function update_kategori()
{
	global $koneksi;
	$id = $_POST['id'];
	$kategori = $_POST['kategori'];

	return mysqli_query($koneksi, "UPDATE tb_kat SET kategori='$kategori' WHERE id='$id'");
}

// -----------------------------------------CALL TRANSACTION-------------------------------------------------------------------------\\
function jumlah_saldo()
{
	global $koneksi;
	$jumlah = mysqli_query($koneksi, "SELECT sum(total) as jtotal from laporan_penjualan");
	$row = mysqli_fetch_array($jumlah);
	echo rupiah($row['jtotal']);
}

function jumlah_terjual()
{
	global $koneksi;
	$jumlah = mysqli_query($koneksi, "SELECT sum(jumlah_beli) as jbeli from laporan_penjualan");
	$row = mysqli_fetch_array($jumlah);
	echo $row['jbeli'];
}

// Hapus laporan
function hapus_laporan()
{
	global $koneksi;
	return mysqli_query($koneksi, "DELETE FROM laporan_penjualan");
}

// url
function url()
{
	return $url = "//localhost/web-kasir/vendors/";
}

function rupiah($angka){
	$hasil = "Rp. ". number_format($angka,2,',','.');
	return $hasil;
}

?>