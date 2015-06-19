<?php

function auth($login, $passwd)
{
	$pass = hash("whirlpool", $passwd);
	$users = file_get_contents("../private/passwd");
	$users = unserialize($users);
	foreach ($users as $key => $value)
	{
			if ($login == $value['login'])
			{
				if ($pass == $value['passwd'])
					return (TRUE);
			}
	}
	return (FALSE);
}

?>