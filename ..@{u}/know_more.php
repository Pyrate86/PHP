<?php
	require_once("entete.php");
	require_once("top_filed.php");
?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="thumbnail thumb_middle">
      
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  		<!-- Wrapper for slides -->
			  		<div class="carousel-inner" role="listbox">
			  		  <div class="item active">
			  		    <img src="img/<?php echo $_GET['img']; ?>">
			  		  </div>
					
			  		  <div class="item">
			  		    <img src="img/<?php echo $_GET['img']; ?>">
			  		  </div>
					
			  		<!-- Left and right controls -->
			  		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			  		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			  		  <span class="sr-only">Previous</span>
			  		</a>
			  		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			  		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			  		  <span class="sr-only">Next</span>
			  		</a>
			</div>
			</div>

      <div class="caption">
        
        
        <?php
			$req = mysqli_query($db, "SELECT * FROM article");
			$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			foreach ($row as $key => $value)
			{
				if ($_GET['name'] == $value['name'])
				{
					
					$cats = explode(',', $value['category']);
      	  			foreach ($cats as $v)
      	  			{
      	  				$query = "SELECT name FROM category WHERE id='".$v."'";
      	  				$tmp = mysqli_query($db, $query);
      	  				$tmp2 = mysqli_fetch_all($tmp, MYSQLI_ASSOC);
      	  				echo "<span class=\"label label-warning\">".$tmp2['0']['name']."</span>";
      				}
      				echo "<h2>".$_GET['name']."</h2><p>".$value['descr']."</p>\n";
      				// echo $value['descr']."\n";
				}
			}
	
			?>
		<a href="display.php" class="btn btn-default move_you" role="button"/>Retour boutique</a>	
        <a href="add_basket.php?id=<?php echo $_GET['id'] ?>" class="btn btn-success move_you" role="button"/>Je le veux!</a>

      </div>
    </div>
  </div>
</div>


	

<?php require_once("footer.php"); ?>