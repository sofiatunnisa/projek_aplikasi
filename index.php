<?php 
session_start();
if(isset($_SESSION["username"])){
}else{
	echo header("location:login.php");
	
}
include('template/top.php');
include('template/navigasi.php');

?>

<div id="main">
	<div class="content">
		<marquee style="background: #07A0DC; padding:5px; color: #fff;">Selamat Datang di Aplikasi Pemesanan Tanah Pemakaman Aplikasi Pemesanan Tanah Pemakaman V1.0</marquee>
		<div id="profile">
			<img src="img/makam2.jpg" alt="" class="animated flipInY">
			<center>
				<h2>PESAN TANAH PEMAKAMANMU</h2>
				<hr/>
				<h1>Kepergian kita diangkasa begitu hebat, menikmati kenyamanan bisnis dan dilayani sepenuh hati</h1>
				<h1>Maka jadikan kepergian terakhir menuju rumah abadi senyaman penerbangan kita</h1>
			</center>
			

		</div>
		<hr/>

		<h2>Aplikasi Pemesanan Tanah Pemakaman V1.0</h2>
		<br />
		<br />
		<br />
	</div>
</div>


<?php include('template/footer.php'); ?>