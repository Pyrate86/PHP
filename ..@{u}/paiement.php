<?php
	require_once("entete.php");
	require_once("top_filed.php");
?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div><h2>Liste des article</h2></div>

	<table class="table table-striped table-bordered">
		
			<th>
				<td><strong>Image</strong></td>
				<td><strong>Nom</strong></td>
				<td><strong>Prix Unitaire</strong></td>
				<td><strong>Quantité</strong></td>
				<td><strong>Prix</strong></td>
			</th>

			<?php

			$_SESSION['total_price'] = 0;
			foreach ($_SESSION['basket'] as $key => $value) :
			$query = "SELECT name, price, image, descr FROM article WHERE id='".$key."'";
			$req = mysqli_query($db, $query);
			$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			?>
			<tr>
				<td></td>
				<td><img class="mini_img" src="img/<?php echo $row['0']['image'] ?>"></td>
				<td><?php echo $row['0']['name'] ?></td>
				<td><?php echo $row['0']['price'] ?> ø</td>
				<td><?php echo $value; ?></td>
				<td><?php $price = $row['0']['price'] * $value; echo $price;$_SESSION['total_price'] += $price; ?> ø</td>
			</tr>
			<?php endforeach; ?>
			<tfoot>
				<td colspan="4"></td>
				<td><strong>Total</strong></td>
				<td><?php echo $_SESSION['total_price'] ?> ø</td>
			</tfoot>
		</table>
		<div>
			<a href="del_basket.php" role="button" class="btn btn-danger">Vider le panier</a>
			<a href="index.php" role="button" class="btn btn-info">Continuer les achats</a>
			<a href="basket_valid.php" role="button" class="btn btn-success">Valider</a>
		</div>
</div>


	

<?php require_once("footer.php"); ?>