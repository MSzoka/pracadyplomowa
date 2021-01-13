<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<main>
	<div class="wrapper-main" align="center">
		<section class="section-default">
			<h1>Login</h1>
			<form action="includes/adminlogin.inc.php" method="post">
				<div class="form-group">
				<input type="text" class="form-control" name="Nazwa" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="Password" placeholder="Password">
			</div>
				<button type="submit" name="admin-submit">Login</button>
			</form>
		</section>
	</div>
</main>
</html>
