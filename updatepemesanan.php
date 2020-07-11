<?php 
include('template/top.php');
include('template/navigasi.php');
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['username'])) {
 	header('Location:login.php');
 }
?>
<div id="main">
	<div class="content">
		<?php
		include('koneksi/conn.php');
		$nopsn=$_POST['no_pesan'];
		$nmtpu=$_POST['nama_tpu'];
		$idpnp=$_POST['id_pemohon'];
		$nmjnz=$_POST['nama_jenazah'];
		$tglpsn=$_POST['tgl_pesan'];
		$hpesan=$_POST['hari_pesan'];
		$jpesan=$_POST['jumlah_pesan'];
		$detail=$_POST['detail'];

		$update = mysqli_query ($conn,"UPDATE  tbl_pemesanan SET nama_tpu='$nmtpu',id_pemohon='$idpnp',nama_jenazah='$nmjnz',tgl_pesan='$tglpsn',hari_pesan='$hpesan',jumlah_pesan='$jpesan',detail='$detail' where no_pesan='$nopsn' ") or die (mysqli_error());

//jika query update sukses
		if($update){

  echo '<br/><br/>Data berhasil di simpan! ';  //Pesan jika proses simpan sukses
  echo '<a href="entry_pemesanan.php" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}else{

  echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
  echo '<a href="editpemesanan.php?id_pemesanan='.$id.'" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}


?>

</div>
</div>


<?php include('template/footer.php'); ?>

