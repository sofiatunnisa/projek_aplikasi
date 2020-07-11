<?php 
include('koneksi/conn.php');
include('template/top.php');
include('template/navigasi.php');
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['username'])) {
 	header('Location:login.php');
 }
$id=$_GET['id_jenazah'];

$no=1;
$sql = "SELECT * FROM tbl_jenazah WHERE kd_jenazah='$id' "; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
while ($tampil=mysqli_fetch_array($hasil))
{

?>

<div id="main">
	<div class="content">
		<h3>Entry Jenazah</h3>
		<form action="updatejenazah.php" method="POST">
			<div class="input-group">
				<input type="text"  value="<?php echo $tampil['kd_jenazah']; ?>" name="kd_jenazah">
			</div>
			<div class="input-group">
				<input type="text"  name="id_pemohon" value="<?php echo $tampil['id_pemohon']; ?>" >
			</div>
			<div class="input-group">
				<input type="text" name="no_pesan" value="<?php echo $tampil['no_pesan']; ?>">
			</div>
			<div class="input-group">
				<input type="text" name="nama_jenazah" value="<?php echo $tampil['nama_jenazah']; ?>">
			</div>
			<div class="input-group">
					<select name="jenis_kelamin" id="">
					<option value="<?php echo $tampil['jenis_kelamin']; ?>">-Pilih Jenis Kelamin-</option>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
				</div>
			<div class="input-group">
				<input type="text" name="umur" value="<?php echo $tampil['umur']; ?>">
			</div>

			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>

		</form>
	</div>
</div>



<?php include('template/footer.php'); }?>