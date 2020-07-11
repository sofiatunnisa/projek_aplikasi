<?php
include('koneksi/conn.php');
$kdjnz=$_POST['kd_jenazah'];
$idpnp=$_POST['id_pemohon'];
$nopsn=$_POST['no_pesan'];
$nmjnz=$_POST['nama_jenazah'];
$jekelamin=$_POST['jenis_kelamin'];
$umur=$_POST['umur'];


$query	= "INSERT INTO tbl_jenazah values('$kdjnz','$idpnp','$nopsn','$nmjnz','$detail','$alamat','$umur','$jekelamin')";
$result = mysql_query($query) or die(mysql_error()) ;
if($result){
	echo "<script type='text/javascript'>
	alert('Data Berhasil Disimpan..!');
</script>";
echo "<meta http-equiv='refresh' content='0; url=entry_jenazah.php'>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
		alert('data gagal disimpan!');
	}
</script>";

var_dump($_FILES);
//KEMBALI KE LIST.PHP
echo "data berhasil dimasukkan";
echo "<meta http-equiv=refresh content=3;url=entry_jenazah.php>";
}
?>


