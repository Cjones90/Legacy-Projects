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
		echo "<h1 id='main'><pre>".read($filename, 'Main')."</pre></h1>";
		?>
		<form action='<?php htmlentities($_SERVER["PHP_SELF"]); ?>' method='POST'>
			<textarea name='new_text'></textarea><br>
			<input type='hidden' value='Main' name='text'>
			<input type='submit'>
		</form>
		
		<div id='container'>
			<img src='images/home-main.jpg' class='home_img'/>
			<h3 class='home_img_overlay'> Your Business Here </h3>
		</div>

		<?php
		echo "<h2 id='mission'><pre>".read($filename, 'Mission')."</pre></h2>";
		?>

		<form action='<?php htmlentities($_SERVER["PHP_SELF"]); ?>' method='POST'>
			<textarea name='new_text'></textarea><br>
			<input type='hidden' value='Mission' name='text'>
			<input type='submit'>
		</form>

		


		

	</div> <!-- main_content -->

	<?php include "footer.php" ?>
</body>
</html>