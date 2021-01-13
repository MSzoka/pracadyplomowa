<?php
 require "includes/config.inc.php";
 require "includes/zarzadzajwypozyczeniami.inc.php";
 require "adminheader.php";
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
					<th>Mail</th>
					<th>Marka</th>
					<th>Model</th>
					<th>Rozpoczecie</th>
					<th>Zakonczenie</th>
					<th>Zaplata</th>
					<th>Informacja</th>
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
						<td> <a href="zarzadzajwypozyczeniami.php?edit=<?php echo $row['Mail'];?>" class="btn btn-info">edytuj</a>
						</td>
					</tr>
					<?php 
				}
				?>
		</table>
	</div>
	<div>
		<form action="includes/zarzadzajwypozyczeniami.inc.php" class="form-inline" method="POST">
			<input type="hidden" name="Mail" value="<?php echo $Mail;?>">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Marka" value="<?php echo $Marka;?>" placeholder="Marka">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Model" value="<?php echo $Model;?>" placeholder="Model">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Rozpoczecie" value="<?php echo $Rozpoczecie;?>" placeholder="Rozpoczecie">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Zakonczenie" value="<?php echo $Zakonczenie;?>" placeholder="Zakonczenie">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Zaplata" value="<?php echo $Zaplata;?>" placeholder="Zaplata">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Informacja" value="<?php echo $Informacja;?>" placeholder="Informacja">
			<button type="submit" class="btn btn-info" name="edytuj">edytuj</button>
	</div>
</main>
</html>