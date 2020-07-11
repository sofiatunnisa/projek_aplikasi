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
$no = 1;
$sql = "SELECT * FROM tbl_makam ORDER BY no_tpu DESC limit 1"; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());


$sql2 = "SELECT * FROM tbl_pemohon ORDER BY id_pemohon ASC"; 
$pemohon=mysqli_query($conn,$sql2) or die(mysqli_error());

?>

<div id="main">
	<div class="content">
		<h3>Entry Makam</h3>
		<form action="insertmakam.php" method="POST">

			<div class="input-group">
				<input type="text" placeholder="Nomor TPU" value="0000<?php while($rows=mysqli_fetch_array($hasil)){ $num = $rows['no_tPU']+$no; echo $num; }?>" name="no_tPU">
			</div>

			<div class="input-group">
				<input type="text" placeholder="ID Pemohon" value="DM0000<?php while($rows=mysqli_fetch_array($pemohon)){ $dat = $rows['id_pemohon']; $num = substr($dat,5)+$no; echo $num; }?>">
			</div>

			</div>
			<div class="input-group">
				<input type="text" placeholder="Kode Izin" name="kd_izin">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama TPU" name="nama_tpu">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama Pengelola" name="nama_pengelola">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Detail Letak" name="detail">
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
				<input type="text" placeholder="Jumlah Makam" name="jumlah">
			</div>


			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>

		</form>

		<hr/>
		<h3>Data Makam</h3>
		<?php include('data/data_makam.php'); ?>
	</div>
</div>


<?php include('template/footer.php'); ?>