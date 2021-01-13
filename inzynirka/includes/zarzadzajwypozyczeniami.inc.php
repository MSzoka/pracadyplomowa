<?php
 require "config.inc.php";
 $wynik = $conn -> query("SELECT w.IDPojazdu, w.Mail,w.Rozpoczecie,w.Zakonczenie,w.Zaplata,w.Informacja, p.Marka, p.Model, p.IDPojazdu from wypozyczenie as w join pojazdy as p on w.IDPojazdu=p.IDPojazdu");
 $update = false;
 $Marka = '';
 $Model = '';
 $Rozpoczecie = '';
 $Zakonczenie = '';
 $Zaplata = '';
 $Informacja = '';
?>
<?php 
	if (isset($_GET['edit'])){
	$IDPojazdu = $_GET['edit'];
	$update = true;
	 $wynik1 = $conn -> query("SELECT w.IDPojazdu, w.Mail,w.Rozpoczecie,w.Zakonczenie,w.Zaplata,w.Informacja, p.Marka, p.Model, p.IDPojazdu from wypozyczenie as w join pojazdy as p on w.IDPojazdu=p.IDPojazdu WHERE IDPojazdu='IDPojazdu'") or die($conn->error());
	if(@count($wynik1)== 1){
	$row = $wynik1 -> fetch_array();
	$IDPojazdu = $row['IDPojazdu'];
	$Marka = $row['Marka'];
	$Model = $row['Model'];
	$Rozpoczecie = $row['Rozpoczecie'];
	$Zakonczenie = $row['Zakonczenie'];
	$Zaplata = $row['Zaplata'];
	$Informacja = $row['Informacja'];
				}
			}
	if(isset($_POST['edytuj'])){
		$IDPojazdu=$_POST['IDPojazdu'];
		$Marka = $_POST['Marka'];
		$Model = $_POST['Model'];
		$Rozpoczecie = $_POST['Rozpoczecie'];
		$Zakonczenie = $_POST['Zakonczenie'];
		$Zaplata = $_POST['Zaplata'];
		$Informacja = $_POST['Informacja'];
		$conn -> query("UPDATE wypozyczenie SET Marka='$Marka', Model='$Model', Rozpoczecie = '$Rozpoczecie', Zakonczenie='$Zakonczenie', Zaplata='$Zaplata', Informacja='$Informacja' WHERE IDPojazdu=$IDPojazdu") or die($conn ->error);
		header("Location: ../zarzadzajwypozyczeniami.php");
	}
?>