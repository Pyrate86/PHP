<?php

	require_once("entete.php");
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$_SESSION['basket'][$_GET['id']] += 1;
		$_SESSION['msg']['msg'] = "L'article a bien été ajouté au panier";
		$_SESSION['msg']['type'] = "success";

	}
	else
	{
		$_SESSION['msg']['msg'] = "Une erreur sauvage est apparue !";
		$_SESSION['msg']['type'] = "warning";
	}

	header("location:".$_SERVER["HTTP_REFERER"]);

?>