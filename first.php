<?php

include_once('includes/connection.php');
include_once('includes/assets.php');

$asset = new Asset;

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $asset->fetch_data($id);

echo $data['id'];
?>

<html lang="en-US">
<head>
    <meta charset="UTF-8">

    <title>Digital Asset Guide - <?php echo $data['name']; ?></title>
    <link href="style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/anythingslider.css">
	<script src="js/jquery.anythingslider.js"></script>
	<link rel="stylesheet" href="css/theme-minimalist-square.css">
	<script>
	$(function(){
		$('#slider').anythingSlider({
		 	resizeContents:false,
		 	buildNavigation:true,
		 	buildStartStop:false,
			autoplay:true,
			appendForwardTo: $('.image-thumbs-right'),
			appendBackTo: $('.image-thumbs-left'),
			appendNavigationTo: $('.image-thumbs-middle center'),
			navigationFormatter : function(index, panel){ // Format navigation labels with text
		      return ['Desktop', 'iPhone 5'][index - 1];
		    }
		}); // add any non-default options here
	});
	</script>
</head>

<body>

    <div id="content">
		<div id="asset-title">
			<img src="images/<?php echo $data['servicelogo']; ?>" />
			<?php echo $data['name']; ?>
		</div>

		<div id="homebutton"><a href="index.html">Home</a></div>

		<div class="image-hero">

			<div id="slider-wrap">
				<div id="slider">
					<div><img src="images/<?php echo $_GET['id'] ?>_desktop.png" title="Desktop Screenshot" /></div>
					<div><img src="images/<?php echo $_GET['id'] ?>_iphone5.png" title="iPhone 5 Screenshot" /></div>
				</div>
			</div>

		</div>
		
        <div class="specs-column">
			
			<h1>Information:</h1>
			<?php echo $data['description']; ?>
			
			<h2>Specs:</h2>		
			<ul>
				<li><span class="bullet">-</span><b>Dimensions: </b><?php echo $data['specs_dimensions']; ?></li>
				<li><span class="bullet">-</span><b>Max Filesize: </b><?php echo $data['specs_maxfilesize']; ?></li>
				<li><span class="bullet">-</span><b>Format: </b><?php echo $data['specs_format']; ?></li>
					<?php if (isset($data['specs_maxwidth'])) {
						<<<EOT
<li><span class="bullet">-</span><b>Max Width: </b>{$data['specs_maxwidth']}</li>
EOT;
					} else
					{
						echo 'MaxWidth not set. This text is only here for testing.';
					}
						?>
					</ul>
			
			<h2>Copy Specs:</h2>
			
			<ul>
				<li><span class="bullet">-</span><b>Char Limit:</b> 300 (including spaces)</li>
			</ul>
			
			<br class="clear">

        </div>
			<div class="image-thumbs-left"></div>
			<div class="image-thumbs-middle">
				<center>
					<!-- Slider Nav -->
				</center>
			</div>
			<div class="image-thumbs-right"></div>
    </div>

    <div class="“clear”"></div>

</body>
</html>

<?php
}	else {
	header('Location: index.php');
	exit();
}



?>