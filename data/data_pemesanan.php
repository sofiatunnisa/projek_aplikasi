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
		<th style="width: 40px;">Delete</th>
		<th style="width: 40px;">Edit</th>
	</tr>
	<?php include('koneksi/conn.php'); 
	$sql = "SELECT * FROM tbl_pesan ORDER BY no_pesan ASC"; 
	$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
	$no=1;
	while ($data = mysqli_fetch_array ($hasil)){
		$id=$data['no_pesan'];
		?>
		<tr>

			<td><?php echo $no++?></td>
			<td><?php echo $data['no_pesan'];?></td>
			<td><?php echo $data['nama_tpu']; ?></td>
			<td><?php echo $data['id_pemohon']; ?></td>
			<td><?php echo $data['nama_jenazah']; ?></td>
			<td><?php echo $data['tgl_pesan']; ?></td>
			<td><?php echo $data['hari_pesan']; ?></td>
			<td><?php echo $data['jumlah_pesan']; ?></td>
			<td><?php echo $data['detail']; ?></td>
			<td class="delete">
				<a href="deletepesan.php?no_pesan=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/delete.png" alt="Delete Data"></a>
			</td>
			<td class="edit">
				<a href="editpesan.php?no_pesan=<?php echo $id?>" class="btn-aksi"><img src="img/edit.png" alt="Edit Dasta"></a>
			</td>
			
		</tr>
		<?php } ?>
	</table>
