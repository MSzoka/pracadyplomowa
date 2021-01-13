<?php
 require "config.inc.php";
 $wynik = $conn -> query("SELECT * from pojazdy") or die($conn->error());
 $update = false;
 $Marka = '';
 $Model = '';
 $CenaZaDzien = '';
 $TypPaliwa = '';
 $Siedzenia = '';
?>
<?php 
	if (isset($_GET['edit'])){
	$IDPojazdu = $_GET['edit'];
	$update = true;
	$wynik1 = $conn->query("SELECT * FROM pojazdy WHERE IDPojazdu=$IDPojazdu")or die($conn->error);
	if(@count($wynik1)== 1){
		$row = $wynik1 -> fetch_array(); 
		$IDPojazdu = $row['IDPojazdu'];
		$Zdjecie = $row['Zdjecie'];
		$Marka = $row['Marka'];
		$Model = $row['Model'];
		$CenaZaDzien = $row['CenaZaDzien'];
		$TypPaliwa = $row['TypPaliwa'];
		$Siedzenia = $row['Siedzenia'];
		}
	}
	if(isset($_POST['edytuj'])){
		$IDPojazdu=$_POST['IDPojazdu'];
		$Zdjecie = $_POST['image'];
		$Marka = $_POST['Marka'];
		$Model = $_POST['Model'];
		$CenaZaDzien = $_POST['CenaZaDzien'];
		$TypPaliwa = $_POST['TypPaliwa'];
		$Siedzenia = $_POST['Siedzenia'];
		$conn -> query("UPDATE pojazdy SET Marka='$Marka', Model='$Model', CenaZaDzien = '$CenaZaDzien', TypPaliwa='$TypPaliwa', Siedzenia='$Siedzenia' WHERE IDPojazdu='$IDPojazdu'") or die($conn ->error);
		header("Location: ../zarzadzajpojazdami.php");
	}
	if (isset($_GET['delete'])){
		$IDPojazdu = $_GET['delete'];
		$conn->query("DELETE FROM wypozyczenie WHERE IDPojazdu='$IDPojazdu'")or die($conn->error);
		$conn->query("DELETE FROM pojazdy WHERE IDPojazdu=$IDPojazdu")or die($conn->error);
		header("Location: ../zarzadzajpojazdami.php");
	}
	if(isset($_POST['dodaj'])){
		$target = "../images/".basename($_FILES['image']['name']);
    	$Zdjecie = $_FILES['image']['name'];
		$Marka = $_POST['Marka'];
		$Model = $_POST['Model'];
		$CenaZaDzien = $_POST['CenaZaDzien'];
		$TypPaliwa = $_POST['TypPaliwa'];
		$Siedzenia = $_POST['Siedzenia'];
		$conn -> query("INSERT INTO pojazdy (Marka,Model,CenaZaDzien,TypPaliwa,Siedzenia,Zdjecie) VALUES ('$Marka','$Model','$CenaZaDzien','$TypPaliwa','$Siedzenia','$Zdjecie')") or die($conn ->error);
		if (move_uploaded_file($_FILES['name']['tmp_name'], $target)) {
			$msg = "Pomyslnie zaladowano zdjecie";
		}else
		{
			$msg = "Wystapil blad podczas ladowania zdjecia";
		}
		header("Location: ../zarzadzajpojazdami.php");
	}
?>