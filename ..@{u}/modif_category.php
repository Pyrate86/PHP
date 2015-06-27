<?php
	require_once("entete.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
	if ((isset($_POST['id']) && !empty($_POST['id'])) && (isset($_POST['name']) && !empty($_POST['name'])))
	{
		$name = htmlspecialchars($_POST['name']);
		$query = "	UPDATE category 
					SET name = '".$name."'
					WHERE id = '".$_POST['id']."'";
		$req = mysqli_query($db, $query);

		mysqli_close($db);

		$_SESSION['msg']['msg'] = "La catégorie a bien été supprimée";
		$_SESSION['msg']['type'] = "success";
		header("location:admin_article.php");
		return ;
	}
	else
	{
		$_SESSION['msg']['msg'] = "La catégorie n'a pas été supprimée, contrairement a JFK !";
		$_SESSION['msg']['type'] = "danger";
		header("location:admin_article.php");
	}
?>