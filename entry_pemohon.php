<?php 
include('koneksi/conn.php');
include('template/top.php');
include('template/navigasi.php');
$no = 1;
$sql = "SELECT * FROM tbl_pemohon ORDER BY id_pemohon DESC limit 1"; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['username'])) {
 	header('Location:login.php');
 }

?>


<div id="main">
	<div class="content">
		<h3>Entry Pemohon</h3>
		<form action="insertpemohon.php" method="POST" enctype="multipart/form-data">
			<div class="input-group">
				<input type="text" placeholder="Nomor Indentitas Pemohon" value="<?php while($rows=mysqli_fetch_array($hasil)){ $num = $rows['id_pemohon']+$no; echo $num; }?>" name="id_pemohon">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nama Pemohon" name="nama_pemohon">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Alamat Pemohon" style="width: 300px;" name="almt_pemohon">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nomor Telepon" name="telepon">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Pekerjaan" style="width: 300px;" name="pekerjaan">
			</div>
			<div class="input-group">
				<input type="text" name="tmp_lahir" id="tempat" placeholder="Tempat Lahir"> /
				<select name="tgl" id="tanggal">
					<option value='0'>-Pilih Tanggal-</option>
					<?php  for($tanggal=1;$tanggal<=31;$tanggal++) echo "<option value='".$tanggal."'>$tanggal</option>" ?>
				</select>
				<select name="bln" id="bulan">
					<?php $bulan = array("-Pilih Bulan-","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
					for($i=0;$i<=12;$i++)
					{
						echo "<option value=".$i.">".$bulan[$i]."</option>" ."<br>";
					}
					?>
				</select>
				<?php error_reporting(1); ?>
				<select name="thn" id="tahun" onchange="document.getElementById('dat').value=2020-this.options[this.selectedIndex].text">
				<option>-Pilih Tahun-<?php echo $_POST['tahun']?>
						<?php for($t=1990;$t<2020;$t++){?> <option><?php echo $t ?></option> 
						<?php };?>
					</select>
					<input type="text" name="umur" id="dat" style="width: 40px;" placeholder="Umur"> 
				</div>
				<div class="input-group">
					<label for="">Foto Pemohon</label>
					<input type="file" name="foto">
				</div>
				<div class="input-group">
					<select name="jenis_kelamin" id="">
					<option value="">-Pilih Jenis Kelamin-</option>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
				</div>
				<div class="input-group">
					<button type="submit" class="btn">Kirim</button>
					<button type="reset" class="btn">Hapus</button>
				</div>

			</form>
			<hr/>
			<h3>Data Pemohon</h3>
			<?php include('data/data_pemohon.php') ?>
		</div>
	</div>


	<?php include('template/footer.php'); ?>