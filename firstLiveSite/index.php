<!DOCTYPE html>
<html>
<head>
	
<?php include "Navigation.php"; ?>

<div id ="middle">
	<div id = "midtitle"> Home
	</div>
		<table>
			<tr>
				<td colspan="2" style="text-align:center; font-weight:bold;">
					<?php date_default_timezone_set('America/Los_Angeles');
						echo "Accessed on ", date("m/d/y"), " at ", date($e.":i:s"), "<br>";
						echo "User: <em>" . $username, " </em>is logged in.";
					?>
				</td>
			</tr>
			<tr><!-- 
				<td>

				
					<fieldset>
						<legend><h2>User Info </h2></legend>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" id="allinput" data-ajax="false">
						First Name: <input type="text" name ="fName" class="ibox" value="<?php echo $fName;?>"><br>
						Last Name: <input type="text" name="lName" class="ibox" value="<?php echo $lName;?>"><br>
						Favorite Color: 
						<input type="radio" name ="color" value="Red" <?php if ($color=="Red") {echo "checked";}?> >Red
						<input type="radio" name="color" value="Blue" <?php if ($color=="Blue") {echo "checked";}?> >Blue
						<input type="radio" name="color" value="Green" <?php if ($color=="Green") {echo "checked";}?> >Green <br><br>
						<input type="submit" value="Submit Info"> <input type="submit" value="Update" name="update"><br>
						
					</form>
					</fieldset>
					
					<fieldset>
					<?php
					if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						else
						{ 
						echo "<b>Connection to MySQL database successful!</b>";
						}

						echo "<table border='1'>
						<tr>
						<th>First Name </th>
						<th>Last Name </th>
						<th>Favorite Color </th>
						</tr>";


					while($row=mysqli_fetch_array($result))
						{
						echo "<tr>";
						echo "<td>".$row['FirstName']."</td>";
						echo "<td>".$row['LastName']. "</td>";
						echo "<td>".$row['Color']."</td>"; 
						echo "</tr>";
						}
						echo "</table>";

					if ($upd > 0 && mysqli_num_rows($duplicate) > 0) {
						echo $fName . " " .$lName . " has been updated";
					}

					?>

					</fieldset>
				</td>
				-->
				<td colspan="2">
					<p>"Everything you can imagine is real." <br>
					-Pablo Picasso</p>

<!--
					<fieldset>
						How <i>you</i> doin?
						<br>
						You said your First Name is: <strong><?php echo $fName;?> </strong><br>
						Last Name is: <strong><?php echo $lName;?></strong> <br>
						Favorite color is: <strong><?php echo $color; ?> </strong>
					</fieldset>
-->
					<fieldset style="text-align:center;">
						<b>Tell me something :</b>
						<br>
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="eSubmit" method="post">
							<textarea placeholder="Write entry here" class="ibox" form="eSubmit" rows="4" cols="25" name="uinput" data-ajax="false"></textarea><br>
							<input type="submit" value="Submit Entry">
						</form>
					</fieldset>
				</td>
			</tr>
			
			<?php echo file_get_contents($newf);?>

			<!-- <div id="mininav"><p id = "Red Sun" class="lbutton">Red Sun</p></div> -->
		</table>

<?php 
	if($access !== "Guest") { 
?>
		<div style="text-align:center;">
		<form style="display:inline; " action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="stkbuttons" method="POST">
			<select name="stock" onchange="this.form.submit()">
				<option value="blank"></option>
				<option value="stocks" <?php if(($stock === "stocks")) {echo "selected";} ?>>Stocks</option>
			</select>

		
<?php 
		if ((($c_stock === "stocks") || ($stock === "stocks")) && (($stock !== "blank") && ($stock !== ""))) {
?>
		<div id="pages">
		<h3 id ="stkex" style="margin-bottom:0px;">Insert Ticker Symbol Below. Ex. GOOG for Google, MSFT for Microsoft.</h3>
		
			<?php echo "<strong>".$num . ' results found</strong><br>'; 
			echo '<strong>Page #</strong>&nbsp&nbsp<select name="pgsel" onchange="this.form.submit()">';
			$pagetotal = ceil($num / $perpage);
			if ($perpage * $pgsel - $perpage >= $num)
			{$paged = 0;}
			else {
			$paged = ($perpage * $pgsel - $perpage); 
			}
				$i=1;
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
				<option value="5" <?php if($perpage==5) {echo "selected";} ?>>5</option>
				<option value="7" <?php if($perpage==7) {echo "selected";} ?>>7</option>
				<option value="<?php echo $num; ?>" <?php if($perpage==$num) {echo "selected";} ?>>All</option>
			</select>
			</form>
			
			<input type="submit" value="Delete Stock" form='stkbuttons' name="delstock">
			<input type="text" name="tick" form='stkbuttons'>
			<input type="submit" Value="Insert Stock" name="istocks" form='stkbuttons'>
			<input type="submit" value="Update Stocks" name="updstocks" form='stkbuttons'>
			</div>
	</div>
	<div style="display:relative">
<?php
			echo "<table id = 'stocks' width='750px' border='.5'>
				<tr>
				<th style='width:70px;'>Symbol </th>
				<th style='width:115px;'>Name </th>
				<th style='width:70px;'>Last Trade Date </th>
				<th style='width:75px;'>Last Trade Time </th>
				<th style='width:55px;'>Previous Close </th>
				<th style='width:50px;'>Last Trade  </th>
				<th style='width:70px;'>Daily Change </th>
				<th style='width:62px;'>Initial Trade </th>
				<th style='width:70px;'>Overall Change </th>
				</tr>
				";
		$pclose = array();
		$ltrade = array();
		$itrade = array();
			$chkstocks = mysqli_query($con, "SELECT  * FROM stocks WHERE user='$username' Limit $paged,$perpage");
			if (mysqli_num_rows($chkstocks) !== 0) {
			while($row=mysqli_fetch_array($chkstocks))
				{
						$row = str_replace('"',"", $row);
						echo "<tr>";
						echo "<td>".$row['Symbol']."</td>";
						echo "<td>".$row['Name']. "</td>";
						echo "<td>".$row['LTradeDate']."</td>";
						echo "<td>".$row['LTradeTime']."</td>";
						echo "<td>".$row['PreviousClose']."</td>";
						echo "<td>".$row['LastTrade']."</td>";
						echo "<td>".$row['ChangeDay']."</td>";
						echo "<td>".$row['InitialTrade']."</td>"; 
						echo "<td>".$row['OChange']."</td>"; 
						array_push($pclose, $row['PreviousClose']);
						array_push($ltrade, $row['LastTrade']);
						array_push($itrade, $row['InitialTrade']);
						}
					}
				
				if (mysqli_num_rows(mysqli_query($con, "SELECT  * FROM stocks WHERE user='$username'")) !==0 ){
				echo "<tr><td><b>  Totals</b></td><td></td><td></td><td></td><td>";
				echo array_sum($pclose)."</td><td>";
				echo array_sum($ltrade)."</td><td>";
				echo (round(((array_sum($ltrade) / array_sum($pclose))-1),5,PHP_ROUND_HALF_DOWN)*100)."%</td><td>";
				echo array_sum($itrade). "</td><td>";
				echo (round(((array_sum($ltrade) / array_sum($itrade))-1),5,PHP_ROUND_HALF_DOWN)*100)."%</td>";
				echo "</tr>";
				echo "</table>";
				?> 
				
					<div id="btm_but">
						<input form="stkbuttons" type='submit' name='prev' value='Previous'>
						<input form="stkbuttons"type='submit' name='next' value='Next'>
					</div>
			</div>
				<?php
		}
	}
}

?>
</div> <!-- Middle -->
</div> <!-- Wrapper -->
</body>
</html>