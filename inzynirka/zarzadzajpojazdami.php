<?php
 require "includes/config.inc.php";
 require "includes/zarzadzajpojazdami.inc.php";
 require "adminheader.php";
?>
<!DOCTYPE html>
<html>
<main>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		img {
			width: 100%;
			height: 100px;
			object-fit: contain;
		}
	</style>
	<div class="table-responsive">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>IDPojazdu</th>
					<th>Zdjecie</th>
					<th>Marka</th>
					<th>Model</th>
					<th>CenaZaDzien</th>
					<th>TypPaliwa</th>
					<th>Siedzenia</th>
			</thead>
			<?php
				while ($row = $wynik->fetch_assoc()) {?>
					<tr>
						<td><?php echo $row['IDPojazdu'];?></td>
						<td><?php echo "<img src='images/".$row['Zdjecie']."'>"?></td>
						<td><?php echo $row['Marka'];?></td>
						<td><?php echo $row['Model'];?></td>
						<td><?php echo $row['CenaZaDzien'];?></td>
						<td><?php echo $row['TypPaliwa'];?></td>
						<td><?php echo $row['Siedzenia'];?></td>
						<td> <a href="zarzadzajpojazdami.php?edit=<?php echo $row['IDPojazdu'];?>" class="btn btn-info">edytuj</a>
						 <a href="includes/zarzadzajpojazdami.inc.php?delete=<?php echo $row['IDPojazdu'];?>" class="btn btn-danger">Usun</a>
						</td>
					</tr>
					<?php 
				}
				?>
		</table>
	</div>
		<label>edytuj pojazd</label>
		<form action="includes/zarzadzajpojazdami.inc.php" class="form-inline" method="POST">
			<div class="form-row">
			<input type="file" class="form-control mb-2 mr-sm-2" name="image">
			<input type="hidden" class="form-control mb-2 mr-sm-2" name="IDPojazdu" value="<?php echo $IDPojazdu;?>">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Marka" value="<?php echo $Marka;?>" placeholder="Marka">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Model" value="<?php echo $Model;?>" placeholder="Model">
			<input type="text" class="form-control mb-2 mr-sm-2" name="CenaZaDzien" value="<?php echo $CenaZaDzien;?>" placeholder="CenaZaDzien">
			<input type="text" class="form-control mb-2 mr-sm-2" name="TypPaliwa" value="<?php echo $TypPaliwa;?>" placeholder="TypPaliwa">
			<input type="text" class="form-control mb-2 mr-sm-2" name="Siedzenia" value="<?php echo $Siedzenia;?>" placeholder="Siedzenia">
			<button type="submit" class="btn btn-info" name="edytuj">edytuj</button>
		</div>
		</form>
	</div>
	<br>
	<label>Dodaj pojazd</label>
	<form action="includes/zarzadzajpojazdami.inc.php" class="form-inline" method="POST" enctype="multipart/form-data">
	<div class="form-row">
		<input type="file" class="form-control mb-2 mr-sm-2" name="image">
		<input type="text" class="form-control mb-2 mr-sm-2" name="Marka" placeholder="Marka">
		<input type="text" class="form-control mb-2 mr-sm-2" name="Model" placeholder="Model">
		<input type="text" class="form-control mb-2 mr-sm-2" name="CenaZaDzien" placeholder="CenaZaDzien">
		<input type="text" class="form-control mb-2 mr-sm-2" name="TypPaliwa" placeholder="TypPaliwa">
		<input type="text" class="form-control mb-2 mr-sm-2" name="Siedzenia" placeholder="Siedzenia">
		<button type="submit" class="btn btn-success" name="dodaj">Dodaj</button>
	</div>
</form>
</main>
</html>

AIzaSyC5fT72lNaYvgVCohJVzWLuXNZUNupp740