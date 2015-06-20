<?php
function error()
{
	echo "ERROR\n";
}

if (isset($_POST['submit']) && $_POST['submit'] == "OK")
{
	if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['oldpw']) && !empty($_POST['oldpw']) && isset($_POST['newpw']) && !empty($_POST['newpw']))
	{
		if (file_exists("../private/passwd"))
		{
			$pass = hash("whirlpool", $_POST['oldpw']);
			$users = file_get_contents("../private/passwd");
			$users = unserialize($users);
			$ret = 0;
			foreach ($users as $key => $value)
			{
					if ($_POST['login'] == $value['login'])
					{
						if ($pass == $value['passwd'])
						{
							$users[$key]['passwd'] = hash("whirlpool", $_POST['newpw']);
							$ret += 1;
							break ;
						}
					}
			}
			if (!$ret)
			{
				error();
				header("location:index.html");
				return ;
			}
			file_put_contents("../private/passwd", serialize($users));
			echo "OK\n";
		}
	}
	else
		error();
}
else
	error();
header("location:index.html");
?>