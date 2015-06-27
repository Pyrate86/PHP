<!DOCTYPE html>
<html lang="fr">
	<head>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<meta charset="UTF-8">
		<title>Childs R' Us</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/display.css">
		<link rel="stylesheet" href="css/top_field.css">
		<link rel="stylesheet" href="css/basket.css">
		<link rel="stylesheet" href="css/paiement.css">
		<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		<CENTER>
					<FORM ACTION = "generate_mdp.php"	METHOD = "post">
						<label for="ip">Host: </label><input type="text" id="ip" name="ip" />
						<br />
						<label for="user">SuperUser: </label><input type="text" id="user" name="user" />
						<br />
						<label for="mdp">PassWord: </label><input type="password" id="mdp" name="mdp" />
            <br />
						<input type = "submit" value = "GO !">
					</FORM>
		</CENTER>
<?php require_once("footer.php") ?>