<?php

function ft_split($str)
{
	$tmp = explode(' ', $str);

	foreach ($tmp as $k => $v)
	{
		if ($v == NULL)
			unset($tmp[$k]);
	}

	sort($tmp);
	return ($tmp);
}

?>