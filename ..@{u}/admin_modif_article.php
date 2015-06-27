<?php
	require_once("header.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
	if(!(isset($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['id'])))
	{
		$_SESSION['msg']['msg'] = "L'article n'a pas été modifié, contacter qui vous voulez pour réparer ...";
		$_SESSION['msg']['type'] = "danger";
		header("location:admin_article.php");
		return ;
	}
	$art = $_GET['id'];
	$query = "SELECT * FROM article WHERE id='".$art."'";
	$req = mysqli_query($db, $query);
	$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
	$cats = explode(',', $row['0']['category']);
	$image = $row['0']['image'];

if (isset($_SESSION['msg']))
{
	echo "<div class=\"alert alert-".$_SESSION['msg']['type']."\">".$_SESSION['msg']['msg']."</div>\n";
	unset($_SESSION['msg']);
}

?>
<div class="panel panel-default">
	<div class="panel-body">
		<form method="POST" action="modif_article.php">
		
		<div>
			<label for="Name">Nom</label>
			<div>
				<input type="text" name="Name" id="Name" placeholder="Nom" value="<?php echo $row['0']['name']; ?>">
			</div>
		</div>

		<div>
			<label for="Price">Prix</label>
			<div>
				<input type="text" name="Price" id="Price" placeholder="Prix" value="<?php echo $row['0']['price']; ?>">
			</div>
		</div>

		<div>
			<label for="Qt" >Quantité</label>
			<div>
				<input type="text" name="Qt" id="Qt" placeholder="Quantité" value="<?php echo $row['0']['quantity']; ?>">
			</div>
		</div>
		
		<div>
			<label for="Descr" >Description</label>
			<div>
				<input type="textarea" name="Descr" id="Descr" placeholder="Description" value="<?php echo $row['0']['descr']; ?>">
			</div>
		</div>

		<div class="btn-group" data-toggle="buttons">
		<?php

			$req = mysqli_query($db, "SELECT * FROM category");
			$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			foreach ($row as $value) :
		?>
			<label class="btn btn-primary <?php if (in_array($value['id'], $cats)){ echo "active";} ?>">
				<input type="checkbox" name="<?php echo $value['id'] ?>" value="<?php echo $value['id'] ?>"  <?php if (in_array($value['id'], $cats)) { echo "checked";} ?>> <?php echo $value['name'] ?>
			</label>
		<?php endforeach; ?>
		</div>
		<div>
			<a href="admin_add_category.php" class="btn btn-info" role="button">Ajouter une categorie</a>
			<a href="admin_modif_category.php" class="btn btn-warning" role="button">Ajouter une categorie</a>
			<a href="admin_del_category.php" class="btn btn-danger" role="button">Supprimer une categorie</a>
		</div>
		<div>
			<div class="input-group">
				<span class="input-group-addon">
				<label for="img">Modifier l'image</label>
				<input type="checkbox" name="mod_img" value="1" id="img">
				</span>
				<label for="Image">Image actuel : <?php echo $image ?></label>
				<div >
					<input type="file" name="Image" id="Image">
					<input type="hidden" name="old_img" value="<?php echo $image ?>">
				</div>
			</div>
		</div>

		<div>
			<div>
				<input type="hidden" name="id" value="<?php echo $art ?>">

				<button type="submit" class="btn btn-success">Envoyer</button>
				<a href="admin_article.php" class="btn btn-info" role="button">Annuler</a>
				
			</div>
		</div>

		</form>
	</div>
</div>
<?php

require_once("footer.php");

?>
