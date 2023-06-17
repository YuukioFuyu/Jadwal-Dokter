<?= require './.settings'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Jadwal Dokter</title>
		<!-- Waktu memutar video (dalam detik) -->
		<meta http-equiv="refresh" content="<?=$video_slide['waktu']?>; url=./video" />
		<link rel="stylesheet" type="text/css" href="<?= base_url() . "assets/" ?>home.css">
	</head>
	<body style="overflow:hidden;" onload="startTime()">
		<div class="navbar">
			<img src="<?= base_url() . "assets/" ?>logo.png" height="90%" width="9%">
		</div>
		<div class="all2">
			<div class="top-left" id="hari2"></div>
			<div class="top-right"><b><?=$header['judul']?></b></div>
		</div>
		<div style="">
			<div class="all">
				<div align="center" class="left"><strong>NAMA POLI</strong></div>
				<div align="center" class="index1" style="color: white;"><strong>NAMA DOKTER</strong></div>
				<div align="center" class="index1_2" style="color: white;"><strong>WAKTU</strong></div>
			</div>
			
			<?php
			$poli = "";
			foreach($content AS $c) {
				?>
				<div class="all1">
					<div class="left1"><b><?= (($poli == $c['nama_poli']) ? "" : ("POLI " . $c['nama_poli'])); ?></b></div>
					<div class="index1"><?= $c['nama']; ?></div>
					<div class="index2"><b><?= $c['jam_mulai'] . " - " . $c['jam_selesai']; ?></b></div>
				</div>
				<?php
				if ($c['nama_poli'] != $poli) {
					$poli = $c['nama_poli'];
				}
			}
			?>
		</div>
		<footer>
			<div class="marq">
				<div class="marq-content">
					<marquee id="marquee"><b><?=$running_text['nama']?> | <?=$running_text['alamat']?></b></marquee>
				</div>
			</div>
			<div class="bottom-left">
				<div class="bottom-left-content">
					<div class="haritanggal">
						<b><span id='hari'></span>,<br>
						<span id='tanggal'></span></b>
					</div>
					<div class="jam">
						<b><span id="txt"></span></b>
					</div>
				</div>
			</div>
		</footer>

		<script>
			function startTime() {
				var today = new Date();
				var tahun = today.getFullYear();
				var bulan = today.getMonth();
				var namabulan = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
				var d = today.getDate();
				var hari = today.getDay();
				var namahari = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
				var h = today.getHours();
				var m = today.getMinutes();
				var s = today.getSeconds();
				m = checkTime(m);
				s = checkTime(s);
				document.getElementById('txt').innerHTML = h + ":" + m ;
				document.getElementById('hari').innerHTML = namahari[hari];
				document.getElementById('hari2').innerHTML = "<b>" + namahari[hari] + "</b>";
				document.getElementById('tanggal').innerHTML = d +" "+ namabulan[bulan]+ " " + tahun;
				var t = setTimeout(startTime, 500);
			}
			function checkTime(i) {
				if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
				return i;
			}
		</script>
	</body>
</html>