<?php 
include('koneksi/conn.php');
include('template/top.php');
include('template/navigasi.php');
$no = 1;
$sql = "SELECT * FROM tbl_pesan ORDER BY no_pesan DESC limit 1"; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
$sql2 = "SELECT * FROM tbl_makam ORDER BY nama_tpu DESC limit 1"; 
$hasil2=mysqli_query($conn,$sql2) or die(mysqli_error());
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['username'])) {
 	header('Location:login.php');
 }

?>

<div id="main">
	<div class="content">
		<h3>Entry Pemesanan</h3>
		<form action="insertpemesanan.php" method="POST">
			<div class="input-group">
				<input type="text" placeholder="Nomor Indentitas Pemesanan" value="Nomor Pesanan<?php while($rows=mysqli_fetch_array($hasil)){ $num = $rows['no_pesan']+$no; echo $num; }?>" name="no_pesan">
			</div>

			<div class="input-group">
				<input type="text" placeholder="Nama TPU" name="nama_tpu" value="Nama Makam<?php while($rows=mysqli_fetch_array($hasil2)){ $dat = $rows['nama_tpu']; $num = substr($dat,5)+$no; echo $num; }?>" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama TPU" name="nama_tpu">
			</div>
			<div class="input-group">
				<input type="text" placeholder="ID Pemohon" name="id_pemohon">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama Jenazah" name="nama_jenazah">
			</div>
			<div class="input-group">
				<input type="date" placeholder="Tanggal Pemesanan" name="tgl_pesan">
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
				<input type="text" placeholder="Jumlah Pesanan Makam" name="jumlah_pesan">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Detail Letak" name="detail">
			</div>

			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>

		</form>
		<hr/>
		<h3>Data Pemesanan</h3>
		<?php include('data/data_pemesanan.php'); ?>
	</div>
</div>



<?php include('template/footer.php'); ?>