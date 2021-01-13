<?php
  require "header.php";
?>
<!DOCTYPE html>
<html>
<main>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<div class="wrapper-main" align="center">
		<section class="section-default">
			<h1>Login</h1>
			<form action="includes/login.inc.php" method="post">
				<div class="form-group">
				<input type="text" name="NameMail" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" name="Password" placeholder="Password">
			</div>
				<button type="submit" class="btn btn-success"name="login-submit">Login</button>
			</form>
		</section>
	</div>
</main>
</html>
