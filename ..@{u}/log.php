<?php	
	require_once("top_filed.php");
?>
<div class="container">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			<img  class="deglon" src="img/logo.png" alt="logo">
			<div class="account-wall">
				<h1 class="text-center login-title">Sign in to continue to Child'R'us</h1>
				<form class="form-signin" action="login.php" method="POST">
				<input name="login" type="text" class="form-control" placeholder="Login" required autofocus>
				<input name="passwd" type="password" class="form-control" placeholder="Password" required>
				<button name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="OK">
					Sign in</button>
				</form>
			</div>
		</div>
</div>
<?php require_once("footer.php"); ?>
