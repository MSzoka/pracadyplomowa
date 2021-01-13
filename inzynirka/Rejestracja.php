<?php
  require "header.php";
?>
<!DOCTYPE html>
<html>
<main>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<div class="wrapper-main">
		<section class="section-default">
			<h1>Signup</h1>
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "emptyfields") {
						echo '<p class="signuperror">Fill in all fields!</p>';
					}
					else if($_GET['error'] == "invalidmailname"){
						echo '<p class="signuperror">Invalid username and mail!</p>';
					}
					else if($_GET['error'] == "invalidmail"){
						echo '<p class="signuperror">Invalid mail!</p>';
					}
					else if($_GET['error'] == "invalidname"){
						echo '<p class="signuperror">Invalid username!</p>';
					}
					else if($_GET['error'] == "invalidpassword"){
						echo '<p class="signuperror">Your password do not match!</p>';
					}
					else if($_GET['error'] == "usertaken"){
						echo '<p class="signuperror">Username is already taken!</p>';
					}
				}
				else if(isset($_GET['signup'])){
					header("Location: ../index.php?signup=success");
					echo '<p class="signupsuccess">Signup successful!</p>';
					exit();
				}
			?>
			<form action="includes/rejestracja.inc.php" method="post">
				<div class ="col-xs-1" align="center">
				<input type="text" name="Name" class="form-control" placeholder="Username">
				<input type="text" name="Mail" class="form-control" placeholder="Mail">
				<input type="password" name="Password" class="form-control" placeholder="Password">
				<input type="password" name="Password1" class="form-control" placeholder="Repeat password">
				<button type="submit" class="btn btn-success" name="signup-submit">Signup</button>
			</div>
			</form>
		</section>
	</div>
</main>
</html>
