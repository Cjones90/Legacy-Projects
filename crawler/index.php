<?php

	$file = file_get_contents($url);
	$links = array();
	$imgs = array();

	$dom = new DOMDocument;
	$dom->loadHTML($file);

	

	$img = $dom->getElementsByTagName('img');

	if(count($img->length) > 0){
		foreach ($img as $n) {
			if($n->hasAttribute('src')) {
				$url = $n->getAttribute('src');
				$url = "<img src='".$url."' />";
				array_push($imgs, $url);
			}
		}
	}

function crawl() {
	$a = $dom->getElementsByTagName('a');
	if(count($a->length) > 0){
		foreach ($a as $n) {
			if($n->hasAttribute('href')) {
				$url = $n->getAttribute('href');
				$url = parse_url($url, PHP_URL_PATH);
				$url = 'http://www.you.com'.$url;
				$url = "<a href='".$url."' >Link</a>";
				array_push($links, $url);
			}
		}
	}
}


	foreach ($links as $key) {
		echo $key."<br>";

	}

	foreach ($imgs as $key) {
		echo $key."<br>";
	}



/*
function crawlImg ($file) {
	$str = strstr($file, "<img");
	$img = strstr($str, ">", true).">";
	if (strlen($img) > 1){
		echo $img;
	}
	$img2 = strstr($file, $img);
	if (($replace = str_replace($img, "", $img2)) != false) {
		crawlImg($replace);
	}
}
	

$arr = array();
$limit = 0;
$links = 0;

crawlLink($file, $url);

foreach ($arr as $link) {
	echo $link."<br>";
}

echo $arr[16];

$file = file_get_contents($arr[16]);
crawlLink($file, $arr[16]);




function crawlLink ($file, $url) {
	global $limit, $arr, $links, $url;

	$str = strstr($file, "<a");
	$img = strstr($str, "</a>", true)."</a>";
	$link = str_replace('href="/', 'href="'.$url.'', $img);
	if ($limit <= 1) {
		insert($link);
	}

	$img2 = strstr($file, $img);
	if (($replace = str_replace($img, "", $img2)) != false) {
		if ($links <= 1){
			crawlLink($replace, $url);
		}
	}

	$links++;
	$limit++;
}

function insert($url){
	global $arr;
	$str = strstr($url, 'http://www.youporn');
	$link = strstr($str, '"', true)."";

	if (strlen($link) > 5){
		array_push($arr, $link);
	}
}




echo "<a href='".$link."'> Link ".$i."</a>"; */






	/*

	$strpos = strpos($file, $img);

	$new = strpos($file, $img, $strpos);

	echo substr($img, 0);

	foreach ($imgs as $pic) {
		echo $pic;
	};

	*/

	?>