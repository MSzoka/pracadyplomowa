<?php
  if(isset($_POST['wypożycz-submit'])){
  require "includes/config.inc.php";
  require "includes/data.inc.php";
  $_SESSION['IDPojazdu'] = $_POST['IDPojazdu'];
  $_SESSION['CenaZaDzien'] = $_POST['CenaZaDzien'];
}
  else{
  	header("Location: Logowanie.php");
	exit();
  }
?>
<!DOCTYPE html>
<html>
<main>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<div class="wrapper-main">
		<section class="section-default">
			<h1> Wypożycz auto </h1>

		<form action="includes/data.inc.php" method="POST">
			<input type="hidden" value="<?php echo $IDPojazdu?>" name="IDPojazdu">
			<input type="date" name="datefrom"><br>
			<input type="date" name="dateto"><br>
			<button type="submit" name="data">Wypożycz</button>
		</form>
		</section>
	</div>

<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Mail</th>
					<th>Password</th>
					<th>Address</th>
					<th>City</th>
			</thead>
			<?php
				while ($row = $wynik->fetch_assoc()) {?>
					<tr>
						<td><?php echo $row['Mail'];?></td>
						<td><?php echo $row['Marka'];?></td>
						<td><?php echo $row['Model'];?></td>
						<td><?php echo $row['Rozpoczecie'];?></td>
						<td><?php echo $row['Zakonczenie'];?></td>
						<td><?php echo $row['Zaplata'];?></td>
						<td><?php echo $row['Informacja'];?></td>
						</td>
					</tr>
					<?php 
				}
				?>
		</table>
	</div>
</main>
</html>

