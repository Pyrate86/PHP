<?php
session_start();
include("auth.php");

function error()
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}

if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['passwd']) && !empty($_POST['passwd'])))
{
	if (auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>42 Chat</title>
	</head>
	<body >
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>
		<?php
	}
	else
		error();
}
else
	error();
?>