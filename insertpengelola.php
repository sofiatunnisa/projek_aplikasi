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

$query	= "INSERT INTO tbl_pengelola values('$idpgl','$nmpgl','$alamat','$nohp','$jekelamin','$umurpgl','$tlahir','$tgllahir','".$_FILES["foto"]["name"]."')";
$result = mysqli_query($conn,$query) or die(mysqli_error()) ;
if($result){
	echo "<script type='text/javascript'>
	alert('Data Berhasil Disimpan..!');
</script>";
echo "<meta http-equiv='refresh' content='0; url=entry_pengelola.php'>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
		alert('data gagal disimpan!');
	}
</script>";

var_dump($_FILES);
//KEMBALI KE LIST.PHP
echo "data berhasil dimasukkan";
echo "<meta http-equiv=refresh content=3;url=entry_pengelola.php>";
}
?>


