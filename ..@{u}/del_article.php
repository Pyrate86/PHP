<?php
	require_once("entete.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
	if(!(isset($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['id'])))
	{
		$_SESSION['msg']['msg'] = "L'article n'a pas été supprimée, contacter qui vous voulez pour réparer ...";
		$_SESSION['msg']['type'] = "danger";
		header("location:admin_article.php");
		return ;
	}
	$art = $_GET['id'];
	$query = "DELETE FROM article WHERE id='".$art."'";
	var_dump($query);
	$req = mysqli_query($db, $query);

	mysqli_close($db);
	$_SESSION['msg']['msg'] = "L'article a bien été supprimée";
	$_SESSION['msg']['type'] = "success";
	header("location:admin_article.php");
?>