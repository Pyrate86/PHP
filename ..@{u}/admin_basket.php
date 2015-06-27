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
<?php
	$query = "	SELECT 
					u.id, 
					u.login, 
					b.quantity, 
					b.date,
					b.id_commande,
					a.name, 
					a.price 
				FROM 
					basket AS b 
					INNER JOIN user AS u ON b.id_user = u.id 
					INNER JOIN article AS a ON b.id_article = a.id 
				ORDER BY 
					b.id_commande DESC
				";

	$req = mysqli_query($db, $query);
	$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
	$cmd = 0;
	$total = 0;
	foreach ($row as $value) :
		if ($value['id_commande'] != $cmd) :
			if ($total > 0) :
	?>
		<tfoot>
			<td colspan="3"></td>
			<td><strong>Total</strong></td>
			<td><strong><?php echo $total; ?></strong></td>
		</tfoot>
		</table>
		<?php $total = 0; ?>
	<?php endif ; ?>
	<div><h4>Commande du <?php echo $value['date']?> de <?php echo $value['login'] ?> (Numero <?php echo $value['id_commande'] ?>)</h4></div>
	<table class="table table-striped table-bordered">
	<th>
		<td><strong>Article</strong></td>
		<td><strong>Prix Unitaire</strong></td>
		<td><strong>Quantité</strong></td>
		<td><strong>Prix</strong></td>
	</th>
	<?php endif ;?>
	<tr>
		<td></td>
		<td><?php echo $value['name']; ?></td>
		<td><?php echo $value['price']; ?></td>
		<td><?php echo $value['quantity']; ?></td>
		<td>
			<?php
				$tmp = $value['price'] * $value['quantity'];
				$total += $tmp;
				echo $tmp
			?>
		</td>
	</tr>
	<?php
	$cmd = $value['id_commande'];
	endforeach;
?>
	<tfoot>
		<td colspan="3"></td>
		<td><strong>Total</strong></td>
		<td><strong><?php echo $total; ?></strong></td>
	</tfoot>
</table>
