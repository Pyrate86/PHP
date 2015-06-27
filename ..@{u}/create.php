<?php
require_once("entete.php");
function error()
{
	header("location:subscribe.php");
	echo "ERROR\n";
}
function error_signed()
{
	header("location:log.php");
	echo "ERROR\n";
}
if (isset($_POST['submit']) && $_POST['submit'] == "OK")
{
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['passwd']) && !empty($_POST['passwd'])) && (isset($_POST['passwd2']) && !empty($_POST['passwd2'])) && ($_POST['passwd'] == $_POST['passwd2']))
	{
		$pass = hash("whirlpool", $_POST['passwd']);
		$query = "SELECT login FROM user";
		$req = mysqli_query($db, $query);
		$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
		foreach ($row as $value)
		{
			if ($_POST['login'] == $value['login'])
			{
				error_signed();
				return ;
			}
		}
		$name = htmlspecialchars($_POST['login']);
		$query = "INSERT INTO user(login, password) VALUES('".$name."', '".$pass."')";
		if (!mysqli_query($db, $query))	
		{
			mysqli_close($db);
			error();
		}
		mysqli_close($db);
		header("location:display.php");
	}
	else
		error();
}
else
	error();
?>
