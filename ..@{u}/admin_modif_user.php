<?php
	require_once("header.php");
	if (!isset($_SESSION['admin']) || $_SESSION['admin']== 0)
	{
		header("location:index.php");
		return ;
	}
	if(!(isset($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['id'])))
	{
		$_SESSION['msg']['msg'] = "L'utilisateur n'a pas été modifié, dommage T_T";
		$_SESSION['msg']['type'] = "danger";
		header("location:admin_article.php");
		return ;
	}
	$user = $_GET['id'];
	$query = "SELECT * FROM user WHERE id='".$user."'";
	$req = mysqli_query($db, $query);
	$row = mysqli_fetch_all($req, MYSQLI_ASSOC);

if (isset($_SESSION['msg']))
{
	echo "<div class=\"alert alert-".$_SESSION['msg']['type']."\">".$_SESSION['msg']['msg']."</div>\n";
	unset($_SESSION['msg']);
}

?>
<div class="panel panel-default">
	<div class="panel-body">
		<form method="POST" action="modif_user.php">
		
		<div>
			<label for="Login">Login</label>
			<div>
				<input type="text" name="Login" id="Login" placeholder="Login" value="<?php echo $row['0']['login']; ?>">
			</div>
		</div>

		<div>
			<label for="Pass" >Nouveau mot de passe (Laisser vide si aucun changement)</label>
			<div>
				<input type="password" name="Pass" id="Pass" placeholder="Nouveau mot de passe">
			</div>
		</div>
		
		<div>
			<div>
				<input type="checkbox" name="Admin" id="Admin" <?php if ($row['0']['admin'] == 1) echo "checked"; ?> value="<?php echo $row['0']['id'] ?>">
				<label for="Admin">Droits d'administration ?</label>
			</div>
		</div>

		<input type="hidden" name="id" value="<?php echo $user ?>">

		<div>
			<div>
				<button type="submit" class="btn btn-success">Envoyer</button>
				<a href="admin_users.php" class="btn btn-info" role="button">Annuler</a>
				
			</div>
		</div>

		</form>
	</div>
</div>
<?php

require_once("footer.php");

?>
