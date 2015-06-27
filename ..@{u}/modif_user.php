<?php
	require_once("entete.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
	if ((isset($_POST['id']) && !empty($_POST['id'])) && (isset($_POST['Login']) && !empty($_POST['Login'])))
	{
		$login = htmlspecialchars($_POST['Login']);
		$admin = isset($_POST['Admin']) ? 1 : 0;

		if (isset($_POST['Pass']) && !empty($_POST['Pass']))
		{
			$pass = hash("whirlpool", $_POST['Pass']);
			$query = "	UPDATE user SET login = '".$login."', password = '".$pass."', admin='".$admin."' WHERE id = '".$_POST['id']."'";
		}
		else
		{
			$query = " UPDATE user SET login = '".$login."', admin='".$admin."' WHERE id = '".$_POST['id']."'";
		}
		if (mysqli_query($db, $query))
		{
			$_SESSION['msg']['msg'] = "L'utilisateur a bien été modifié";
			$_SESSION['msg']['type'] = "success";
		}
		else
		{
			$_SESSION['msg']['msg'] = "Erreur lors de la modification de l'utilisateur";
			$_SESSION['msg']['type'] = "warning";
		}
		mysqli_close($db);

		header("location:admin_users.php");
		return ;
	}
	else
	{
		$_SESSION['msg']['msg'] = "L'utilisateur n'a pas été modifié, ni dans la base ni génétiquement (a priori)";
		$_SESSION['msg']['type'] = "danger";
		header("location:admin_users.php");
	}
?>