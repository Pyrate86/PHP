<?php
require_once("header.php");
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="display.php"><img class="minilog" src="img/minilogo.png"></a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">

		<!-- Bare menu deroulant -->
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Je cherche <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<?php
			$req = mysqli_query($db, "SELECT * FROM category");
			$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			foreach ($row as $value)  :
			?>
				<li>
					<a href="display_category.php?choice=<?php echo $value['id'] ?>"><?php echo $value['name']; ?>
					</a>
				</li>
			<?php
				endforeach ;
			?>
			<li role="separator" class="divider"></li>
			<li><a href="display.php">Toutes catégories confondues</a></li>
		  </ul>
		</li>
		</ul>

		<!-- Trucs a droite -->
		<ul class="nav navbar-nav navbar-right">
<?PHP
if (empty($_SESSION['loggued_on_user'])) :
?>
			<li>
				<a href="log.php"><button type="submit" class="btn btn-default btn-sm">Log In</button></a>
			</li>
			<li>
				<a href="create.php"><button type="submit" class="btn btn-default btn-sm">Sign In</button></a>
			</li>
<?PHP endif; ?>

<?PHP
if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "") :
?>
			<li>
			<p class="cracra">Welcome <?PHP echo $_SESSION['loggued_on_user'] ?></p>
			</li>
<?PHP endif; ?>

<?PHP
if (isset($_SESSION['admin']) && ($_SESSION['admin'] == "1")) :
?>
			<li>
				<a href="dashboard.php"><button type="submit" class="btn btn-default btn-sm">Dashboard</button></a>
			</li>
<?PHP endif; ?>

      	<!--  Menu deroulant a afficher en fonction de si on est log, et a remplir en fonction des achats -->	
      	<li class="dropdown">
      		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Panier<span class="caret"></span></a>
      		 
      		 <!-- Liste du panier -->
      		 <ul class="dropdown-menu test">
       		 <?php
       		 	$_SESSION['total_price'] = 0;
				foreach ($_SESSION['basket'] as $key => $value)  :
				$query = "SELECT name, price FROM article WHERE id='".$key."'";
				$req = mysqli_query($db, $query);
				$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			?>
		
      		 	<li><a href="basket.php"><?php echo $row['0']['name']; ?></a>
	      		 	<span class="badge badge2">
	      		 		<?php
							$price = $row['0']['price'] * $value;
							echo $price;
							$_SESSION['total_price'] += $price;
						?> ø
					</span>
					<span class="badge badge_float">
						<?php echo $value; ?>
					</span>
				</li>
           		<?php endforeach; ?>
           		<!-- Boutons panier/caisse -->
           		<li role="separator" class="divider"></li>
           			<li id="total">Total : <?php echo $_SESSION['total_price']; ?> ø</li>
           		<li role="separator" class="divider"></li>
           		<li>
           		 	<button type="button" class="btn_buy_right btn btn-default btn-md">
           		 	<a href="paiement.php">
  						<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Passer en caisse
					</button>
					</a>
					<button type="button" class="btn_buy_left btn btn-default btn-md">
					<a href="basket.php">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Voir mon panier
					</a>
					</button>

				</li>


			</ul>
		</li>
		<!-- Icone Login/Logout, a changer en fonction de l'etat de session -->
			<li>
<?PHP
	if (!empty($_SESSION['loggued_on_user'])) :
?>
				<a href="logout.php">
				<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
<?PHP endif; ?>
			</li>
		</ul>
		</div>
	</div>
</nav>
<?php
	if (isset($_SESSION['msg']))
	{
	echo "<div class=\"alert alert-".$_SESSION['msg']['type']."\">".$_SESSION['msg']['msg']."</div>\n";
	unset($_SESSION['msg']);
	}
?>