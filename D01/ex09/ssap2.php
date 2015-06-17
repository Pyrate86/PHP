#!/usr/bin/php
<?

function is_alpha($c)
{
	return ($c >= 'a' && $c <= 'z');
}

function ccmp($c1, $c2)
{
	$c1 = strtolower($c1);
	$c2 = strtolower($c2);
	if (is_alpha($c1))
		$char1 = 1;
	else if (is_numeric($c1))
		$char1 = 2;
	else
		$char1 = 3;
	if (is_alpha($c2))
		$char2 = 1;
	else if (is_numeric($c2))
		$char2 = 2;
	else
		$char2 = 3;
	if ($char1 != $char2)
		return ($char1 - $char2);
	return (strcmp($c1, $c2));
}
function cmp($str1, $str2)
{
	while ($j < strlen($str1) && $j < strlen($str2))
	{
		if (ccmp($str1[$j], $str2[$j]) > 0)
			return (1);
		if (ccmp($str1[$j], $str2[$j]) < 0)
			return (-1);
		$j++;
	}
	if ($j < strlen($str1))
		return (1);
	if ($j < strlen($str2))
		return (-1);
	return (0);
}

if ($argv[1])
{
	array_shift($argv);
	foreach ($argv as $arg)
	{
		$tab = explode(" ", $arg);
		foreach ($tab as $str)
		{
			if (strlen($str))
				$tab2[] .= $str;
		}
	}
	usort($tab2, "cmp");
	foreach ($tab2 as $str)
		echo $str."\n";
}
?>
