

<div id='wrapper'>

	<div id='header'>
		<h1>Template #1</h1>
		<p>Login</p>

		<div id='login_box'>
			<form id='login' method='POST' action="submit.php">
				<h5>Username:</h5><input type='text' name='username'>
				<h5>Password:</h5><input type='password' name='password'>
				<br>
				<input type='submit' value='Login'>
				<input type='submit' value='Logout' name='logout'>
			</form>
		</div>
		
		
		
	</div> <!-- header -->

	<div id='nav'>

		<a href='index.php' >Home</a>
		<a href='about.php' >About</a>
		<?php 
		if (isset($_COOKIE['techx_temp1_user'])) {
			if ($_COOKIE['techx_temp1_user'] == 1) {
				echo "<a href='admin.php' > Admin </a>";
			}
		}
		?>



	</div>
