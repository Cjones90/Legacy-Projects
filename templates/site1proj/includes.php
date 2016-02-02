
<link rel='stylesheet' href='style.css?t=<?php echo filemtime('style.css'); ?>'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>


<?php
$filename = 'file.txt';

if(isset($_POST['text']) && isset($_POST['new_text'])) {
	$search = $_POST['text'];
	$replace = $_POST['new_text'];
	write($replace, $filename, $search);
}


function read($fn, $search) {
	$file = file_get_contents($fn);

	$text = substr_replace($search.":", "oh my", strlen($search)+1, -1);
	var_dump($text);
	$text = explode(":", $text);
	return $text[1];
	/*$text = explode("\r", $file);
	var_dump($text);

	$text = explode($search, $text[0]);
	var_dump($text);

	$file = explode($search.':', $file);
	$oldtext = explode(";", $file[1]);
	var_dump($oldtext);
	return $oldtext[0];
	*/
}



function write($newtext, $fn, $search) {
	$file = file_get_contents($fn);
	$arr = explode($search.':', $file);
	$oldtext = explode(";", $arr[1]);
	if ($oldtext[0]== ""){
		$oldtext[0] = " ";
		$str = str_replace(substr($oldtext[0],0,0), $newtext, $file);
	}
	$str = str_replace($oldtext[0], $newtext, $file);
	file_put_contents($fn, $str);
	return read($fn, $search);
};

?>