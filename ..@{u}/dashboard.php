<?php
	require_once("top_filed.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
if (isset($_SESSION['msg']))
{
	echo "<div class=\"alert alert-".$_SESSION['msg']['type']."\">".$_SESSION['msg']['msg']."</div>\n";
	unset($_SESSION['msg']);
}
?>
<h2 class="title">Administration du site</h2>
<div><a href="admin_article.php" role="button" class="btn btn-primary">Gestion des articles</a></div>
<div><a href="admin_users.php" role="button" class="btn btn-primary">Gestion des utilisateurs</a></div>
<div><a href="admin_basket.php" role="button" class="btn btn-primary">Gestion des paniers</a></div>