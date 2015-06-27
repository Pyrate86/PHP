<?php
require_once("header.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}?>
	<form method="POST" action="del_category.php">
		<div>
			<h3>Seletionner une ou plusieurs catégories à supprimer</h3>
			<div class="btn-group" data-toggle="buttons">
			<?php

				$req = mysqli_query($db, "SELECT * FROM category");
				$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
				foreach ($row as $value) :
			?>
				<label class="btn btn-primary">
					<input type="checkbox" name="<?php echo $value['id'] ?>" value="<?php echo $value['id'] ?>"> <?php echo $value['name'] ?>
				</label>
			<?php endforeach; ?>
			</div>
		</div>
		<div>
				<button type="submit" class="btn btn-danger">Supprimer</button>
				<a href="admin_article.php" class="btn btn-info" role="button">Annuler</a>
		</div>
	</form>
<?php

require_once("footer.php");

?>