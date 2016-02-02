

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!--[if lt IE 9]>
    	<script src="dist/html5shiv.js"></script>
    <![endif]-->

<?php
	//$con = mysqli_connect("", "", "", "");
	 $con = mysqli_connect("127.00.0.1", "", "", "");

	 date_default_timezone_set('America/Los_Angeles');
	$date = date('M-d-y').", ".date('h-i A');
	$month = date('F');
	$year = date('Y');



?>

<script type="text/javascript">

$(document).ready( function ()
{
	$content = $('.c_title');
	$navbuttons = $('.h_buttons');
	$('noscript').remove();
	$content.hide();
	$('.section').hide();
	$("#home").show();
	change();


	/// MENU BUTTON'S CHANGE CONTENT
	$($navbuttons).not("a[target=login]").on("click", function ()
	{
		var hash = ($(this).attr('target'));
		$content.hide();
		$("#"+hash).show();
		$('.h_buttons').css('background-color', '');
		$(this).css('background-color', '#766587');

	});

	//// TOP NAV BAR
	$(window).scroll(function()
	{
		if ($(window).scrollTop() > 123)
			$('#h_menu').addClass('navtop').removeClass('navstart');
		if ($(window).scrollTop() < 123)
			$('#h_menu').removeClass('navtop').addClass('navstart');
	});

	///// THIS IS FOR THE NEWS PAGE /////
	$(document).on("click", 'a[type=button]', function ()
	{
		$('.c_title').hide();
		$navbuttons.css('background-color', '#404031');
		$('#news').show();
		$('#h_menu >a:eq(1)').css('background-color', '#766587');
	})

	///// THIS IS FOR THE PORTFOLIO PAGE /////
	$(document).on("click", '.to_gallery', function ()
	{
		$content.hide();;
		$navbuttons.css('background-color', '#404031')
		$('#gallery').show();
		$('#h_menu >a:eq(4)').css('background-color', '#766587');
	})

	///// THIS IS FOR THE GALLERY PAGE /////
	$(document).on('mouseover', '.gallery_thumbnails', function ()
	{
		$x = $(this).attr('src');
		$target = $(this).attr('target')
		$('#'+$target).attr('src', $x);
	})

	/// THIS IS FOR THE ADMIN PAGE ////
	$('#select_section').on('change', function ()
	{
		$('.section').hide();
		$x = $(this).val();
		$('#'+$x).show();
	})

	/// THIS IS FOR THE ADMIN POST PAGE ////
	$(document).on('click', '#ajax_img .admin_attach', function()
	{
		$x = $(this).attr('value');
		$('#attach_val').val($x);
		$('#admin_img').attr('src', $x);
	})

	/// THIS IS FOR THE ADMIN POST PAGE ////
	$(document).on('click', '#ins_para', function()
	{
		$x = $('#post_text');
		$x.val($x.val()+'\n</p><span></span><p>\n');
	})

		/// THIS IS FOR THE ADMIN POST PAGE ////
	$(document).on('click', '#clear_img', function ()
	{
		$('#attach_val').val("");
		$('#admin_img').attr('src', "");
	})

	/// THIS IS FOR THE ADMIN POST PAGE ////
	$(document).on('click', '#clear_post', function ()
	{
		$('#post_text').val("");
	})


	/// THIS IS FOR THE ADMIN UPLOAD PAGE ////
	$(document).on('click', '#ajax_home_img .admin_attach', function()
	{
		$x = $(this).attr('value');
		$('#show_home_img').attr('src', $x);
		$this = $(this);
		if ($('.homeimgradio').is(':checked'))
		{
			$('.homeimgradio:checked').prev().val($x);
		}
	})

	/// THIS IS FOR THE ADMIN UPLOAD PAGE ////
	$(document).on('click', '.homeimgradio', function()
	{
		$x = $('.homeimgradio:checked').prev();
		$val = $x.val();
		if ($val !== "")
		{
			$('#show_home_img').attr('src', $val);
		}
	})

	/// THIS IS FOR THE ADMIN UPLOAD PAGE ////
	$(document).on('click', '#up_img .guess', function ()
	{
		$('#up_img input[name=newfolder]').val('');
		$('#up_img select[name=folder]').val('');

		$('#up_img input[name=new_port_folder]').val('');
		$('#up_img select[name=port_folder_selection]').val('');

		if ($('#yes').is(':checked'))
		{
			$('#non-port').hide();
			$('#port_folder').show();
		}
		if ($('#no').is(':checked'))
		{
			$('#non-port').show();
			$('#port_folder').hide();
		}
	})

	/// THIS IS FOR THE ADMIN UPLOAD PAGE ////
	$(document).on('change', '#up_img select', function ()
	{
		$('input[name=newfolder]').val('');
		$('input[name=new_port_folder]').val('');
	})

	/// THIS IS FOR THE ADMIN UPLOAD PAGE ////
	$(document).on('focus', '#up_img input[name=new_port_folder], #up_img input[name=newfolder]', function ()
	{
		$('select[name=port_folder_selection]').val('');
		$('select[name=folder]').val('');
	})

	/// THIS IS FOR THE ADMIN UPLOAD PAGE ////
	$("#ugh").change(function(){
    	readURL2(this);
    })

	/// THIS IS FOR THE ADMIN UPLOAD PAGE ////
	function readURL2(input)
	{
	    if (input.files && input.files[0])
	    {
	        var reader = new FileReader();
	        reader.onload = function (e)
	        {
	            $('#show_up_img').attr('src', e.target.result);
	    	}
	        reader.readAsDataURL(input.files[0]);
    	}
    }



	/// THIS IS FOR THE ADMIN ABOUT PAGE ////
	$(document).on('click', '.ins_para', function()
	{
		$this = $(this).parent();
		$this = $this.attr('for');
		$x = $('#'+$this);
		$x.val($x.val()+'\n<span></span>\n');
	})


	$(document).on('click', '#ajax_img_about .admin_attach', function()
	{
		$x = $(this).attr('value');
		$('#attach_val_about').val($x);
		$('#admin_about_img').attr('src', $x);
	})




	/// THIS IS FOR THE ADMIN PORTFOLIO PAGE ////


		/// THIS IS FOR THE ADMIN PORTFOLIO PAGE ////
	$(document).on('click', '#ajax_img_port .admin_attach', function()
	{
		$x = $(this).attr('value');
		$('#attach_val_port').val($x);
		$('#admin_img_port').attr('src', $x);
	})

	/// THIS IS FOR THE ADMIN PORTFOLIO PAGE ////
	$(document).on('click', '#ins_para_port', function()
	{
		$x = $('#port_text');
		$x.val($x.val()+'\n</p><span></span><p>\n');
	})

		/// THIS IS FOR THE ADMIN PORTFOLIO PAGE ////
	$(document).on('click', '#clear_img_port', function ()
	{
		$('#attach_val_port').val("");
		$('#admin_img_port').attr('src', "");
	})

	/// THIS IS FOR THE ADMIN PORTFOLIO PAGE ////
	$(document).on('click', '#clear_post_port', function ()
	{
		$('#port_text').val("");
	})


		/// THIS IS FOR THE ADMIN PORTFOLIO PAGE ////
	$(document).on('change', '#admin_submit_port select', function ()
	{
		$('input[name=new_port_folder_portpage]').val('');
	})


	$(document).on('change', 'select[name=port_folder_selection]', function ()
	{
		$y = $('#admin_submit_port select').val();
		if ($y == '')
		{
			$('#hide').hide();
		}
		else
		{
			$('#hide').show();
		}
	})


	function preload($pics)
	{
		$($pics).each(function (){
			$('<img />')[0].src = this;
		})
	}

	function change()
	{
		$('#big_img1').fadeIn(550).delay(6500).fadeOut(550, function ()
		{
			$('#big_img2').fadeIn(550).delay(6500).fadeOut(550, function ()
			{
				$('#big_img3').fadeIn(550).delay(6500).fadeOut(550, change)
			})
		});
	}



	$('#admin_submit').submit(function (event)
	{
		event.preventDefault();

		$form = $(this);
		$title = $form.find('input[name="post_title"]');

		var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: '/Stephanie%201.2/submit.php',
			cache: false,
			async: false,
			data: formData,
			success: function(data)
			{
				alert('Posted successfully');
				$title.val('');
				$('#post_text').val('');
				$('#attach_val').val('');
				$('#admin_img').attr('src','');

				var $response=$(data);
				var aval = $response.filter('.mini_post');
				var bval = $response.filter('.blog_post');
				var cval = $response.filter('#img_link_box');

				$('#ajax_mini').html(aval);
				$('#ajax_post').html(bval);
				$('.ajax_img_class').html(cval);
			},
			 contentType: false,
       		 processData: false
		});
	})

	$('#up_img').submit(function (event)
	{
		event.preventDefault();


		$a = $('#up_img input[name=newfolder]').val();
		$b = $('#up_img select[name=folder]').val();

		$x = $('#up_img input[name=new_port_folder]').val();
		$y = $('#up_img select[name=port_folder_selection]').val();

		if(($a == '' && $b == '') && ($x == '' && $y == ''))
			{
				alert('Please choose a folder to upload your photos into.');
				return
			}

		$form = $(this);
		$file = $form.find('input[name="img_upload"]');
		var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: '/Stephanie%201.2/submit.php',
			cache: false,
			async: false,
			data: formData,
			success: function(data)
			{
				alert('Uploaded successfully');
				$file.val('');
				$('#show_up_img').attr('src','');

				var $response=$(data);
				var cval = $response.filter('#img_link_box');
				var bval = $response.filter('#folder');
				var aval = $response.filter('#folder_container');
				var dval = $response.filter('.gal_container');

				$('input[name=newfolder]').val('');
				$('#selectfolder').html(bval);
				$('.ajax_img_class').html(cval);
				$('#select_port_folder').html(aval);
				$('#ajax_get_photos').html(dval);
			},
			 contentType: false,
       		 processData: false
		});
	})

	$('#home_submit').submit(function (event)
	{
		event.preventDefault();

		$form = $(this);
		$file = $form.find('input[name="img_upload"]');
		var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: '/Stephanie%201.2/submit.php',
			cache: false,
			async: false,
			data: formData,
			success: function(data)
			{
				alert('Updated successfully');
				$('#show_home_img').attr('src','');

				var $response=$(data);
				var cval = $response.filter('.big_img');
				$('#get_home_img').html(cval);
				change();

			},
			 contentType: false,
       		 processData: false
		});
	})

	$('#mission_form').submit(function (event)
	{
		event.preventDefault();
		$x = $('.aboutradio').is(':checked');

		if(!$x)
			{
				alert('Please check a radio button to the right to update information.');
				return
			}

		$form = $(this);
		$file = $form.find('input[name="img_upload"]');
		var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: '/Stephanie%201.2/submit.php',
			cache: false,
			async: false,
			data: formData,
			success: function(data)
			{
				alert('Updated successfully');

				var $response=$(data);
				var aval = $response.filter('#about_container');
				var bval = $response.filter('#abouttext');
				$('#ajax_about').html(aval);
				$('#ajax_aboutpage').html(bval);
				$('#attach_val_about').val('');
				$('#mission').val('');
				$('#admin_about_img').attr('src', '');

			},
			 contentType: false,
       		 processData: false
		});
	})

	$('#admin_submit_port').submit(function (event)
	{
		event.preventDefault();

		$form = $(this);
		$title = $form.find('input[name="post_title"]');

		var formData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: '/Stephanie%201.2/submit.php',
			cache: false,
			async: false,
			data: formData,
			success: function(data)
			{
				alert('Posted successfully');
				$title.val('');
				$('#port_text').val('');
				$('#attach_val_port').val('');
				$('#file_port').val('');
				$('#admin_img_port').attr('src','');

				var $response=$(data);
				var aval = $response.filter('#ajax_post_port');


				$('#ajax_port').html(aval);
			},
			 contentType: false,
       		 processData: false
		});
	})
/*
$(window).on("load", function ()
	{
		preload($pics);
	});

	$pics = glob("Pictures/iFunny/*.jpg");
	*/
}); /////// DOCUMENT.READY FUNCTION


/*

(function (){
var images = ['https://pbs.twimg.com/profile_images/2284174624/4l5krl3re8cpp0nfsgw6.png', 'http://fromthedeskofmardrag.files.wordpress.com/2014/03/dog-2.jpg'];
var i = 0;
var num = images.length;
function change ()
	{
	i++;
	if (i == num) { i = 0;};
	$('#big_img').attr('src', images[i]);
	};
	setInterval(change, 3000);

})();

(function() {
    var rotator = document.getElementById('big_img');  // change to match image ID
                          // change to match images folder
    var delayInSeconds = 5;                            // set number of seconds delay
    // list image names
    var images = ['https://pbs.twimg.com/profile_images/2284174624/4l5krl3re8cpp0nfsgw6.png',
    'http://fromthedeskofmardrag.files.wordpress.com/2014/03/dog-2.jpg'];

    // don't change below this line
    var num = 0;
    var changeImage = function() {
        var len = images.length;
        big_img.src = images[num++];
        if (num == len) {
            num = 0;
        }
    };
    setInterval(changeImage, delayInSeconds * 1000);
})();



Our mission at Rue Films, LLC. is to provide quality low-budget films with meaning. If you want blockbusters with very little story and a whole lot of action, look else where. Here we focus on the story and bring take-home points for the viewers to be entertained with, but reflect upon.<span></span>

Immerse yourself in the widely imaginative but down to earth films we here at Rue Films, LLC proudly present. You can view our Portfolio here.<span></span>

Below you can meet our highly motivated team.



Screenwriter, director, photographer, and an absolutely amazing person. Stephanie LaRue is a kind-hearted soul with an enchanting personality that leaves you wanting more. Currently holding her bacheler's degree in Film from the Academy of Art Institute of Hollywood, she has written and directed two screen plays along with producing several others. As an avid writer, several feature films are always in the works constantly being polished to create a true LaRue original. </p><br><p>She enjoy's writing, directing, reading, walking the beach and being outside as much as possible. Her bubbly attitude and honest-to-goodness work ethic always showing, she becomes a magnet for positivity and always promoting good will towards others that is simply inspiring. <span></span>If you would like to contanct Stephanie, she can be reached at StephLaRue@email.com



Pretty much, the coolest guy you'll ever meet. Not many people can do what he does, but he can. Positive attiude, intelligent, thoughtful, too much to say really.

*/


</script>

<!-- PHP -->
<?php






/////////// CREATE FUNCTIONS /////////
/////////// CREATE FUNCTIONS ////////
/////////// CREATE FUNCTIONS ////////
/////////// CREATE FUNCTIONS ////////

function doQuery($input)
{
	global $con;
	return mysqli_query($con, $input);
}

function escape($input)
{
	global $con;
	$input = mysqli_real_escape_string($con, $input);
	return $input;
}




/////////// GET FUNCTIONS FOR SITE/////////
/////////// GET FUNCTIONS FOR SITE/////////
/////////// GET FUNCTIONS FOR SITE/////////
/////////// GET FUNCTIONS FOR SITE/////////


/////////// GET THE HOME IMAGES/////////
/////////// GET THE HOME IMAGES/////////

function getHomeImg()
{
	$result = doQuery("SELECT * FROM gallery WHERE location ='home' ORDER BY num_order");
	$i=1;
	while ($row = mysqli_fetch_array($result))
	{
		echo "<img id='big_img$i' class='big_img' src='".$row['img']."' />";
		$i++;
	}
}

/////////// GET THE MINI NEWS POSTS FOR HOME PAGE/////////
/////////// GET THE MINI NEWS POSTS FOR HOME PAGE/////////

function getMiniPost()
{
	$result = doQuery("SELECT * FROM posts ORDER BY PID DESC LIMIT 4");
	$i=2;
	while ($row = mysqli_fetch_array($result))
	{
		$i++;
		echo "<div class='mini_post' id='mini ".$row['PID']."'>\n";
		if (strlen($row['img']) > 2)
		{
			echo "<img class='mini_image' src='".$row['img']."' alt='Image has been deleted.' />\n";
		}
		echo "<h3 class='mini_title'>".$row['title']."</h3>\n";
		echo "<p class='mini_date'>".$row['thedate']."</p>\n";
		echo "<div class='mini_text'><p>";
		echo $row['text']."</p></div>\n";
		echo "<a href='#page'><p class='to_top'>Top</p></a>";
		echo "<p class='read_more'><a href ='#blog ".$row['PID']."' type='button' >Read More </a></p>";
		echo "</div>\n\n";
	}
}

/////////// GET THE NEWS POSTS FOR NEWS PAGE/////////
/////////// GET THE NEWS POSTS FOR NEWS PAGE/////////

function getPost()
{
	$result = doQuery("SELECT * FROM posts ORDER BY PID DESC");
	$i=2;
	while ($row = mysqli_fetch_array($result))
	{
		$i++;
		echo "<div class='blog_post' id='blog ".$row['PID']."'>\n";
		if (strlen($row['img']) > 2)
		{
			echo "<img class='blog_image' src='".$row['img']."' alt='Image has been deleted.' />\n";
		}
		echo "<h1 class='blog_title'>".$row['title']."</h1>\n";
		echo "<p class='blog_date'>".$row['thedate']."</p>\n";
		echo "<div class='blog_text'><p>";
		echo $row['text']."</p></div>\n";
		echo "<a href='#page'><h4 class='to_top'>Top</h4></a>\n";
		echo "</div>\n\n";
	}
}

/////////// GET THE ABOUT CONTENT FOR ABOUT PAGE/////////
/////////// GET THE ABOUT CONTENT FOR ABOUT PAGE/////////

function getAbout()
{
	$result = doQuery("SELECT * FROM info WHERE section = 'about' AND subsection = 'a_statement'");
	$result2 = doQuery("SELECT * FROM info WHERE section = 'about' AND subsection = 'name_content'");
	echo "<div id='about_container'>";
	echo "<h1 id='a_statement'>Our Mission</h1><br>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<p>".$row['text']."</p><span></span>";
	}
	while ($row = mysqli_fetch_array($result2))
	{
		echo "<div class='name_content'>
		<img class='about_img' src='".$row['img']."' alt='        No Image' />
		<h2 class='name_h'> " .$row['title']." </h2>

		<p class='name_t'>" .$row['text']." </p>

		</div>";
	}
	echo "<a href='#page'><h4 class='to_top'>Top</h4></a>";
	echo "</div>";
}


/////////// GET THE PORTFOLIO CONTENT FOR PORTFOLIO PAGE/////////
/////////// GET THE PORTFOLIO CONTENT FOR PORTFOLIO PAGE/////////

function getPortfolio()
{
	$result = doQuery("SELECT * FROM info WHERE section='portfolio'");
	echo "<div id='ajax_post_port'>";
	while ($row = mysqli_fetch_array($result))
	{
		$folder = str_replace('/','',$row['folder']);
		$folder = str_replace(' ', '_' ,$folder);
		echo "<div class='port_post'>
				<img class='port_image' src='".$row['img']."' />
				<a href='#top".$folder."'><p class='to_gallery'>View Gallery Here</p></a>
					<h1 class='port_title'>".$row['title']."</h1>

					<div class='port_text'> ".$row['text']." </div> <!-- port_text -->

					<a href='#page'><h4 class='to_top'>Top</h4></a>
				</div> <!-- port_post -->
				";
	}
	echo "</div>";
}

/////////// GET THE PHOTOS FOR THE GALLERY PAGE/////////
/////////// GET THE PHOTOS FOR THE GALLERY PAGE/////////

function getPhotos()
{
	$result1 =  doQuery("SELECT * FROM gallery WHERE folder IS NOT NULL AND folder <> '' AND folder LIKE '%Portfolio%' GROUP BY folder");
	$i=1;
	while ($row = mysqli_fetch_array($result1))
	{
		$title = substr($row['folder'], 10);
		$title = ucwords($title);
		$folder = str_replace('/','',$row['folder']);
		$folder = str_replace(' ', '_' ,$folder);
		$pics = glob("MediaFiles/".$row['folder']."/*.jpg");
		echo "<div class='gal_container' id='top".$folder."'>
			<img class='gallery_image' id='".$folder."' src='".$pics[0]."' />\n";
		echo "<h1>".$title."</h1>";
		echo "<div class='thumbnail_container'>";
		foreach ($pics as $pic)
		{
			echo "<a href='$pic' target='_blank'>\n";
			echo "<img class ='gallery_thumbnails' target = '".$folder."' src ='$pic' />\n";
			echo "</a>\n";
		}
		echo "<a href='#page'><h4 class='to_top'>Top</h4></a>";
		echo "</div> <!-- gal_container -->";
		echo "</div>";
		$i++;
	}
}


///////////////// ADMIN PAGE FUNCTIONS ////////////////////
///////////////// ADMIN PAGE FUNCTIONS ////////////////////

/////////// GET THE PHOTO LINKS FOR THE ADMIN PAGE/////////
/////////// GET THE PHOTO LINKS FOR THE ADMIN PAGE/////////

function getPhotosBlog()
{
	$result1 =  doQuery("SELECT * FROM gallery WHERE folder IS NOT NULL AND folder <>'' GROUP BY folder");
	echo "<div id='img_link_box'>";
	while ($row = mysqli_fetch_array($result1))
	{
		$pics = glob("MediaFiles/".$row['folder']."/*.jpg");
		$i=1;
		echo "<b>".$row['folder']." folder</b><br>";
		foreach ($pics as $pic)
		{
			echo "<span class='admin_attach' value='$pic' id='img$i'>Img$i</span>";
			$i++;
		}
		echo "<br>";
	}
		echo "</div>";
}

/////////// INSERT POST INTO DATABASE FOR THE ADMIN PAGE/////////
/////////// INSERT POST INTO DATABASE FOR THE ADMIN PAGE/////////

function insert()
{
	global $year, $date, $month;
	if (isset($_POST['post_title']) && isset($_POST['post_body']))
	{
		$title = $_POST['post_title'];
		$title = escape($title);

		$text = $_POST['post_body'];
		$text = escape($text);

		$imgpath = $_POST['post_img2'];



		doQuery("INSERT INTO posts (title, thedate, text, img, month, year)
		VALUES ('$title' ,'$date', '$text', '$imgpath', '$month', '$year')");
	}
}

/////////// UPLOAD PHOTOS INTO DATABASE AND FOLDER FOR THE ADMIN PAGE/////////
/////////// UPLOAD PHOTOS INTO DATABASE AND FOLDER FOR THE ADMIN PAGE/////////

function uploadImg($input, $input2)
{
	$img = $input;
	$folder = $input2;

	if(!is_dir("MediaFiles/Portfolio"))
	{
		mkdir("MediaFiles/Portfolio", 0777, true);
	}
	if (!is_dir("MediaFiles/".$folder))
	{
		mkdir("MediaFiles/".$folder, 0777, true);
	}
	$imgpath = "MediaFiles/".$folder."/". $img['name'];
	if(!file_exists("MediaFiles/".$folder."/" . $img['name']))
	{
		move_uploaded_file($img['tmp_name'], "MediaFiles/".$folder."/". $img['name']);
		$dup = false;
	}

	if($input == $_FILES['img_upload'] && !$dup)
	{
		doQuery("INSERT INTO gallery (img, folder)
		VALUES ('$imgpath', '$folder')");
	}
}

/////////// CHANGE THE HOME IMAGES ON THE ADMIN PAGE/////////
/////////// CHANGE THE HOME IMAGES ON THE ADMIN PAGE/////////

function changeHome()
{
	doQuery("UPDATE gallery SET location = NULL, num_order = NULL WHERE location ='home'");
	for($i=0; $i<4; $i++)
	{
		$home = "homeimg".$i;
		$home = $_POST[$home];
		$insert = "UPDATE gallery SET location='home', num_order='$i' WHERE img ='$home'";
		doQuery($insert);
	}
}


function getAboutText()
{
	$result = doQuery("SELECT * FROM info WHERE section = 'about' AND subsection = 'a_statement'");
	$result2 = doQuery("SELECT * FROM info WHERE section = 'about' AND subsection = 'name_content'");
	echo "<div id='abouttext'>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<div><p style='font-size:30px'><input type='radio' name='editabout' value='".$row['title']."'
		form='mission_form' class='aboutradio'> <b>SELECT TO EDIT</b></p><h2>".$row['title']."</h2>".$row['text']."</div><span></span>";
	}

	while($row = mysqli_fetch_array($result2))
	{
		echo "<div><p style='font-size:30px'><input type='radio' name='editabout' value='".$row['title']."'
		form='mission_form' class='aboutradio'> <b>SELECT TO EDIT</b></p><img class='admin_about_img' src='".$row['img']."' alt='        No Image'/><h2>".$row['title']."</h2>".$row['text']."</div><span></span>";
	}
	echo "</div>";
}


function insPort()
{
	if (isset($_POST['port_title']) && isset($_POST['port_text']) && isset($_POST['post_img2_port']))
	{
		$title = $_POST['port_title'];
		$body = $_POST['port_text'];
		$imgpath = $_POST['post_img2_port'];
		$folder = $_POST['port_folder_selection'];

		doQuery("INSERT INTO info (section, text, img, title, folder)
			VALUES ('portfolio', '$body', '$imgpath', '$title', '$folder')");
	}
}


function folder()
{
	echo "<div id='folder'>";
	echo "<select name='folder'>
		<option selected></option>";
		$result = doQuery("SELECT * FROM gallery WHERE folder IS NOT NULL AND folder <> '' AND folder NOT LIKE '%Portfolio%'GROUP BY folder");
		while ($row = mysqli_fetch_array($result))
		{
			echo "<option value='".$row['folder']."'>".$row['folder']."</option>";
		}
		echo "</select><br></div>";
}

function portFolder()
{
	echo "<div id='folder_container'>";
	echo "<select name='port_folder_selection'>
		<option selected></option>";
		$result = doQuery("SELECT * FROM gallery WHERE folder IS NOT NULL AND folder <> '' AND folder LIKE '%Portfolio%' GROUP BY folder");
		while ($row = mysqli_fetch_array($result))
		{
			$title = substr($row['folder'], 10);
			$title = ucwords($title);
			echo "<option value='".$row['folder']."'>".$title ."</option>";
		}
		echo "</select><br></div>";
}
	?>
