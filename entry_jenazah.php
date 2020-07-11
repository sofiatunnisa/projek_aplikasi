<?php 
include('koneksi/conn.php');
include('template/top.php');
include('template/navigasi.php');
$no = 1;
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['username'])) {
 	header('Location:login.php');
 }
?>

<div id="main">
	<div class="content">
		<h3>Entry Jenazah</h3>
		<form action="insertjenazah.php" method="POST">
			<div class="input-group">
				<input type="text" placeholder="Kode Jenazah" name="kd_jenazah">
			</div>
			<div class="input-group">
				<input type="text" placeholder="ID Pemohon" name="id_pemohon">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nomor Pemesanan" name="no_pesan">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama Jenazah" name="nama_jenazah">
			</div>
			<div class="input-group">
					<select name="jenis_kelamin" id="">
					<option value="0">-Pilih Jenis Kelamin-</option>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
				</div>
			<div class="input-group">
				<input type="text" placeholder="Usia" name="umur">
			</div>
	
			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>

		</form>
		<hr/>
		<h3>Data Jenazah</h3>
		<?php include('data/data_jenazah.php'); ?>
	</div>
</div>


<?php include('template/footer.php'); ?>