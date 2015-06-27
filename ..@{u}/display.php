<?php
	require_once("entete.php");
	require_once("top_filed.php");
?>
	<div class="row">

	<?php
			$req = mysqli_query($db, "SELECT * FROM article");
			$row = mysqli_fetch_all($req, MYSQLI_ASSOC);
			foreach ($row as $value)  :
  ?>
  		<div class="col-sm-6 col-md-4">
    	<div class="thumbnail">
     	 <img src="img/<?php echo $value['image']; ?>" alt="">
     	 <div class="caption">
      	 
      	  <?php
      	  	$cats = explode(',', $value['category']);
      	  	foreach ($cats as $v)
      	  	{
      	  		$query = "SELECT name FROM category WHERE id='".$v."'";
      	  		$tmp = mysqli_query($db, $query);
      	  		$tmp2 = mysqli_fetch_all($tmp, MYSQLI_ASSOC);
      	  		echo "<span class=\"label label-warning\">".$tmp2['0']['name']."</span>";
      		}
          echo "<h3>".$value['name']."</h3>";
          echo $value['descr']."\n";
			?>
        <p>
        	<a href="know_more.php?name=<?php echo $value['name'] ?>&img=<?php echo $value['image'] ?>&id=<?php echo $value['id'] ?>" class="btn btn-primary move_you" role="button">En savoir plus</a>



        	<a href="add_basket.php?id=<?php echo $value['id'] ?>" class="btn btn-default move_you" role="button"/>Je le veux!</a>
        </p>
      </div>
    </div>
  </div>
<?php
	endforeach ;
?>
</div>

<?php require_once("footer.php"); ?>
