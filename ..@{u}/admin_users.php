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


	<div><h2>Liste des article</h2></div>

	<table class="table table-striped table-bordered">
		
			<th>
				<td><strong>ID</strong></td>
				<td><strong>login</strong></td>
				<td><strong>Admin</strong></td>
				<td></td>
				<td></td>
			</th>

			<?php

				$req = mysqli_query($db, "SELECT * FROM user");
				$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
				foreach ($row as $value) :
			?>
			<tr>
				<td></td>
				<td><?php echo $value['id'] ?></td>
				<td><?php echo $value['login'] ?></td>
				<td><?php echo $value['admin'] ?></td>
				<td><a href="admin_modif_user.php?id=<?php echo $value['id'] ?>" class="btn btn-warning" role="button">Modifier</a></td>
				<td><a href="del_user.php?id=<?php echo $value['id'] ?>" class="btn btn-danger" role="button">supprimer</a></td>
			</tr>
			<?php endforeach; ?>
		</table>

<?php

require_once("footer.php");

?>
