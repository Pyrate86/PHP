<?php
require_once("header.php");
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
<div class="panel panel-default">
	<div class="panel-body">
		<form method="POST" action="add_category.php">
		<div >
			<label for="Cat">Catégorie</label>
			<div >
				<input type="text" name="Cat" id="Cat" placeholder="Catégorie">
			</div>
		</div>

		<div >
			<div>
				<button type="submit" class="btn btn-primary">Valider</button>
				<a href="admin_article.php" role="button" class="btn btn-primary">Retour</a>
			</div>
		</div>
		</form>
	</div>
</div>
<?php

require_once("footer.php");

?>
