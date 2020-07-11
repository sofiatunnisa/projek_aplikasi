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


$query	= "INSERT INTO tbl_tiket values('$nomakam','$kdizin','$nmtpu','$nmpgl','$detail','$alamat','$jenis','$jumlah')";
$result = mysql_query($query) or die(mysql_error()) ;
if($result){
	echo "<script type='text/javascript'>
	alert('Data Berhasil Disimpan..!');
</script>";
echo "<meta http-equiv='refresh' content='0; url=entry_makam.php'>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
		alert('data gagal disimpan!');
	}
</script>";

var_dump($_FILES);
//KEMBALI KE LIST.PHP
echo "data berhasil dimasukkan";
echo "<meta http-equiv=refresh content=3;url=entry_makam.php>";
}
?>


