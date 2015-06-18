<?php
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
	if ($user == 'zaz' && $pass == 'jaimelespetitsponeys')
	{
			echo "<html><body>Bonjour Zaz<br />\n";
			echo "<img src='data:image/jpeg;base64,";
			echo base64_encode( file_get_contents("../img/42.png"));
			echo "''></body></html>".PHP_EOL;
	}
	else
	{
		header('WWW-Authenticate: Basic realm="Espace membres"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>".PHP_EOL;
	}
?>