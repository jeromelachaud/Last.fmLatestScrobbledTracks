<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Last FM API</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	<script src="js/trianglify.min.js"></script>
</head>
<body>
	<script>
		var t = new Trianglify({
		    noiseIntensity: 0.3, 
		    cellpadding: 30, 
			cellsize: 90,
			x_gradient: Trianglify.colorbrewer.PuBu[9],
			y_gradient: Trianglify.colorbrewer.RdPu[3],
			});
		var pattern = t.generate(1276, 5400);
		document.body.setAttribute('style', 'background-image: '+pattern.dataUrl);
		console.log(pattern);
	</script>

	<?php require 'core.php'; ?>

	<div class="wrapper">
		<div class="logo"><a href="http://www.lastfm.fr/user/<?php echo $userID; ?>"><img src="img/Last.fm_Logo_White.png" alt="Last FM Logo"></a></div>
		<div class="grid">
			<ul class="playlist clear">
				<?php foreach ($tracks->track as $k => $v): ?>
					<li>
						<a href="<?php echo $v->url; ?>">
							<img src="<?php echo $v->image[3]; ?>">
							<div class="info">
								<span class="artist"><strong><?php echo $v->artist; ?></strong></span><br />
								<span class="name"><?php echo $v->name; ?></span><br />
								<span class="album"><em><?php echo $v->album; ?></em></span><br />
								<span class="date"><?php echo $v->date; ?></span>
							</div>
						</a>
					</li>
				<?php endforeach ;?>
			</ul>
		</div>
	</div>
</body>
</html>