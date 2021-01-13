<?php
 require "includes/config.inc.php";
 require "header.php";
 if(isset($_SESSION['ID'])){
 $Mail = $_SESSION['Mail'];
 $wynik = $conn -> query("SELECT w.IDPojazdu, w.Mail,w.Rozpoczecie,w.Zakonczenie,w.Zaplata,w.Informacja, p.Marka, p.Model, p.IDPojazdu from wypozyczenie as w join pojazdy as p on w.IDPojazdu=p.IDPojazdu WHERE Mail='$Mail'") or die($conn->error);
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