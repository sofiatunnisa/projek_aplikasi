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
		<th style="width: 40px;">Delete</th>
		<th style="width: 40px;">Edit</th>
	</tr>
	<?php include('koneksi/conn.php'); 
	$sql = "SELECT * FROM tbl_makam ORDER BY no_tpu ASC"; 
	$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
	$no=1;
	while ($data = mysqli_fetch_array ($hasil)){
		$id=$data['no_tpu'];
		?>
		<tr>

			<td><?php echo $no++?></td>
			<td><?php echo $data['no_tpu'];?></td>
			<td><?php echo $data['kd_izin'];?></td>
			<td><?php echo $data['nama_tpu']; ?></td>
			<td><?php echo $data['nama_pengelola']; ?></td>
			<td><?php echo $data['detail']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['jenis']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td class="delete">
				<a href="deletemakam.php?no_tpu=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/delete.png" alt="Delete Data"></a>
			</td>
			<td class="edit">
				<a href="editmakam.php?no_tpu<?php echo $id?>" class="btn-aksi"><img src="img/edit.png" alt="Edit Dasta"></a>
			</td>
			
		</tr>
		<?php } ?>
	</table>
