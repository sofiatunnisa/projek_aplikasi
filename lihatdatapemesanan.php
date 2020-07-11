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
		<h3>Data Pemesanan</h3>
		<button class="print" onclick="PrintDoc()"><img src="http://localhost/cibot/img/print.png">Print Data</button>
		<button class="print" onclick="PrintPreview()"><img src="http://localhost/cibot/img/preview.png">Print Preview</button>

		<table id="tabel"  border="1" cellpadding="3" >
			<tr>
				<th style="width: 20px;">No</th>
				<th style="width: 50px;">Nomor Pemesanan</th>
				<th style="width: 50px;">Nama TPU</th>
				<th style="width: 100px;">ID Pemohon</th>
				<th style="width: 100px;">Nama Jenazah</th>
				<th style="width: 100px;">Tanggal Pemesanan</th>
				<th style="width: 60px;">Hari Pemesanan</th>
				<th style="width: 100px;">Jumlah Pesanan Makam</th>
				<th style="width: 140px;">Detail Letak</th>

			</tr>
			<?php include('koneksi/conn.php'); 
			$sql = "SELECT * FROM tbl_pemohon inner join tbl_makam on tbl_pemohon.id_pemohon=tbl_makam.no_tpu join tbl_pemesanan on tbl_makam.no_tpu=tbl_pemesanan.no_pesan  "; 
			
			$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
			$no=1;
			while ($data = mysqli_fetch_array ($hasil)){
				$id=$data['no_makam'];
				$identitas=$data['no_pesan'];
				?>
				<tr>
					
					<td><?php echo $no++?></td>
					<td><a href="single_view.php?id_pemesanan=<?php echo $identitas?>"><?php echo $data['no_pemohon'];?></a></td>
					<td><?php echo $data['no_pesan'];?></td>
					<td><?php echo $data['nama_tpu']; ?></td>
					<td><?php echo $data['id_pemohon']; ?></td>
					<td><?php echo $data['nama_jenazah']; ?></td>
					<td><?php echo $data['tgl_pesan']; ?></td>
					<td><?php echo $data['hari_pesan']; ?></td>
					<td><?php echo $data['jumlah_pesan']; ?></td>
					<td><?php echo $data['detail']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<?php include('template/footer.php'); ?>