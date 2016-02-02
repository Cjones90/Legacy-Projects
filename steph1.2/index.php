<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen">
	<meta name="google-site-verification" content="jkvwc70YLIieC-A0wJCxqRxgJakMqEpsbEToLiYDg88" />
	<noscript><link href="no-js.css" rel="stylesheet" type="text/css" media="screen"></noscript>

 <!-- <link href="<//?php bloginfo("stylesheet_url"); ?>" rel="stylesheet" type="text/css"> -->
	<link href='http://fonts.googleapis.com/css?family=IM+Fell+English:400,400italic' rel='stylesheet' type='text/css'>
	<title>	Rue Films</title>
	<?php include "script.php"; ?>
</head>
<body>
	<div id="wrapper">
		<div id="page">
			<div id="header">


				<h2 id="h_text"> Rue Films </h2>
				<div class='navstart' id="h_menu">
				<noscript>
					<a href="#home" class="h_buttons" >Home</a>
					<a href="#news" class="h_buttons" >News</a>
					<a href="#about" class="h_buttons" >About</a>
					<a href="#portfolio" class="h_buttons" >Portfolio</a>
					<a href="#gallery" class="h_buttons" >Gallery</a>
				<!-- 	<a href="#media" class="h_buttons" >Media</a>
					<a href="#inventory" class="h_buttons"> Inventory </a> -->
				</noscript>
					<a target="home" class="h_buttons" >Home</a>
					<a target="news" class="h_buttons" >News</a>
					<a target="about" class="h_buttons" >About</a>
					<a target="portfolio" class="h_buttons" >Portfolio</a>
					<a target="gallery" class="h_buttons" >Gallery</a>
					<a target="login" class="h_buttons">Login</a>

						<form id='login_container' action='submit.php' method='POST'>
							<b>Username:</b>
							<input type='text' name='username' id='username'>
							<b>Password:</b>
							<input type='password' name='password' id='password'><br>
							<input type='submit' value='Login'><input type='submit' value='Logout' name='logout'><br>
							<b>Note: At this time, only the administrator can login while <br>the site is under construction. Thank you </b>
						</form>


			<?php if (isset($_COOKIE['ID_RF_USERNAME']))
				{
					if ($_COOKIE['ID_RF_USERNAME'] == '')
						{
							?>
							<a target="admin" class="h_buttons" >Admin</a>
							<?php
						}
				}
			?>
				<!-- 	<a target="media" class="h_buttons" >Media</a>
					<a target="inventory" class="h_buttons"> Inventory </a> -->
				</div> <!-- HEADER BUTTONS -->
			</div><!-- HEADER -->





			<!-- HOME PAGE -->
			<div class="c_title" id="home">

				<h1 class="page_title">Home</h1>


				<div id='get_home_img'> <?php getHomeImg(); ?>
					<noscript>
						<img id='big_img_no_js' src='http://familybugs.files.wordpress.com/2012/04/professional-group-of-five-for-web.jpg' />
					</noscript>
				</div>



				<div id='ajax_mini'> <?php  getMiniPost(); ?> </div>


			</div><!-- HOME SECTION -->






			<!-- NEWS PAGE -->
			<div class="c_title" id="news">

				<h1 class="page_title">News</h1>


				<div id='ajax_post'> <?php getPost(); ?> </div>

			</div><!-- NEWS SECTION -->




			<!-- ABOUT PAGE -->
			<div class="c_title" id="about">

				<h1 class="page_title">About</h1>


				<div id='ajax_about'> <?php getAbout(); ?> </div>

			</div><!-- ABOUT SECTION -->






			<!-- PORTFOLIO SECTION -->
			<div class="c_title" id="portfolio">

				<h1 class="page_title">Portfolio</h1>

				<div id='ajax_port'> <?php getPortfolio(); ?> </div>

			</div><!-- PORTFOLIO SECTION -->






			<!-- GALLERY PAGE -->
			<div class="c_title" id="gallery">

				<h1 class="page_title">Gallery</h1>


				<div id='ajax_get_photos'> <?php getPhotos(); ?> </div>

			</div><!-- GALLERY SECTION -->






<?php if (isset($_COOKIE['ID_RF_USERNAME']))
		{
			if ($_COOKIE['ID_RF_USERNAME'] == '')
			{
				?>

			<div class='c_title' id='admin'>
				<h1 class="page_title">Admin</h1><br>
				<p>Admin Page</p>

			<?php
				if (isset($_POST['post_title']))
				{
					echo $display;
				}
			?>

				<select id='select_section'>
					<option selected></option>
					<option value='edit'>Upload Photos</option>
					<option value='portfoliopage'>Post a Portfolio Project</option>
					<option value ='postnews'>Post News</option>
					<option value='aboutpage'>Edit About Page</option>
				</select><br><br>

				<h3>Step 1. Upload some Photos by selecting "Upload Photos"!</h3><br>
				<h3>Step 2. Post your Portfolio by selecting "Post a Portfolio Project"!</h3><br>
				<h3>Step 3. Post some updates by selecting "Post News"!</h3><br>

				<div id='postnews' class='section'>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id ='admin_submit' method="POST" enctype="multipart/form-data">

						<img id='admin_img' src='' alt="Click an Image to the right to view" />

						<div id='outer_container'>
						<div id="upload_container">
							<p>Choose from previously uploaded images by clicking an image below. </p><br>
							<b>Or you can forego adding an image entirely and clcik Submit Post when you're done.</b><br>
						</div>

						<div id='ajax_img' class="ajax_img_class" ><?php getPhotosBlog() ?> </div>
						<textarea id='attach_val' cols='30' rows='1' name='post_img2' ></textarea><br>
						<input type='button' value='Clear Images' id='clear_img'>
						</div>


						<b val='title'>Title of your post:</b>
							<input type='text' name='post_title'>
						<b val='body'>Body:</b>
							<label for='post_text'>
								<input type='button' id='ins_para' value='Insert New Paragraph'>
							</label>
						<textarea id='post_text' cols='60' rows='15' name='post_body'></textarea><br><br>
						<input type='button' value='Clear' id='clear_post'>


						<input type='submit' name='submit_post' value="Submit Post">

				</form>
			</div>

			<div id='edit' class='section'>

				<form id='home_submit' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="POST">
					<h3>You can edit your home page with photos you've already uploaded here.</h3>

				<img id='show_home_img' src= ''/>

				<div id='edit_1st_container'>
					<p>Choose the 3 images you wish to display on your home page here:</p>
				<div class="ajax_img_class" id='ajax_home_img'><?php getPhotosBlog() ?> </div>

				<input type='text' class='homeimg' id='homeimg1' name='homeimg1'>  <input type='radio' class='homeimgradio' name='edithome'> <b> 1st Img  </b>
				<input type='text' class='homeimg' id='homeimg2' name='homeimg2'>  <input type='radio' class='homeimgradio' name='edithome'> <b> 2nd Img  </b>
				<input type='text' class='homeimg' id='homeimg3' name='homeimg3'>  <input type='radio' class='homeimgradio' name='edithome'> <b> 3rd Img  </b>
				<br>
				<input type='submit' value='Submit'>
				</div>
				</form>

				<div id='edit_2nd_container'>

					<h3>Upload your photos here!</h3><br>

					<form id='up_img' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="POST" enctype="multipart/form-data">
						You <b>must</b> choose a folder.<br>
						Upload into a Portfolio folder?<br>

						<input type='radio' class='guess' name='port_folder' id='yes' value='yes'>Yes
						<input type='radio' class='guess' name='port_folder' id='no' value='no'>No<br>
						<b>Note:</b> Anything uploaded into a Portfolio folder will be visible in the gallery
						under the folder you specify.<br><br>


					<div id='non-port'>
						Choose a folder to upload into:<br>
						<div id='selectfolder'> <?php folder(); ?> </div>
						Or create a new folder:<br>
						<input type='text' name='newfolder'><br>
					</div>

					<div id='port_folder'>
						Choose a folder to upload into:<br>
						<div id='select_port_folder'> <?php portFolder(); ?> </div>
						Or create a new folder:<br>
						<input type='text' name='new_port_folder'><br>
					</div>

					Upload an image to the chosen folder here:
						<img id='show_up_img' src= ''/><br>

						<input type='file' id='ugh' name='img_upload'>
						<input type='submit' value='Upload'>

					</form>
				</div>

			</div>

			<div id='aboutpage' class='section'>

				<form method="POST" id='mission_form' enctype="multipart/form-data" action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>'>
					<h2>Update Information</h2>
						<label for='mission'>
							<input type='button' class='ins_para' value='Insert New Paragraph'>
						</label><br>
					<textarea id='mission' cols='40' rows='8' name='mission'></textarea><br><br>


					<div class="ajax_img_class" id='ajax_img_about'> <?php getPhotosBlog() ?> </div>
					<textarea id='attach_val_about' cols='40' rows='1' name='team_img' ></textarea><br>
					<input type='submit' value='Update'><br><br>

					<img id='admin_about_img' src='' />

				</form>

				<div id='ajax_aboutpage'> <?php getAboutText(); ?> </div>

			</div> <!-- aboutpage -->


			<div id='portfoliopage' class='section'>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id ='admin_submit_port' method="POST" enctype="multipart/form-data">

						<img id='admin_img_port' src='' alt="Click an Image to the right to view" />

						<div id='outer_container_port'>
						<div id="upload_container_port">

							<p>Choose from previously uploaded images by clicking an image below. </p><br>
							<b>This will be the image displayed on your portfolio page for your project.</b><br>
						</div>

						<div id='ajax_img_port' class="ajax_img_class" ><?php getPhotosBlog() ?> </div>
						<textarea id='attach_val_port' cols='30' rows='1' name='post_img2_port' ></textarea><br>
						<input type='button' value='Clear Images' id='clear_img_port'>
						</div>

						<div id='port_folder_portpage'>
							Choose the folder containing the images for your Project:<br>
							If you are posting a New Project, upload some photos first. <br>
							<div id='select_port_folder_portpage'> <?php portFolder(); ?> </div>
						</div>

						<div id='hide'>
							<b val='title'>Title of your Project:</b>
								<input type='text' name='port_title'>
							<b val='body'>Body:</b>
								<label for='port_text'>
									<input type='button' id='ins_para_port' value='Insert New Paragraph'>
								</label>
							<textarea id='port_text' cols='60' rows='15' name='port_text'></textarea><br><br>
							<input type='button' value='Clear' id='clear_post_port'>


							<input type='submit' name='submit_port' value="Submit Post">
						</div>
				</form>

			</div> <!-- ADMIN PORTFOLIO PAGE -->

		</div> <!-- ADMIN PAGE -->
			<?php
		}
	}
?>




			<div id="footer">
			</div><!-- FOOTER -->
		</div> <!-- PAGE -->
	</div> <!-- WRAPPER -->

</body>

</html>
