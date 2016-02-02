<!DOCTYPE html>
<html>
<head>
	<title>Game 1</title>
	<link rel="stylesheet" href="style.css?<?php echo filemtime('style.css'); ?>">
	<script src="../jquery-2.1.1.js"></script>
	
</head>
<body>
	<div id="gameBox">
		<div class="target" id='div1'></div>

	</div>

	<div id="coords">
	</div>
	<div id='step'></div>

	<p id='host'>Main Page </p>
	<iframe id='msgbox' width= "450" height="130" src="http://localhost/apps/fun/msgbox.php"></iframe>
	<button id='btn'>Send</button>
	<p id='para'></p>

<script src='msg.js'></script>
<script src="script.js?<?php echo filemtime('script.js'); ?>"></script>
</body>
</html>