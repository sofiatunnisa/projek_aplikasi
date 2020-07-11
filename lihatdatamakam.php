<?php 
include('template/top.php');
include('template/navigasi.php');
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['username'])) {
 	header('Location:login.php');
 }
?>
<div id="main">
	<div class="content">
		<h3>Data Makam</h3>
		<button class="print" onclick="PrintDoc()"><img src="http://localhost/cibot/img/print.png">Print Data</button>
		<button class="print" onclick="PrintPreview()"><img src="http://localhost/cibot/img/preview.png">Print Preview</button>

		<table id="tabel"  border="1" cellpadding="3" >
			<tr>
				<th style="width: 20px;">No</th>
				<th style="width: 50px;">No TPU</th>
				<th style="width: 50px;">Kode Izin</th>
				<th style="width: 100px;">Nama TPU</th>
				<th style="width: 100px;">Nama Pengelola</th>
				<th style="width: 140px;">Detail Letak</th>
				<th style="width: 100px;">Alamat</th>
				<th style="width: 100px;">Jenis Makam</th>
				<th style="width: 100px;">Jumlah Makam</th>

			</tr>
			<?php include('koneksi/conn.php'); 
			$sql = "SELECT * FROM tbl_makam ORDER BY no_tpu ASC"; 
			$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
			$no=1;
			while ($data = mysqli_fetch_array ($hasil)){
				$id=$data['no_tiket'];
				?>
				<tr>

					<td><?php echo $data['no_tpu'];?></td>
					<td><?php echo $data['kd_izin'];?></td>
					<td><?php echo $data['nama_tpu']; ?></td>
					<td><?php echo $data['nama_pengelola']; ?></td>
					<td><?php echo $data['detail']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<td><?php echo $data['jenis']; ?></td>
					<td><?php echo $data['jumlah']; ?></td>

				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<?php include('template/footer.php'); ?>