<!DOCTYPE html>
<html>
<head>
	<title>Practice Page</title>
	<?php include "includes.php" ?>
</head>
<body>
	<?php include "header.php" ?>

	<div id='main_content'>


		<?php 
		echo "<h1 id='main'>".read($filename, 'Main')."</h1>";
		?>

		<div id='container'>
			<img src='images/home-main.jpg' class='home_img'/>
			<h3 class='home_img_overlay'> Your Business Here </h3>
		</div>
		
		<?php
		echo "<h2 id='mission'>".read($filename, 'Mission')."</h2>";
		?>

		<div class='icon_box'>
			<img src='images/icons/tool.png' />
			<h3>We give you the tools you need.</h3>
		</div>

		<div class='icon_box'>
			<img src='images/icons/dollar.png' />
			<h3>Save you the money you deserve.</h3>
		</div>

		<div class='icon_box'>
			<img src='images/icons/support.png' />
			<h3>Provide support that you can count on.</h3>
		</div>

		<h2>With staff that are here to help you and your business grow, your business is in good hands.</h2>

	</div> <!-- main_content -->

	<?php include "footer.php" ?>
</body>
</html>