<?php
function error()
{
	echo "ERROR\n";
}

if (isset($_POST['submit']) && $_POST['submit'] == "OK")
{
		if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['passwd']) && !empty($_POST['passwd'])) )
		{
			$pass = hash("whirlpool", $_POST['passwd']);
			if (file_exists("../private/passwd"))
			{
				$users = file_get_contents("../private/passwd");
				$users = unserialize($users);
				foreach ($users as $value)
				{
						if ($_POST['login'] == $value['login'])
						{
							error();
							header("location:index.html");
							return ;
						}
				}
				$users[] = array("login" => $_POST['login'], "passwd" => $pass);
				$users = serialize($users);
				file_put_contents("../private/passwd", $users);
			}
			else
			{
				if (!file_exists("../private"))
					mkdir("../private");
				$user = serialize(array(array("login" => $_POST['login'], "passwd" => $pass)));
				file_put_contents("../private/passwd", $user);
			}
			echo "OK\n";
		}
		else
			error();
}
else
	error();
header("location:index.html");
?>