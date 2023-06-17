<?=require './.settings';?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?= base_url() . "assets/" ?>home.css">
	</head>
	<body style="overflow:hidden;">
		<script type="text/javascript">
			var video = document.getElementById('addiction-video');
			/*var video1 = document.getElementById('addiction-video1');*/
// 			video.addEventListener('ended',function(){
// 				location.href = 'http://localhost/';
// 				window.location= 'http://localhost/';
// 				$('head').append('<meta http-equiv="refresh" content="5; url=http://localhost/" />');
// 			});
			video.play();
			/*video1.play();*/
		</script>
		 
		<video id="addiction-video" autoplay="autoplay" controls="controls" width="100%" height="100%" onended="window.location = '<?= base_url(); ?><?= $next; ?>';">
			<source src="<?= base_url(); ?>/assets/<?=$video_slide['nama']?><?= $vid; ?>.mp4" type="video/mp4" />
		</video>
		<!-- <video id="addiction-video1" autoplay="autoplay" controls="controls" width="100%" height="100%" onended="window.location = 'http://localhost/';">
			<source src="http://localhost/assets/video1.mp4" type="video/mp4" />
		</video> -->
	</body>
</html>