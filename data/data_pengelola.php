<table id="tabel"  border="1" cellpadding="3" >
	<tr>
		<th style="width: 20px;">No</th>
		<th style="width: 50px;">Foto</th>
		<th style="width: 100px;">ID Pengelola</th>
		<th style="width: 140px;">Nama Pengelola</th>
		<th>Alamat</th>
		<th>Nomor Telepon</th>
		<th style="width: 100px;">Jenis kelamin</th>
		<th style="width: 100px;">TTL</th>
		<th style="width: 50px;">Usia</th>
		<th style="width: 40px;">Delete</th>
		<th style="width: 40px;">Edit</th>
	</tr>
	<?php include('koneksi/conn.php'); 
	$sql = "SELECT * FROM tbl_pengelola ORDER BY id_pengelola ASC"; 
	$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
	$no=1;
	while ($data = mysqli_fetch_array ($hasil)){
		$id=$data['id_pengelola'];
		$nm=$data['nama_pengelola'];
		$jenis=$data['jenis_kelamin'];
		$alamat=$data['alamat_pengelola'];
		$nohp=$data['telepon'];
		$tmpt=$data['tmp_lahir'];
		$tgl=date('Y-m-d', strtotime($data['tgl_lahir']));
		$umur=$data['umur'];
		$foto=$data['foto'];

		?>
		<tr>

			<td><?php echo $no++?></td>
			<td><img src="foto/<?php echo $foto; ?>" width="40" height="40"></td>
			<td><?php echo $id;?></td>
			<td><?php echo $nm; ?></td>
			<td><?php echo $alamat; ?></td>
			<td><?php echo $nohp; ?></td>
			<td><?php echo $jenis; ?></td>
			<td><?php echo "$tmpt, $tgl"; ?></td>
			<td class="delete">
				<a href="deletepengelola.php?id_pengelola=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/delete.png" alt="Delete Data"></a>
			</td>
			<td class="edit">
				<a href="editpengelola.php?id_pengelola=<?php echo $id?>" class="btn-aksi"><img src="img/edit.png" alt="Edit Data"></a>
			</td>
			
		</tr>
		<?php } ?>
	</table>
