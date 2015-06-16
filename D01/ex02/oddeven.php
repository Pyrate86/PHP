#!/usr/bin/php
<?php

function get_line()
{
	$ln = fgets(fopen('php://stdin', 'r'));
	if ($ln == NULL)
	{
		echo "\n";
		exit();
	}

	return trim($ln);
}

while (42)
{
	echo "Entrez un nombre: ";
	$line = get_line();
	if(!is_numeric($line))
		echo "'".$line."' n'est pas un chiffre";
	else if (substr($line, -1) % 2 == 0)
		echo "Le chiffre ".$line." est Pair";
	else
		echo "Le chiffre ".$line." est Impair";
	echo "\n";
}
?>