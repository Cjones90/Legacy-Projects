	<!DOCTYPE html>
	<html>
	<?php
	//$con = mysqli_connect("", "", "", "");
	$con = mysqli_connect("127.00.0.1", "", "", "my_db"); ?>
	<body>
	<fieldset style = "width:325px">
		<legend style="font-size:50px; font-weight:bold;"> Login </legend>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<table>
				</tr>
				<tr>
					<td>Username:</td>
					<td> <input type="text" name="username" maxlength="40"> </td>
				</tr>
				<tr>
					<td>Password</td>
					<td> <input type="password" name="pass" maxlength="72"> </td>
				</tr>
				<tr>
					<td colspan="2" align="left">
						<input type="submit" name="loginsubmit" value="Login">
						<input type="submit" name="guestsubmit" value="Log in as Guest">
						<input type="submit" name="register" value="Register">
						<p> If you do not have a <b>Username</b>, please <b>Register</b> or login as a <b>Guest</b> with limited privleges. </p>
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
</body>

<?php

	 //Checks if there is a login cookie
	if(isset($_COOKIE['ID_my_site'])) {

		//if there is, it logs you in and directes you to the members page
		$username = $_COOKIE['ID_my_site'];
		$pass = $_COOKIE['Key_my_site'];

		$check = mysqli_query($con, "SELECT * FROM members WHERE userName='$username'") or die(mysqli_error());

		while($info = mysqli_fetch_array($check)) {
			if($pass != $info['password'])
			{}
			else {
				header("Location: index.php");
			}
		}
	}

	//if the login form is submitted
	if(isset($_POST['loginsubmit'])) {
		$inserted = "";
		// makes sure they filled it in
		if(!$_POST['username'] | !$_POST['pass']) {
			die("Please fill in all required fields");
		}

		// checks it against the database

		$check = mysqli_query($con, "SELECT * FROM members WHERE userName = '".$_POST['username']."'") or die(mysqli_error());

		//Gives error if user dosen't exist
		$check2 = mysqli_num_rows($check);
		if ($check2 == 0) {
			echo "That user does not exist. Try again or Register below";
			$_POST['register'] = true;
		}
		while($info = mysqli_fetch_array($check)) {
			$epass = crypt($_POST['pass'], $info['password']);
			// $epass = password_verify($_POST['pass']);
		/*	$_POST['pass'] = stripslashes($info['password']);
				$info['password'] = stripslashes($info['password']);

				$_POST['pass'] = md5($_POST['pass']);
		*/
				//gives error if the password is wrong
				if ($epass !== $info['password']) {
				die('Incorrect password, please try again.');
				}
				else
				{
					 // if login is ok then we add a cookie
				$_POST['username'] = stripslashes($_POST['username']);
				$hour = time() + 3600;
				setcookie(ID_my_site, $_POST['username'], $hour);
				setcookie(Key_my_site, $epass, $hour);
				setcookie(Access_my_site, $info['access'], $hour);
				 //then redirect them to the members area
				header("Location: index.php");
				}
		}
	}
	else if (isset($_POST['guestsubmit']))
		{
			$_POST['username'] = "Guest";
			$_POST['pass'] = "Guest";
			$hour = time() + 3600;
			setcookie(ID_my_site, $_POST['username'], $hour);
			setcookie(Key_my_site, $_POST['pass'], $hour);
			header("Location: index.php");
		}

	else {  // if they are not logged in
	}
?>

<!--  This script first checks to see if the login information is contained in a cookie on the users
	computer. If it is, it tries to log them in. If this is successful they are redirected to the members area.

	If there is no cookie, it allows them to login. If the form has been submitted, it checks it
	against the database and if it was successful sets a cookie and takes them to the members
	area. If it has not been submitted, it shows them the login form.
-->


<?php

	if (isset($_POST['register']) || isset($_POST['regsubmit']))
	{
?>
	<fieldset style = "width:325px">
		<legend style="font-size:50px; font-weight:bold;"> Register </legend>
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		<table border="0">
			<tr>
				<td style="width:150px">Username:</td>
				<td style="width:150px"> <input type="text" name="username" maxlength="30"> </td>
			</tr>
			<tr>
				<td style="width:150px">Password: </td>
				<td style="width:150px"> <input type="password" name="pass" maxlength="72"> </td>
			</tr>
			<tr>
				<td style="width:150px">Confirm Password: </td>
				<td style="width:150px"> <input type="password" name="pass2" maxlength="72"> </td>
			</tr>
			<tr>
				<th colspan=2> <input type="submit" name="regsubmit" value="Register"> </th>
			</tr>
		</table>
	</form>
	</fieldset>
<?php
	}
	 //This code runs if the form has been submitted
	if (isset($_POST['regsubmit'])) {
		 //This makes sure they did not leave any fields blank
		if(!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2']) {
			die('You need to complete all require fields');
		}

		$usercheck = $_POST['username'];
		$check = mysqli_query($con, "SELECT userName from members where userName='$usercheck'") or die(mysqli_error());
		$check2= mysqli_num_rows($check);

		 //if the name exists it gives an error
		if ($check2 !=0) {
			die('Sorry, the Username '.$_POST['username'].' is already in use.');
		}

		 //this makes sure both passwords entered match
		if ($_POST['pass'] != $_POST['pass2']) {
			die('Passwords do not match');
		}

		// here we encrypt the password and add slashes if needed
		$_POST['pass'] = crypt($_POST['pass']);

		 // now we insert it into the database
		$insert = "INSERT INTO members (userName, password, access)
			VALUES ('".$_POST['username']."', '".$_POST['pass']."', 'user')";
		$add_member = mysqli_query($con, $insert);
		unset($_POST['register']);
		unset($_POST['regsubmit']);
?>
		<fieldset style = "width:370px">
			<legend style="font-size:50px; font-weight:bold;"> Registered</legend>
		<p>Thank you, you have registered - you may now login above.</p>
	</fieldset>
<?php
	}
?>




<!--  If the form has not been submitted, they are shown the registration form, which collects the
		username and password.Basically what this does is check to see if the form has been
		submitted. If it has been submitted it checks to make sure that the data is all OK (passwords
		match, username isn't in use) as documented in the code. If everything is OK it adds the user
		to the database, if not it returns the appropriate error.
-->
