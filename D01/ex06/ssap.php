#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$tmp = explode(' ', $str);
		foreach ($tmp as $k => $v)
		{
			if ($v == NULL)
				unset($tmp[$k]);
		}
		return ($tmp);
	}

	array_shift($argv);
	$res = array();
	foreach ($argv as $val)
	{
		$res = array_merge($res, ft_split($val));
	}
	
	sort($res);

	foreach ($res as $val)
	{
		echo $val."\n";
	}
?>