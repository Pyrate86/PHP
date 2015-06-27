<?PHP
require_once("entete.php");
if (isset($_SESSION['loggued_on_user']))
	unset($_SESSION['loggued_on_user']);
$_SESSION["admin"] = 0;
header('location:display.php');
?>
