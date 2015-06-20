<?php
	$chat_log = "../private/chat";
	date_default_timezone_set("EUROPE/PARIS");
	if (file_exists($chat_log))
	{
		$fp = fopen("../private/chat", "r+");
		if (flock($fp, LOCK_EX))
		{
			$log = file_get_contents($chat_log);
			$log = unserialize($log);

			foreach ($log as $value) {
				echo "[".date('H', $value['time']).":".date('i', $value['time'])."] <b>".$value['login']."</b>: ".$value['msg']."<br />\n";
			}
			flock($fp, LOCK_UN);
		}
		fclose($fp);
	}

?>