<?php
		
	if (isset($_GET['action']) && !empty($_GET['action']))
	{
		switch ($_GET['action'])
		{
			case 'set':
				setcookie($_GET['name'], $_GET['value'], time() + 60 * 60);
				break;

			case 'get':
				echo $_COOKIE[$_GET['name']];
				break;

			case 'del':
				setcookie($_GET['name'], NULL, -1);
				break;
			
			default:
				break;
		}
	}

?>