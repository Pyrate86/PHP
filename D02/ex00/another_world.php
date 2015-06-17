#!/usr/bin/php
<?php
	$test = preg_replace("/\t/", " ", $argv[1]);
	echo preg_replace("/ {2,}/", " ", $test);
	if ($argc > 1)
		echo "\n";
?>