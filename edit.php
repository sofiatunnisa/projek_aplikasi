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

$id=$_GET['idp'];

$no=1;
$sql = "SELECT * FROM tbl_pemohon WHERE id_pemohon='$id' "; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
while ($tampil=mysqli_fetch_array($hasil))
{


	?>


	<div id="main">
		<div class="content">
			<h3>Entry Pemohon</h3>
			<form action="updatepemohon.php" method="POST" enctype="multipart/form-data">
				<div class="input-group">
					<input type="text" value="<?php echo $id; ?>" name="id_pemohon">
				</div>
				<div class="input-group">
					<input type="text" name="nama_pemohon" value="<?php echo $tampil['nm_pemohon']; ?>">
				</div>
				<div class="input-group">
					<input type="text"  style="width: 300px;" name="pekerjaan" value="<?php echo $tampil['pekerjaan']; ?>">
				</div>
				<div class="input-group">
					<input type="text"  name="almt_komsumen" value="<?php echo $tampil['almt_komsumen']; ?>">
				</div>
				<div class="input-group">
					<input type="text"  name="telepon" value="<?php echo $tampil['telepon']; ?>">
				</div>
				<div class="input-group">
					<input type="text" name="tmp_lahir" id="tempat"  value="<?php echo $tampil['tmp_lahir']; ?>"> /
					<select name="tgl" id="tanggal">
						<option value="0">-Pilih Tanggal-</option>
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
						<input type="text" name="umur" id="dat" style="width: 40px;"  value="<?php echo $tampil['umur']; ?>"> 
					</div>
					<div class="input-group">
						<label for="">Foto Pemohon</label>
						<input type="file" name="foto" value="<?php echo $tampil['foto']; ?>">
					</div>
					<div class="input-group">
						<select name="jenis_kelamin" id="" >
							<option value="<?php echo $tampil['jenis_kelamin']; ?>">-Pilih Jenis Kelamin-</option>
							<option value="Pria">Pria</option>
							<option value="Wanita">Wanita</option>
						</select>
					</div>
					<div class="input-group">
						<button type="submit" class="btn">Kirim</button>
						<button type="reset" class="btn">Hapus</button>
					</div>

				</form>
			</div>
		</div>


		<?php include('template/footer.php');} ?>