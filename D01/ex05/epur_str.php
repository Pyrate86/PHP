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
		var_dump($tmp);
		return ($tmp);
	}
	echo implode(' ', ft_split($argv[1]))."\n";
?>