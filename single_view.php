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
$id=$_GET['id_pembelian'];
$sql = "SELECT * FROM tbl_konsumen inner join tbl_tiket on tbl_pemohon.id_pemohon=tbl_makam.no_tpu join tbl_pemesanan on tbl_makam.no_tpu=tbl_pemesanan.no_pesan where id_pemohon='$id' "; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
while ($data = mysqli_fetch_array ($hasil)){
	$id=$data['no_tpu'];
	?>
	<div id="main">
		<div class="content">
			<h3>Data Jenazah Makam </h3>
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
					<th rowspan="2"><img src="foto/<?php echo $data['foto'];?>" alt="<?php echo $data['nama_pemohon'];?>" width="40" height="40"></th>

				</tr>
				<?php 
				?>
				<tr>

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
			<hr />
			<a href="lihatdatapemesanan.php" class="btn">Kembali</a>
		</div>
	</div>
	<?php include('template/footer.php'); ?>