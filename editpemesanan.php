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
$id=$_GET['id_pesan'];

$no=1;
$sql = "SELECT * FROM tbl_pesan WHERE no_pesan='$id' "; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
while ($tampil=mysqli_fetch_array($hasil))
{

?>

<div id="main">
	<div class="content">
		<h3>Entry Pemesanan</h3>
		<form action="updatepemesanan.php" method="POST">
			<div class="input-group">
				<input type="text" placeholder="Nomor Indentitas Pemesanan" value="<?php echo $tampil['no_pesan']; ?>" name="no_pesan">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama Tpu" name="nama_tpu" value="<?php echo $tampil['nama_tpu']; ?>" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="ID Pemohon" name="id_pemohon" value="<?php echo $tampil['id_pemmohon']; ?>" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama jenazah" name="nama_jenazah" value="<?php echo $tampil['nama_jenazah']; ?>" >
			</div>
			<div class="input-group">
				<input type="date" placeholder="Tanggal Pemesanan" name="tgl_pesan" value="<?php echo $tampil['tgl_pesan']; ?>">
			</div>
			<div class="input-group">
				<select name="hari_pesan" id="">
					<option value="0">-Pilih hari Berangkat-</option>
					<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum'at">Jum'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>
				</select>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Jumlah Pesanan Makam" id="jumlah" oninput="calculate()" name="jumlah_pesan" value="<?php echo $tampil['jumlah_pesan']; ?>">
			</div>
			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>

		</form>
	</div>
</div>



<?php include('template/footer.php'); }?>