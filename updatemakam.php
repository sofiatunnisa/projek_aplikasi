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
		$nomakam=$_POST['no_tpu'];
		$kdizin=$_POST['kd_izin'];
		$nmtpu=$_POST['nama_tpu'];
		$nmpgl=$_POST['nama_pengelola'];
		$detail=$_POST['detail'];
		$alamat=$_POST['alamat'];
		$jenis=$_POST['jenis'];
		$jumlah=$_POST['jumlah'];

		$update = mysqli_query ($conn,"UPDATE  tbl_makam SET kd_izin='$kdizin',nama_tpu='$nmtpu',nama_pengelola='$nmpgl',detail='$detail',alamat='$alamat',jenis='$jenis',jumlah='$jumlah' where no_tpu='$nomakam' ") or die (mysqli_error());

//jika query update sukses
		if($update){

  echo '<br/><br/>Data berhasil di Update ';  //Pesan jika proses simpan sukses
  echo '<a href="entry_makam.php" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}else{

  echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
  echo '<a href="editmakam.php?no_tpu='.$id.'" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}


?>

</div>
</div>


<?php include('template/footer.php'); ?>

