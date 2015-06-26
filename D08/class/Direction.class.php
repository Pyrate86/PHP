<?php

abstract Class Direction {

/*###########################################################################\
|#		Attribute															#|
\###########################################################################*/

	const NORTH = 0;
	const EAST = 1;
	const SOUTH = 2;
	const WEST = 3;

/*\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
\/		Static functions													\/
\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/*/

	public static function doc()
	{
		$fp = fopen ("class/doc/".get_class().".doc.txt", "r");
		while ($doc = fgets ($fp))
			echo $doc;
		echo PHP_EOL;
		fclose ($fp);
	}

	public static function getDirection ($value)
	{
		if ($value == self::NORTH)
			return "Nord";
		if ($value == self::EAST)
			return "Est";
		if ($value == self::SOUTH)
			return "Sud";
		if ($value == self::WEST)
			return "Ouest";
	}

	public static function drawDirection ($value)
	{
		if ($value == self::NORTH)
			return "&uarr;";
		if ($value == self::EAST)
			return "&rarr;";
		if ($value == self::SOUTH)
			return "&darr;";
		if ($value == self::WEST)
			return "&larr;";
	}

}

?>