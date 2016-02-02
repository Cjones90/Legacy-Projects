<!DOCTYPE html>
<html>
<head>
<?php include "Navigation.php";	 ?>

<div id ="middle">
	<div id = "midtitle"> Media
	</div>
		<div id="med_buts">
		<a href="#vids" class="med_buts">Videos</a>
		<a href="#pics" class="med_buts">Pictures</a>
		</div>
	<div class="med" id="vids">
		<div style="display:relative">
						<form style="display:inline; " action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="media" method="POST">
				<div id="pages">
			<h3 id ="stkex" style="margin-bottom:0px;">MEDIA</h3>
		
			<?php echo "<strong>".$num2 . ' results found</strong><br>'; 
			echo '<strong>Page #</strong>&nbsp&nbsp<select name="pgsel" onchange="this.form.submit()">';

					while ($i <= $pagetotal) {
					echo '<option value='.$i;
					if ($pgsel == $i) { echo ' selected'; }
					echo '>'.$i.'</option>';
					$i++;
				}

				?>
			</select>
			&nbsp&nbsp&nbsp&nbsp<strong>Results Per Page:</strong>&nbsp&nbsp<select name="perpage" onchange="this.form.submit()">
				<option value="2" <?php if($perpage==2) {echo "selected";} ?>>2</option>
				<option value="4" <?php if($perpage==5) {echo "selected";} ?>>4</option>
				<option value="<?php echo $num2; ?>" <?php if($perpage==$num2) {echo "selected";} ?>>All</option>
			</select>
			</form>
	<table>
		<tr>
			<td colspan="2" style="text-align:center; font-weight:bold;">
				<?php date_default_timezone_set('America/Los_Angeles');
					echo "Accessed on ", date("m/d/y"), " at ", date($e.":i:s"), "<br>";
					echo "User: <em>" . $username, " </em>is logged in.";
				?>
			</td>


		</tr>
			<?php 
			if ($access == "user") 
			{ 
				?>


				
				<tr>
					<td colspan="2">
						<fieldset>
							<legend><h3>Stream Video</h3></legend>
							<form action="Media.php" method="post">
								<label for="yt">URL:</label>
								<input type="text" name="yt" id="yt"/><br>
								<input type ="submit" value="Embed Video">
							</form>
						</fieldset>
					</td>
				</tr>
				<?php  
				if (isset($_POST['yt']))
				{
					put_yt();
				}
			}
					retr_yt();
			 ?>

			<div id="btm_but">
						<input form="media" type='submit' name='prev' value='Previous'>
						<input form="media"type='submit' name='next' value='Next'>
					</div>
			</div>
		<!--
			<?php if ($username !== "Guest") { ?>
				<td>
					<fieldset>
						<legend><h3>Upload Photos/Gifs</h3></legend>
						<form action="Media.php" method="post" enctype="multipart/form-data">
							<label for="file">Filename:</label>
							<input type="file" name="img" id="file"/><br>
							File Size: <div style="display:inline-block" id ="filesize">0</div><br>
							<input type ="submit" value="Upload Image">
						</form>
					</fieldset>
				</td>
			<?php
				}
			if(isset($_FILES["img"])) {
			?>
		<tr>
			<td colspan="2" style="text-align:center;">
			<?php echo iset(); 
			?>
		</tr> 
			<?php	} 
				getpics(); 
			?> 
		</tr>
					<?php if ($username !== "Guest") { ?>
				<td>
					<fieldset>
						<legend><h3>Upload Videos</h3></legend>
						<form action="Media.php" method="post" enctype="multipart/form-data">
							<label for="video">Filename:</label>
							<input type="file" name="vid" id="video"/><br>
							File Size: <div style="display:inline-block" id ="vidsize">0</div><br>
							<input type ="submit" value="Upload Video">
						</form>
					</fieldset>
				</td>
			<?php
				}
			if(isset($_FILES["vid"])) {
			?>
		<tr>
			<td colspan="2" style="text-align:center; font-weight:bold;">
			<?php echo vset(); 
			?>
		</tr> 
			<?php	} 
				getvids(); 
			?> 
		</tr>
	-->

	</table>
	
	</div>
	
	<div class="med" id="pics">
		<div style="display:relative">
	<table>
		<tr>
			<td colspan="2" style="text-align:center; font-weight:bold;">
				<?php date_default_timezone_set('America/Los_Angeles');
					echo "Accessed on ", date("m/d/y"), " at ", date($e.":i:s"), "<br>";
					echo "User: <em>" . $username, " </em>is logged in.";
				?>
			</td>
		</tr>
		<?php
		getpics(); 
			?> 
	</table>
	<div id="btm_but">
						<input form="stkbuttons" type='submit' name='prev' value='Previous'>
						<input form="stkbuttons"type='submit' name='next' value='Next'>
					</div>
			</div>
	</div>
</div> <!-- Middle -->
</div> <!-- Wrapper -->
</body>
</html>