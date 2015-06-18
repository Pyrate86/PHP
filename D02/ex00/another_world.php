#!/usr/bin/php
<?php
	if ($argc > 1)
		$test = preg_replace("/\t/", " ", $argv[1]);
		echo preg_replace("/ {2,}/", " ", $test);
		echo "\n";
	}
?>