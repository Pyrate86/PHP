<?php
	require_once("entete.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
	if(!(isset($_POST['id']) && is_numeric($_POST['id']) && !empty($_POST['id'])))
	{
		$_SESSION['msg']['msg'] = "L'article n'a pas été modifié, 404 ...";
		$_SESSION['msg']['type'] = "danger";
		header("location:admin_article.php");
		return ;
	}
	$name = htmlspecialchars($_POST['Name']);
	$price = htmlentities($_POST['Price']);
	$qt = htmlentities($_POST['Qt']);
	$img = isset($_POST['Image']) ?htmlentities($_POST['Image']) : NULL;
	$img = $_POST['mod_img'] ? $img : $_POST['old_img'];
	$descr = htmlentities($_POST['Descr']);
	$cat = "";
	foreach ($_POST as $key => $value)
	{
		if (is_numeric($key))
			$cat = empty($cat) ? $value : $cat.",".$value;
	}

	$query = "	UPDATE
				article 
				SET
				name = '".$name."',
				price = '".$price."',
				category = '".$cat."',
				quantity = '".$qt."',
				image = '".$img."',
				descr = '".$descr."'
				WHERE
				id = '".$_POST['id']."'
				";

	if (!mysqli_query($db, $query))
	{
		$_SESSION['msg']['msg'] = "L'article n'a pas été modifié, Dieu ai pitié de votre âme ...";
		$_SESSION['msg']['type'] = "danger";
		header("location:admin_article.php?id=".$_POST['id']);
		return ;
	}

	mysqli_close($db);
	$_SESSION['msg']['msg'] = "L'article a bien été modifié";
	$_SESSION['msg']['type'] = "success";
	header("location:admin_article.php");
?>