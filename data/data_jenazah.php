<table id="tabel"  border="1" cellpadding="3" >
	<tr>
		<th style="width: 20px;">No</th>
		<th style="width: 50px;">Kode Jenazah</th>
		<th style="width: 50px;">ID Pemohon</th>
		<th style="width: 50px;">Nomor Pemesanan</th>
		<th style="width: 100px;">Nama Jenazah</th>
		<th style="width: 100px;">Jenis kelamin</th>
		<th>Usia</th>
		<th style="width: 40px;">Delete</th>
		<th style="width: 40px;">Edit</th>
	</tr>
	<?php include('koneksi/conn.php'); 
	$sql = "SELECT * FROM tbl_jenazah ORDER BY kd_jenazah ASC"; 
	$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
	$no=1;
	while ($data = mysqli_fetch_array ($hasil)){
		$id=$data['kd_jenazah'];
		?>
		<tr>

			<td><?php echo $no++?></td>
			<td><?php echo $data['kd_jenazah']; ?></td>
			<td><?php echo $data['id_pemohon']; ?></td>
			<td><?php echo $data['no_pesan']; ?></td>
			<td><?php echo $data['nama_jenazah']; ?></td>
			<td><?php echo $data['jenis_kelamin']; ?></td>
			<td><?php echo $data['umur']; ?></td>
			<td class="delete">
				<a href="deletjenazah.php?kd_jenazah=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/delete.png" alt="Delete Data"></a>
			</td>
			<td class="edit">
				<a href="editjenazah.php?kd_jenazah=<?php echo $id?>" class="btn-aksi"><img src="img/edit.png" alt="Edit Data"></a>
			</td>
			
		</tr>
		<?php } ?>
	</table>
