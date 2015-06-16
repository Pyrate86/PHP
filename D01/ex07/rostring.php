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

	$res = ft_split($argv[1]);
	$last = array_shift($res);
	array_push($res, $last);
	echo implode(' ', $res)."\n";
?>