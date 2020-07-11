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
		$kdjnz=$_POST['kd_jenazah'];
		$idpnp=$_POST['id_pemohon'];
		$nopsn=$_POST['no_pesan'];
		$nmjnz=$_POST['nama_jenazah'];
		$jekelamin=$_POST['jenis_kelamin'];
		$umur=$_POST['umur'];

		$update = mysqli_query ($conn,"UPDATE  tbl_jenazah SET id_pemohon='$idpnp',no_pesan='$nopsn',nama_jenazah='$nmjnz',jenis_kelamin='$jekelamin',umur='$umur' where kd_jenazah='$kdjnz' ") or die (mysqli_error());

//jika query update sukses
		if($update){

  echo '<br/><br/>Data berhasil di Update! ';  //Pesan jika proses simpan sukses
  echo '<a href="entry_jenazah.php" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}else{

  echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
  echo '<a href="editjenazah.php?id_jenazah='.$id.'" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}


?>

</div>
</div>


<?php include('template/footer.php'); ?>

