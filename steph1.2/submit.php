<?php
if (isset($_POST['username'])){
	if (($_POST['username'] == '') && ($_POST['password'] == ''))
	{
		setcookie('ID_RF_USERNAME', '', time()+3600);
		setcookie('PW_RF_PASSWORD', '' , time()+3600);
		header('Location: http://localhost/Stephanie%201.2/');
	}
}

if(isset($_POST['logout']))
{
	setcookie('ID_RF_USERNAME', '', time()-3600);
	setcookie('PW_RF_PASSWORD', '' , time()-3600);
	header('Location: http://localhost/Stephanie%201.2/');
}

include 'script.php';

if (isset($_POST['post_title']))
{
	insert();
	getMiniPost();
	getPost();
	getPhotosBlog();
}

if (isset($_POST['homeimg1']))
{
	changeHome();
	getHomeImg();
}

if (isset($_FILES['img_upload']))
{
	if ($_POST['port_folder'] == 'no')
	{
		$folder = $_POST['folder'];
		if (strlen($_POST['newfolder']) > 2)
		{
			$folder = $_POST['newfolder'];
		}
	}
	if ($_POST['port_folder'] == 'yes')
	{
		$folder = $_POST['port_folder_selection'];
		if (strlen($_POST['new_port_folder']) > 2)
		{
			$folder = $_POST['new_port_folder'];
			$folder = "Portfolio/".$folder;
		}
	}
	uploadImg($_FILES['img_upload'],$folder);
	getPhotosBlog();
	folder();
	portFolder();
	getPhotos();
}


if(isset($_POST['editabout']) && isset($_POST['mission']))
{
	$name = $_POST['editabout'];
	$ins = $_POST['mission'];
	$ins = escape($ins);
	if (strlen($ins) > 5)
	{
		doQuery("UPDATE info SET text = '$ins' WHERE (subsection ='name_content' OR subsection ='a_statement') AND title='$name'");
	}
	if (strlen($_POST['team_img']) > 3)
	{
		$img = $_POST['team_img'];
		doQuery("UPDATE info SET img = '$img' WHERE (subsection ='name_content' OR subsection ='a_statement') AND title='$name'");
	}
	getAboutText();
	getAbout();

}

if (isset($_POST['port_title']))
{
	insPort();
	getPortfolio();
}

header('Location: http://localhost/Stephanie%201.2/');
?>

<!--
header('Location: http://localhost/2nd%20Site/');
header('Location: http://ruefilms.cu.cc/');
header('Location: http://ruefilms.com/');
-->
