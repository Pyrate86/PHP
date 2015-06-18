#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
	$output = `w -hi`;
	$i = preg_match_all("/([^ ]*) ([^ ]*).*(\d{2}:\d{2}).*\n/", $output, $matches);
	$res = array();
	while (--$i >= 0)
	{
		if ($matches[2][$i] != "console")
			$matches[2][$i] = "tty".$matches[2][$i];
		$key = $matches[2][$i];
		$res[$key] = array(
					"name"	=> $matches[1][$i],
					"tty"	=> $matches[2][$i],
					"date"	=> date("D j"),
					"time"	=> $matches[3][$i]
					);
	}
	ksort($res);
	foreach ($res as $val)
	{
		echo $val['name']." ".$val['tty']."  ".$val['date']." ".$val['time']."\n";
	}
?>