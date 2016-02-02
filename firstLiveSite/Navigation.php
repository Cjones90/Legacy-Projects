<title> Rue Films </title>
        <?php include "Scripts.php"; ?>
</head>
<body>
<div id="wrapper">
<div id ="header">
	<h1 id ="hname"> Rue Films </h1>
		<div id="hbuttons">
			<a href="index.php" input type="button" class="hbutton" id ="Home" value = "Home"> Home </a> 
            <div id="medbut" class="hbutton">
    			<a href="Media.php#vids" input type="button" class="hbutton" id ="Media" value = "Media"> Media </a>
                <div id="dropdown">
                    <a class="drop_but" href ="Media.php#vids">Videos</a><br>
                    <a class="drop_but" href ="Media.php#pics">Pictures</a>
                </div>
            </div>
			<a href="forum.php" input type="button" class="hbutton" id ="Forum" value = "Forum"> Forum </a>
            <a href="logout.php" input type="button" class="hbutton" id="Logout" value = "Logout">Logout</a>
		</div>

        <div id="quote"> 
        "Not all those who wander are lost." <br>
         - J.R.R. Tolkien</div>


</div> <!-- HEADER -->

<div id= "left">
		
		<label for="tbox" style="font-size:20px; font-weight:bold; color:black;">Leave a comment below.</label>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="lmessage"> 
            <textarea class="ibox" id ="tbox" form="lmessage" name="message" cols="26" rows="5" method="post" required></textarea>		 
			<input type="submit" class="lsubmit" value = "Send">
		</form>

        <div id="lcomment"> 
            <?php echo file_get_contents($left); ?> 
        </div>

    <?php if($_SERVER['SERVER_NAME'] == "localhost") { ?>
		<label for="clistbox" style="font-size:20px; font-weight:bold; color:black;">Checklist:</label>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="clist">
			<textarea class="ibox" id="clistbox" form="clist" name="clistbox" rows="5" cols="26"></textarea>
            <input type="submit" class="lsubmit" value = "Send">
		</form>

		<div id="myclist">
			<?php echo file_get_contents($cfile); ?>
		</div>	
        <?php } ?>
</div> <!-- LEFT NAV -->
