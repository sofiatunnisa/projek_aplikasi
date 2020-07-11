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
		$idpgl=$_POST['id_pengelola'];
		$nmpgl=$_POST['nama_pengelola'];
		$alamat=$_POST['alamat_pengelola'];
		$jekelamin=$_POST['jenis_kelamin'];
		$umurpgl=$_POST['umur'];
		$nohp=$_POST['telepon'];
		$tlahir=$_POST['tmp_lahir'];
		$tgllahir=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];



		if($_FILES["foto"]["name"]!=''){
			$loc=$_FILES['foto']['tmp_name'];
			$des="foto/".$_FILES['foto']['name'];
			if( move_uploaded_file($loc, $des))
				{$pesan='.Foto asli berhasil di upload';}
			else
				{$pesan='.Foto asli gagal di upload';}	
		}
$update = mysqli_query ($conn,"UPDATE  tbl_pengelola SET nama_pengelola='$nmpgl',alamat_pengelola='$alamat',jenis_kelamin='$jkelamin',umur_pengelola='$umurpgl',telepon='$nohp',tmp_lahir='$tlahir',tgl_lahir='$tgllahir',foto='".$_FILES["foto"]["name"]."'where id_pengelola='$idpgl' ") or die (mysqli_error());

//jika query update sukses
		if($update){

  echo '<br/><br/>Data berhasil di Update! ';
  echo '<a href="entry_pengelola.php" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}else{

  echo 'Gagal menyimpan data!)';  //Pesan jika proses simpan gagal
  echo '<a href="editpengelola.php?idp='.$id.'" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}


?>

</div>
</div>


<?php include('template/footer.php'); ?>

