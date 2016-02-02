
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="fserverSS.css">
<link href='http://fonts.googleapis.com/css?family=IM+Fell+English:400,400italic' rel='stylesheet' type='text/css'>

<script type="text/javascript">

////////////////////////////////////////////////
//////////// Below is working code ////////////


$(document).ready(function () {
	$("#file").bind('change', function () {
		$("#filesize").html("<strong>" + (this.files[0].size/ 1024).toFixed(2) + " kb </strong>");
			if(this.files[0].size > 1000000)  {
			$("#filesize").html("<strong>" + (this.files[0].size / 1024).toFixed(2) + " kb </strong><span style='color:red'>File too large</span>");
			};
		});
	});

$(document).ready(function () {
	$("#video").bind('change', function () {
		$("#vidsize").html("<strong>" + (this.files[0].size/ 1024).toFixed(2) + " kb </strong>");
			if(this.files[0].size > 1000000)  {
			$("#vidsize").html("<strong>" + (this.files[0].size / 1024).toFixed(2) + " kb </strong><span style='color:red'>File too large</span>");
			};
		});
	});

$(document).ready(function() {
	$(".hbutton").click(function() {
		$("#midtitle").html(this.value);
		});
	});

/*$(document).ready(function () {
	$y = ($(window).width() - 196);
	$x = ($(window).width()- 26);
	$("#header").width($x);
	$("#middle").width($y);
	z = ($("#Productions").offset().left + 11.5);
	$("#pcontainer").css({"left": z});
	$(window).resize(function () {
		x = ($(window).width() - 26);
		y = ($(window).width() - 196);
		$("#header").width(x);
		$("#middle").width(y);
		z = ($("#Productions").offset().left + 11.5);
		$("#pcontainer").css({"left": z});
		});
	});
*/

$(window).on("load", function (e) {
    var hash = location.hash,
        divs = $('.med'),
        element = $(hash);
    divs.hide();
    element.show();
});

$(window).on("hashchange", function (e) {
    var hash = location.hash,
        divs = $('.med'),
        element = $(hash);
    divs.hide();
    element.show();
});

$(document).ready(function () {
	var produp = true;
	$("#RedSun, #Escape").hide();
	$(".hbutton:not(#RedSun, #Escape, #Productions)").click(function () {
		if (!produp){
			$("#RedSun, #Escape").fadeTo(500, 0);
			$("#RedSun, #Escape").hide(100);
			produp = !produp;
		}
	});
	$("#Productions").click(function () {
		if (produp) {
		$("#RedSun, #Escape").fadeTo(500, 1);
		$("#RedSun, #Escape").show(200);
		}
		else
		{
		$("#RedSun, #Escape").fadeTo(500, 0);
		$("#RedSun, #Escape").hide(100);
		}
		produp = !produp;
	});

});


</script>

<?php

       ////// Create connection

	//$con = mysqli_connect("", "", "", "");
	$con = mysqli_connect("", "", "", "my_db"); 
	//checks cookies to make sure they are logged in
	if(isset($_COOKIE['ID_my_site'])) {
		$username = $_COOKIE['ID_my_site'];
		$pass = $_COOKIE['Key_my_site'];
		$access = $_COOKIE['Access_my_site'];


		$check = mysqli_query($con, "SELECT * FROM members WHERE userName = '$username'") or die(mysqli_error());

		while($info = mysqli_fetch_array($check)) {

			//if the cookie has the wrong password, they are taken to the login page
			if ($pass != $info['password'])
			{
				header("Location: login.php");
			}
			//otherwise they are shown the admin area
			else {
			}
		}
	}
	//if the cookie does not exist, they are taken to the login screen
	else {
		header("Location: login.php");
	}

date_default_timezone_set('America/Los_Angeles');

						// For Pacific Time zone
						if (date("h") == 12) {
							$e = 12; }
						elseif (date("h") > 12) {
							$e = (date("h")-12); }
						else { $e = date("h");}

/////// Global PHP's variables set

$fName = $lName = $color = $input = $g = $clist = $clear = $tlist =  $upd= $checked ="";
$tick= $updstocks=$delstock=$stock=$del="";
$sqlname = $alter = $duplicate= $update= $drop= $table= $symbol= $change=$quotes =$c_stock="";


$left = "txtdocs/leftside.txt";
$cfile = "txtdocs/clist.txt";
$newf = "txtdocs/test.txt";
$arr = file($newf);

////// For all user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	//// Top Form
	if (isset($_POST["fName"])) {
	 $fName = trim($_POST["fName"]); }
	if (isset($_POST["lName"])) {
	 $lName = trim($_POST["lName"]); }
	if (isset($_POST["color"])) {
	 $color = $_POST["color"];
	 $checked = $_POST["color"]; }
	 if (isset($_POST["update"])){
	 $upd = 1; }

	 /// Tell Me Something Entry
	 if (isset($_POST["uinput"])){
	 $g = $_POST["uinput"]; }

	 /// Left Div's
	 if (isset($_POST["clistbox"])){
	 $clist = $_POST["clistbox"]; }
	 if (isset($_POST["clear"])){
	 $clear = " "; }
	 if (isset($_POST["message"])){
	 $tlist = $_POST["message"]; }

	 //// Stock table
	 if (isset($_POST["tick"])){
	 $tick = $_POST["tick"]; }
	 if (isset($_POST["updstocks"])){
	 $updstocks = 1; }
 	 if (isset($_POST["delstock"])){
	 $delstock = 1; }
 	 if (isset($_POST["perpage"])){
	 $perpage = $_POST["perpage"]; }
	 if (isset($_POST["pgsel"])){
	 $pgsel = $_POST["pgsel"]; }

	if (isset($_POST["stock"])) {
		$stock = $_POST["stock"];
	 setcookie('if_stocks', $_POST["stock"], time() + 3600); }

	foreach ($_POST as $key => $val)
	{
		$pos = strpos($key , "vid_");
		if ($pos === 0) {
			$new = str_replace("vid_", "", $key);
			$del = 1;
		}
	}
}
if(isset($_COOKIE['if_stocks'])){
$c_stock = $_COOKIE['if_stocks'];
}

if (!isset($_POST["perpage"])){
	 $perpage = 7; }
if (!isset($_POST["pgsel"])){
 $pgsel = 1; }

 	 if (isset($_POST["prev"]) && !isset($_POST["pgsel"])){
	 $pgsel = 1; }
	 elseif(isset($_POST["prev"]))
	 	{$pgsel = ($pgsel - 1);}
	 if (isset($_POST["next"])){
	 $pgsel = ($pgsel + 1); }


///// Check to make sure only numbers used in $age
function keephtml ($r) {
	if ($r == "") {
		return $r; }
	elseif(!filter_var($r, FILTER_VALIDATE_INT)) {
			$r = "<strong>" . $r . ".<br></strong><i> Sorry but that is not a valid input, please try again.</i>";
			return $r;
			}
	else { return "<strong>" . $r . "</strong>"; }
			}

////// Middle of page reference array iteration
function test1 () {
static $g = 0;
$cars=array("Toyota" => "Tacoma", "BMW" => "1200 series", "Lambo" => "Platinum");

foreach($cars as $g=>$h) {
	echo $g, " ", $h;
	echo "<br>";
	}
	}


////// For documents being uploaded to Photos page

function iset() {
$finfo = $_FILES['img'];
$path_parts = pathinfo($finfo['name']);
$shortfile = $path_parts['filename'];
$filetype = $finfo['type'];
$filesize = round(($finfo['size'] / 1024),2);
$filetemp = $finfo['tmp_name'];
$filename = $finfo['name'];
$fileerr = $finfo['error'];
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["img"]["name"]);
$extension = end($temp);

if((($filetype == "image/gif") || ($filetype == "image/jpeg") || ($filetype == "image/jpg")
	|| ($filetype == "image/pjpeg") || ($filetype == "image/x-png") || ($filetype == "image/png")) &&
	($filesize < 500) && in_array($extension, $allowedExts))
{
	if ($fileerr > 0)
	{
		echo "Error: " . $fileerr . "<br>";
	}
	else
	{
		echo $shortfile. " is a ".$extension."!<br>";
		echo $filetype."<br>";
		echo $filesize."kb<br>";

		if(file_exists("Photos/" . $filename))
		{
			echo $shortfile." already exists.";
		}
		else
		{
			move_uploaded_file($filetemp, "Photos/". $filename);
			echo $shortfile. " was put into the Image folder!";
		}
	}
}
else
{
	return "Sorry, your file could not be uploaded at this time.";
}
}

//////// Load pictures in /Photos folder
function getpics() {
	$pics = glob("Photos/*.jpg");
	$count = 0;
		foreach ($pics as $pic) {
		$count++;
		if ($count%2) { ?> <tr><td><img class="photos" src ="<?php echo $pic; ?>" /></td>
		<?php }
		else { ?> <td><img class="photos" src ="<?php echo $pic; ?>" /></td>
		<?php }
	}
}

function vset() {
$finfo = $_FILES['vid'];
$path_parts = pathinfo($finfo['name']);
$shortfile = $path_parts['filename'];
$filetype = $finfo['type'];
$filesize = round(($finfo['size'] / 1024),2);
$filetemp = $finfo['tmp_name'];
$filename = $finfo['name'];
$fileerr = $finfo['error'];
$allowedExts = array("flv", "mp4", "m3u8", "ts", "3gp", "mov", "avi", "wmv");
$temp = explode(".", $_FILES["vid"]["name"]);
$extension = end($temp);

if((($filetype == "video/x-flv") || ($filetype == "video/mp4") || ($filetype == "application/x-mpegURL")
	|| ($filetype == "video/MP2T") || ($filetype == "video/3gpp") || ($filetype == "video/quicktime")
	|| ($filetype == "video/x-msvideo") || ($filetype == "video/x-ms-wmv")) &&
	($filesize < 500000) && in_array($extension, $allowedExts))
{
	if ($fileerr > 0)
	{
		echo "Error: " . $fileerr . "<br>";
	}
	else
	{
		echo $shortfile. " is a ".$extension."!<br>";
		echo $filetype."<br>";
		echo $filesize."kb<br>";

		if(file_exists("Videos/" . $filename))
		{
			echo $shortfile." already exists.";
		}
		else
		{
			move_uploaded_file($filetemp, "Videos/". $filename);
			echo $shortfile. " was put into the Videos folder!";
		}
	}
}
else
{
	return "Sorry, your file could not be uploaded at this time.";
}
}




////////////////////////////////////////////////
///////////// Code work in progress below /////////////





function put_yt()
{
	/*
	$vids = glob("Videos/*.wmv");
	$count = 0;
		foreach ($vids as $vid) {
		$count++;
		if ($count%2) { ?> <tr><td><img class="photos" src ="<?php echo $vid; ?>" /></td>
		<?php }
		else { ?> <td><img class="photos" src ="<?php echo $vid; ?>" /></td>
		<?php }
	}
	*/
	$yt = $_POST['yt'];
	if (strpos($yt, "watch?v=") === 23)
	{
		global $con, $username;
		$yt = str_replace("watch?v=", "embed/", $yt);
		$yt = str_replace("http://", "//", $yt);
		$embed = $yt;
		$i_video = "INSERT INTO media (filepath, user, class)
			VALUES ('$embed','$username','video')";
		mysqli_query($con, $i_video);
	}
	else
	{
		echo "<tr><td>Not a valid Youtube URL.</tr></td>";
	}

}

function retr_yt()
{
	global $con, $username;
	$yt = "SELECT user, filepath, PID FROM media ";
	$put = mysqli_query($con, $yt);
	$count = 0;
	$i = 0;
	while($row=mysqli_fetch_array($put))
	{
		$count++;
		$i++;
		if($count%2)
		{
			echo "<tr><td><iframe class='photos' name='vid_".$row['PID']."' src='".$row['filepath']."'>";
			echo "</iframe>";
			if($username === $row['user'])
			{
				echo "<form action='".htmlentities($_SERVER['PHP_SELF'])."' method='POST' class='delvid'>
				<input type='submit'  value='Delete Video' name='vid_".$row['PID']."'>
				</form>
				</td>";
			}
		}
		else
		{
			echo "<td><iframe class='photos' name='vid_".$row['PID']."' src='".$row['filepath']."'>";
			echo "</iframe>";
			if($username === $row['user'])
			{
				echo "<form action='".htmlentities($_SERVER['PHP_SELF'])."' method='POST' class='delvid'>
				<input type='submit'  value='Delete Video' name='vid_".$row['PID']."'>
				</form>
				</td>";
			}
		}
	}
			echo "</tr>";
}

if ($del > 0)
{
	global $con, $username, $new;
	$sel_vid = "DELETE FROM media WHERE user='$username' AND PID='$new'";
	mysqli_query($con, $sel_vid);

}

//////// Load videos in /Videos folder
function getvids() {
	$vids = glob("Videos/*.wmv");
	$count = 0;
		foreach ($vids as $vid) {
		$count++;
		if ($count%2) { ?> <tr><td><img class="photos" src ="<?php echo $vid; ?>" /></td>
		<?php }
		else { ?> <td><img class="photos" src ="<?php echo $vid; ?>" /></td>
		<?php }
	}
}


////////////////  Getting result and displaying it

//////////////// mysqli_fetch_array turns array into string



		//// Resetting Primary Key/PID/Auto_increment to 1

///////////// For STOCK TABLE

			// Setup Variables

	$userstock = mysqli_query($con, "SELECT Symbol, user FROM stocks WHERE user='$username'");
	$stocks = array();
	while ($ustocks = mysqli_fetch_array($userstock)) {
		array_push($stocks, $ustocks['Symbol']);
	}
	if (isset($tick)) {
		$placestock = ",".$tick;
	}
	else {$placestock = "";}
	$stockList = implode(",",$stocks).$placestock;
	$stockFormat = "snd1t1l1pp2";
	$host = "http://finance.yahoo.com/d/quotes.csv";
	$requestUrl = $host."?s=".$stockList."&f=".$stockFormat;

	// Pull data (download CSV as file)
	$filesize=2000;
	$handle = fopen($requestUrl, "r");
	$raw = fread($handle, $filesize);
	fclose($handle);

	// Split results, trim way the extra line break at the end
	 $quotes = explode("\n",trim($raw));

foreach($quotes as $quoteraw) {
	$quoteraw = str_replace(", I", " I", $quoteraw);
	$quote = explode(",", $quoteraw);
	$modstocks = mysqli_query($con, "SELECT  * FROM stocks WHERE Symbol='$quote[0]' AND user='$username'");
	if ($quote[0] !== "Missing System Variable.") {
	if(mysqli_num_rows($modstocks) === 0 && (($updstocks + $delstock) === 0) && isset($_POST['tick']))
	{
		$insertstk = "INSERT INTO stocks (Symbol, Name, LTradeDate, LTradeTime, LastTrade,
			PreviousClose, ChangeDay, InitialTrade, user)
			VALUES ('$quote[0]','$quote[1]','$quote[2]', '$quote[3]', '$quote[4]', '$quote[5]',
				'$quote[6]', '$quote[5]', '$username')";
		mysqli_query($con, $insertstk);
	}
	}
	if (mysqli_num_rows($modstocks) === 1 && $updstocks > 0) {
		$fetch = mysqli_fetch_array($modstocks);
		$initialT = $fetch['InitialTrade'];
		$change = (round((((($quote[4] / $initialT))-1) *100),2)). "%";
		$updchange = "UPDATE stocks Set LTradeDate = '$quote[2]' , LTradeTime = '$quote[3]',
		LastTrade = '$quote[4]', PreviousClose='$quote[5]', ChangeDay = '$quote[6]', OChange='$change'
		WHERE Symbol ='$quote[0]' AND user='$username'";
		mysqli_query($con, $updchange);
	}
	if (mysqli_num_rows($modstocks) === 1 && ($delstock > 0) && isset($_POST['tick'])) {
		$tick = '"'.$tick.'"';
		$updchange = "DELETE FROM stocks WHERE Symbol ='$tick'";
		mysqli_query($con, $updchange);
	}


}

$countrows = mysqli_query($con, "SELECT COUNT(*) FROM stocks WHERE user='$username'");
$countresult = mysqli_fetch_array($countrows);
$num = $countresult['COUNT(*)'];

$countrows2 = mysqli_query($con, "SELECT COUNT(*) FROM media WHERE user='$username'");
$countresult2 = mysqli_fetch_array($countrows2);
$num2 = $countresult2['COUNT(*)'];

			$pagetotal = ceil($num2 / $perpage);
			if ($perpage * $pgsel - $perpage >= $num2)
			{$paged = 0;}
			else {
			$paged = ($perpage * $pgsel - $perpage);
			}
			$i=1;


$drop = "DELETE FROM members";
#mysqli_query($con, $drop);



////////Middle text entries
if($g !== "") {
	if(count($arr)%2)
	{
	file_put_contents($newf, "<td class='entry'><strong>Entered on " . date("m/d/y") . " at " . date($e.":i:s") ." by ". $username . "</strong><br>     " . $g . "  </td></tr>\r\n", FILE_APPEND);
	}
	else {file_put_contents($newf, "<tr><td class='entry'><strong>Entered on " . date("m/d/y") . " at " . date($e.":i:s") ." by ". $username . "</strong><br>  " . $g . "  </td>\r\n", FILE_APPEND);
	}
	}

///////Check list box
if($clist !== "")
	{
	file_put_contents($cfile, "\r\n" . $clist. "<br>", FILE_APPEND);
	}

if($clear !== "")
	{
	file_put_contents($cfile,  $clear);
	}


if($tlist !== "")
	{
	file_put_contents($left, "\r\n" . $tlist . "<br>", FILE_APPEND);
	}

	/*

$duplicate = mysqli_query($con, "SELECT  * FROM mypersons WHERE FirstName ='$fName' AND LastName='$lName'");

if(mysqli_num_rows($duplicate) > 0 && $upd > 0) {
	$update="UPDATE mypersons SET LastName='$lName', Color='$color', FirstName='$fName' WHERE FirstName='$fName' AND LastName='$lName'";
	mysqli_query($con, $update);
	}
	elseif (mysqli_num_rows($duplicate) == 0 && $upd =="" && strlen($fName) > 2 && strlen($lName) > 2) {
	$sqlname="INSERT INTO mypersons(FirstName, LastName, Color)
	VALUES ('$fName', '$lName', '$color')";
	mysqli_query($con, $sqlname);
	}

$result = mysqli_query($con, "SELECT * FROM mypersons");


 ////////   Creating a table
$table = "CREATE TABLE members (
	PID INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (PID),
	userName varCHAR (30),
	password varCHAR (30))";


//////// Checking if table is is created or not
 if(mysqli_query($con,$table))
 	  {
	  echo "Table members created successfully";
	  }
	  else
	  {
	  echo "Error creating table: " . mysqli_error($con);
	  }

*/

?>
