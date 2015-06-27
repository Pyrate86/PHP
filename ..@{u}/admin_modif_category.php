<?php
require_once("header.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
$id = 0;
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	$id = $_GET['id'];
	$req = mysqli_query($db, "SELECT * FROM category WHERE id='".$id."'");
	$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
	$name = $row['0']['name'];

}
?>
	<div>
		<h3>Seletionner une catégories à Modifier</h3>
		<div class="btn-group">
		<?php

			$req = mysqli_query($db, "SELECT * FROM category");
			$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			foreach ($row as $value) :
		?>
			
				<a href="admin_modif_category?id=<?php echo $value['id'] ?>" class="btn btn-primary" role="button"> <?php echo $value['name'] ?></a>
			</label>
		<?php endforeach; ?>
		</div>
	</div>
	<div>
	<?php if ($id > 0): ?>
	<form method="POST" action="modif_category.php">
	<div>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="text" name="name" id="Name" placeholder="Nom" value="<?php echo $name ?>">
		</div>
	</div>
	<div>
		<div>
			<button type="submit" class="btn btn-primary">Envoyer</button>
			<a href="admin_article.php" class="btn btn-info" role="button">Annuler</a>
		</div>
	</div>

	</form>
	<?php else : ?>
				<a href="admin_article.php" class="btn btn-info" role="button">Annuler</a>			
	<?php endif ?>	
	</div>
<?php

require_once("footer.php");

?>