<?php
	require_once("entete.php");

	unset($_SESSION['basket']);
	unset($_SESSION['total_price']);

	header("location:".$_SERVER["HTTP_REFERER"]);
?>