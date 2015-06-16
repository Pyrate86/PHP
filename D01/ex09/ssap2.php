#!/usr/bin/php
<?php
	
	function array_insert($tab, $value, $index)
	{
		$tmp = array_slice($tab, $index);
		array_splice($tab, $index);
		array_push($tab, $value);
		return (array_merge($tab, $tmp));
	}

	function is_alpha($c)
	{
		return (strtolower($c) >= 'a' && strtolower($c) <= 'z');
	}

	function sorting($tab, $str)
	{
		$i = 0;

		while ($str[$i])
		{
			$index = 0;
			while ($tab[$index])
			{
				$strn = ord($str[$i]);
				$tabn = ord($tab[$index][$i]);
				if (is_alpha($str[$i]))
					$strn -= 1000;
				if (is_alpha($tab[$index][$i]))
					$tabn -= 1000;
				if ($strn < $tabn)
				{
					echo "\t$strn < $tabn => $str[$i] < ".$tab[$index][$i]."\n";
				$tab = array_insert($tab, $str, $index);
				echo "## Debug SUP ##\n";
				echo "=> $str\n";
				var_dump($tab);
				echo "###########\n\n";
					return ($tab);
				}
				else if ($strn > $tabn)
				{
					echo "\t$strn > $tabn => $str[$i] > ".$tab[$index][$i]."\n";
					while ($tab[$index])
						$index++;
				}
				else if ($strn == $tabn)
				echo "\t$strn = $tabn => $str[$i] = ".$tab[$index][$i]."\n";

				$index++;
			}
			$i++;
		}
		array_push($tab, $str);
		echo "## Debug END ##\n";
		echo "=> $str\n";
		var_dump($tab);
		echo "###########\n\n";
		return ($tab);
	}

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
	$tmp = array();
	foreach ($argv as $val)
	{
		$tmp = array_merge($tmp, ft_split($val));
	}

	$res = array();
	foreach ($tmp as $val)
	{
		$res = sorting($res, $val);
	}

	// foreach ($res as $val)
	// {
	// 	echo $val."\n";
	// }
?>