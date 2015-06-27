<?php
	require_once("entete.php");

	$user = mysqli_query($db, "SELECT id FROM user WHERE login='".$_SESSION['loggued_on_user']."'");
	$user = mysqli_fetch_all($user, MYSQLI_ASSOC);
	$now = time();
	foreach ($_SESSION['basket'] as $key => $value)
	{

		$query = "INSERT INTO
				basket(id_user, id_article, quantity, date, id_commande)
				VALUES
				('".$user[0]['id']."', '".$key."', '".$value."', NOW(), '".$now."')
				";

		if (mysqli_query($db, $query))
		{
			$_SESSION['msg']['msg'] = "Votre commande a bien été prise en compte.";
			$_SESSION['msg']['type'] = "success";
		}
		else
		{
			$_SESSION['msg']['msg'] = "Un probleme est survenue, merci de reessayer ulterieurement.";
			$_SESSION['msg']['type'] = "warning";
			header("location:admin_users.php");
			mysqli_close($db);
			return ;
		}

		}
	mysqli_close($db);
	unset($_SESSION['basket']);
	unset($_SESSION['total_price']);
	header("location:display.php");
?>