<?php
 require "includes/config.inc.php";
 require "includes/zarzadzajuzytkownikami.inc.php";
 require "adminheader.php";
?>
<!DOCTYPE html>
<html>
<main>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<div class="table-responsive">
		<style>
		img {
			width: 100%;
			height: 100px;
			object-fit: contain;
		}
	</style>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nazwa</th>
					<th>Mail</th>
					<th>Password</th>
					<th>Address</th>
					<th>City</th>
					<th>PrawoP</th>
					<th>PrawoT</th>
					<th>Zweryfikowany</th>
			</thead>
			<?php
				while ($row = $wynik->fetch_assoc()) {?>
					<tr>
						<td><?php echo $row['ID'];?></td>
						<td><?php echo $row['Nazwa'];?></td>
						<td><?php echo $row['Mail'];?></td>
						<td><?php echo $row['Password'];?></td>
						<td><?php echo $row['Address'];?></td>
						<td><?php echo $row['City'];?></td>
						<td><?php echo "<img src='images/".$row['PrawoP']."'>"?></td>
						<td><?php echo "<img src='images/".$row['PrawoT']."'>"?></td>
						<td><?php echo $row['Zweryfikowany'];?></td>
						<td> <a href="zarzadzajuzytkownikami.php?edit=<?php echo $row['ID'];?>" class="btn btn-info">edytuj</a>
							<a href="includes/zarzadzajuzytkownikami.inc.php?delete=<?php echo $row['Mail'];?>" class="btn btn-danger">Usun</a>
						</td>
					</tr>
					<?php 
				}
				?>
		</table>
	</div>
	<div>
		<label>edytuj uzytkownika</label>
		<form action="includes/zarzadzajuzytkownikami.inc.php" class="form-inline" method="POST">
			<input type="hidden" class="form-control mb-2 mr-sm-2" name="ID" value="<?php echo $ID;?>">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Nazwa" value="<?php echo $Nazwa;?>" placeholder="Nazwa">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Mail" value="<?php echo $Mail;?>" placeholder="Mail">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Password" value="<?php echo $Password;?>" placeholder="Password">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Address" value="<?php echo $Address;?>" placeholder="Address">
			<input type="text" class="form-control mb-2 mr-sm-2" name="City" value="<?php echo $City;?>" placeholder="City">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Zweryfikowany" value="<?php echo $Zweryfikowany;?>" placeholder="Zweryfikowany">
			<button type="submit" class="btn btn-info" name="edytuj">edytuj</button>
	</div>
</main>
</html>