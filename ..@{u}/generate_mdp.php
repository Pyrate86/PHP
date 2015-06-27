<?php
$fp = fopen('mdp.php', 'w');
fwrite($fp, '<?php $host = "');
fwrite($fp, $_POST['ip']);
fwrite($fp, '"; ');
fwrite($fp, '$user = "');
fwrite($fp, $_POST['user']);
fwrite($fp, '"; ');
fwrite($fp, '$userpass = "');
fwrite($fp, $_POST['mdp']);
fwrite($fp, '"; ?>');
fclose($fp);
echo"<meta http-equiv='refresh' content='1;url=generate_bd.php' />";
?>