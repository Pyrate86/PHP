<?php
	require_once("top_filed.php");
?>
<h2 class="title">Mon panier</h2>
	<ul class="list-group">
	<?php
		$_SESSION['total_price'] = 0;
		foreach ($_SESSION['basket'] as $key => $value) :
			$query = "SELECT name, price, image, descr FROM article WHERE id='".$key."'";
			$req = mysqli_query($db, $query);
			$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			?>
		<li class="list-group-item">
			<span class="badge ">
			<?php
				$price = $row['0']['price'] * $value;
				echo $price;
				$_SESSION['total_price'] += $price;
			?>
			ø</span>
			<span class="badge "><?php echo $row['0']['price']; ?> ø</span>
				<div class="center">
					<div class="input-group">
					<span class="input-group-btn">
				    	<button type="button" class="btn btn-warning btn-number"  data-type="minus" data-field="quant[<?php echo $key ?>]">
				    		<span class="glyphicon glyphicon-minus"></span>
				    	</button>
					</span>
				  	<input type="text" name="quant[<?php echo $key ?>]" class="form-control input-number" value="<?php echo $value ?>" min="0" max="99">
				  	<span class="input-group-btn">
				    	<button type="button" class="btn btn-warning btn-number" data-type="plus" data-field="quant[<?php echo $key ?>]">
				    	      <span class="glyphicon glyphicon-plus"></span>
				    	</button>
					</span>
      				</div>
      			</div>
    			<img class="mini_img" src="img/<?php echo $row['0']['image']; ?>">
    			 <h3><?php echo $row['0']['name']; ?></h3>
    			 <?php echo $row['0']['descr']; ?>
 		 </li>
<?php
	endforeach ;
?>
		<li class="list-group-item">
			<?php echo $_SESSION['total_price']; ?>
		</li>
	</ul>
	
	<a href="paiement.php">
		<button type="button" class="btn_buy_right btn btn-sucess btn-lg button_float_right">
  		<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">
  		</span> Passer en caisse
  		</button>
	</a>
<a href="display.php" class="btn btn-default button_float_left" role="button">Retour à la boutique</a>
<?php require_once("footer.php"); ?>