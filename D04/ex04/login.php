<?php
session_start();
include("auth.php");

function error()
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}

if ((isset($_GET['login']) && !empty($_GET['login'])) && (isset($_GET['passwd']) && !empty($_GET['passwd'])))
{
	if (auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_GET['login'];
		echo "OK\n";
	}
	else
		error();
}
else
	error();
?>