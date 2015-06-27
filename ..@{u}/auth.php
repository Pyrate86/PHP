<?PHP
function auth($login, $passwd)
{
	$query = "SELECT login FROM user";
	$req = mysqli_query($db, $query);
	$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
	foreach ($row as $value)
	{
		if ($_POST['login'] == $value['login'])
		{
			if ($_POST['passwd'] == hash("whirpool", $value['passwd']))
			{
				return (TRUE);
			}
		}
	}
	return (FALSE);
}
?>
