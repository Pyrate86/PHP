<?php
	require_once("entete.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}

	$i = 0;
	foreach ($_POST as $value)
	{
		$cat = empty($cat) ? $value : $cat.", ".$value;
		$i++;
	}


	$query = "DELETE FROM category WHERE id in (".$cat.")";
	$req = mysqli_query($db, $query);

	mysqli_close($db);
	if ($i > 1)
		$msg = "Les ".$i." ont bien été supprimées";
	else
		$msg = "La catégorie a bien été supprimée";
	$_SESSION['msg']['msg'] = $msg;
	$_SESSION['msg']['type'] = "success";
	header("location:admin_article.php");
?>