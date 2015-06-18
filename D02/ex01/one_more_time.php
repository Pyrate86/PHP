#!/usr/bin/php
<?php
	if ($argc > 1)
	{

		$month = "[Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre";

		$day = "[Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche";

		$exp = "/^($day) (\d{1,2}) ($month) (\d{4}) (\d{2}):(\d{2}):(\d{2})$/";

		if (!preg_match($exp, $argv[1], $matches))
			echo "Wrong Format\n";
		else
		{
			date_default_timezone_set('Europe/Paris');
			// GMT+2 ou GMT+1 (Heure d'hiver ou heure d'été)
			$month = explode('|', $month);
			$m = $matches[3];
			$m =  preg_replace(array("/^[Jj]/", "/^[Ff]/", "/^[Mm]/", "/^[Aa]/", "/^[Ss]/", "/^[Oo]/", "/^[Nn]/", "/^[Dd]/"), array("[Jj]", "[Ff]", "[Mm]", "[Aa]", "[Ss]", "[Oo]", "[Nn]", "[Dd]"), $m);
			$m = array_keys($month, $m)[0] + 1;
			echo mktime($matches[5], $matches[6], $matches[7], $m, $matches[2], $matches[4]);
		}
	}

?>