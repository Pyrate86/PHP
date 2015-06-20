<?php
	session_start();


	if (!isset($_SESSION['loggued_on_user']) || empty($_SESSION['loggued_on_user']))
	{
		echo "ERROR\n";
		return ;
	}

	function treate_msg($msg)
	{
		if (file_exists("../private/chat"))
		{
			$fp = fopen("../private/chat", "r+");
			if (flock($fp, LOCK_EX))
			{
				$log = file_get_contents("../private/chat");
				$log = unserialize($log);
				$log[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
				$log = serialize($log);
				file_put_contents("../private/chat", $log);
				flock($fp, LOCK_UN);
			}
			fclose($fp);
		}
		else
		{
			if (!file_exists("../private"))
				mkdir("../private");
			$log = serialize(array(array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg'])));
			file_put_contents("../private/chat", $log);
		}
	}

	if (isset($_POST['msg']) && !empty($_POST['msg']))
		treate_msg($_POST['msg']);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body >
		<div class="speak">
			<form action="speak.php" method="POST">
				<label><?php echo $_SESSION['loggued_on_user'] ?></label> : <input type="text" name="msg" />
				<button type="submit" value="OK" name="submit">Envoyer</button>
			</form>
		</div>
	</body>
</html>