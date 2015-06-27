<?php
	require_once("entete.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$query = "DELETE FROM user WHERE id='".$_GET['id']."'";
		var_dump($query);
		if(mysqli_query($db, $query))
		{
			$_SESSION['msg']['msg'] = "l'utilisateur a bien été supprimé";
			$_SESSION['msg']['type'] = "success";
		}
		else
		{
			$_SESSION['msg']['msg'] = "l'utilisateur n'a pas été supprimé de la base, (*_*)danger-danger-danger(*_*)";
			$_SESSION['msg']['type'] = "danger";
		}

	mysqli_close($db);
	}
	else
	{
		$_SESSION['msg']['msg'] = "Cet utilisateur n'existe pas !";
		$_SESSION['msg']['type'] = "warning";
	}
	// header("location:admin_users.php");
?>