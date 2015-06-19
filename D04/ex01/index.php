<?php
session_start();

if (isset($_GET['submit']) && $_GET['submit'] == "OK")
{
		if (isset($_GET['login']) && isset($_GET['passwd']))
		{
			$_SESSION['login'] = $_GET['login'];
			$_SESSION['pass'] = $_GET['passwd'];
		}
}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Index</title>
	</head>
	<body>
		<form action="index.php" method="GET">
			Identifiant: <input type="text" name="login" value="<?php echo $_SESSION['login'] ?>"/>
			<br />
			Mot de passe: <input type="password" name="passwd" value="<?php echo $_SESSION['pass'] ?>" />
			<br />
			<button type="submit" value="OK" name="submit">submit</button>
		</form>
	</body>
</html>