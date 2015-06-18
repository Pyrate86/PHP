#!/usr/bin/php
<?php
	$url = $argv[1];
	preg_match("/http:\/\/([^\/]*)/", $url, $match);
	$dir = $match[1];
	$site = file_get_contents($url);

	$i = preg_match_all('/<img.*src="(.*([^\/]*))\?.*".*>/U', $site, $matches);

	$res = array();
	while (--$i >= 0)
	{
		if ($matches[1][$i][0] == '/')
			$matches[1][$i] = $url.$matches[1][$i];
		$res[$i] = 	array(
						"url"	=> $matches[1][$i],
						"name"	=> $matches[2][$i]
						);
	}
	mkdir($dir);
	foreach ($res as $val)
	{

		$image = file_get_contents($val['url']);
		file_put_contents($dir."/".$val['name'], $image);
		echo "Creation de ".$val['name']."\n";
	}
?>