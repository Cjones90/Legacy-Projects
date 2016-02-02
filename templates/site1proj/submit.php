<?php 
	if (isset($_POST['username'])) {
		if(($_POST['username'] == 1) && ($_POST['password'] == 1)) {
			setcookie('techx_temp1_user', 1, time()+3600);
			setcookie('techx_temp1_pw', 1, time()+3600);
			if (htmlentities($_SERVER['SERVER_NAME']) == "localhost") {
				header('Location: http://localhost/templates/Site1proj');
			}
			else {
				header('Location: http://www.techx.us/templates/Site1proj');
			}
		}
		else {
			if (htmlentities($_SERVER['SERVER_NAME']) == "localhost") {
				header('Location: http://localhost/templates/Site1proj');
			}
			else {
				header('Location: http://www.techx.us/templates/Site1proj');
			}
		}
	}

if(isset($_POST['logout'])) {
	setcookie('techx_temp1_user', 1, time()-3600);
	setcookie('techx_temp1_pw', 1 , time()-3600);

	if (htmlentities($_SERVER['SERVER_NAME']) == "localhost") {
			header('Location: http://localhost/templates/Site1proj');
	}
	else {
		header('Location: http://www.techx.us/templates/Site1proj');
	}
}



?>