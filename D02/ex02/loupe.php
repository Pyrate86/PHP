#!/usr/bin/php
<?php

function others($match)
{
	return (">" . strtoupper($match[1]) . "<");
}

function titles($match)
{
	return ($match[1] . strtoupper($match[2]) . $match[3]);
}

function links($match)
{
	$match = $match[0];
	$match = preg_replace_callback("/(title=)([\/#\w\'\" ]+)( |>)/s", "titles", $match);
	$match = preg_replace_callback("/>([^<]+)</s", "others", $match);
	return ($match);
}

if ($argc > 1 && file_exists($argv[1]))
{
	$str = file_get_contents($argv[1]);
	$str = preg_replace_callback("/<a[^>]*>(.+?(?=<\/a>))<\/a>/s", "links", $str);
	echo $str;
}
?>
