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


$query	= "INSERT INTO tbl_pemesanan values('$nopsn','$nmtpu','$idpnp','$nmjnz','$tglpsn','$hpesan','$jpesan','$detail')";
$result = mysql_query($query) or die(mysql_error()) ;
if($result){
	echo "<script type='text/javascript'>
	alert('Data Berhasil Disimpan..!');
</script>";
echo "<meta http-equiv='refresh' content='0; url=entry_pemesanan.php'>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
		alert('data gagal disimpan!');
	}
</script>";

var_dump($_FILES);
//KEMBALI KE LIST.PHP
echo "data berhasil dimasukkan";
echo "<meta http-equiv=refresh content=3;url=entry_pemesanan.php>";
}
?>


