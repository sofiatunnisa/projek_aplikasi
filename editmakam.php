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
$id=$_GET['id_makam'];

$no=1;
$sql = "SELECT * FROM tbl_makam WHERE no_makam='$id' "; 
$hasil=mysqli_query($conn,$conn,$sql) or die(mysqli_error());
while ($tampil=mysqli_fetch_array($hasil))
{
?>

<div id="main">
	<div class="content">
		<h3>Entry Makam</h3>
		<form action="updatemakam.php" method="POST">

			<div class="input-group">
				<select name="no_tpu" id="" style="width: 250px;">
					<option value='<?php echo $tampil['no_tpu']; ?>'><?php echo $tampil['no_tpu']; ?></option>

				</select>

			</div>

			<div class="input-group">
				<input type="text" placeholder="Kode Izin" value="<?php echo $tampil['kd_izin']; ?>" name="kd_izin" style="width: 228px;">
			</div>
			<div class="input-group">

					<input name="nama_tpu" value="<?php echo $tampil['nama_tpu']; ?>">

			</div>
			<div class="input-group">

					<input name="nama_pengelola" value="<?php echo $tampil['nama_pengelola']; ?>">

			</div>
			<div class="input-group">

					<input name="detail" value="<?php echo $tampil['detail']; ?>">

			</div>
			<div class="input-group">

					<input name="alamat" value="<?php echo $tampil['alamat']; ?>">

			</div>
			<div class="input-group">
					<select name="jenis" id="">
					<option value="<?php echo $tampil['jenis']; ?>">-Pilih Jenis Makam-</option>
						<option value="Muslim">Muslim</option>
						<option value="Non_Muslim">Non Muslim</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
			<div class="input-group">

					<input name="jumlah" value="<?php echo $tampil['jumlah']; ?>">

			</div>
			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>

		</form>

	</div>
</div>


<?php include('template/footer.php'); }?>