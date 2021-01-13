<?php
 require "config.inc.php";
 $wynik = $conn -> query("SELECT * from uzytkownicy") or die($conn->error());
 $update = false;
 $Nazwa = '';
 $Mail = '';
 $Password = '';
 $Address = '';
 $City = '';
 $Zweryfikowany = '';
?>
<?php 
	if (isset($_GET['edit'])){
	$ID = $_GET['edit'];
	$update = true;
	$wynik1 = $conn->query("SELECT * FROM uzytkownicy WHERE ID=$ID")or die($conn->error);
	if(@count($wynik1)== 1){
	$row = $wynik1 -> fetch_array();
	$ID = $row['ID'];
	$Nazwa = $row['Nazwa'];
	$Mail = $row['Mail'];
	$Password = $row['Password'];
	$Address = $row['Address'];
	$City = $row['City'];
	$PrawoJazdyP = $row['PrawoP'];
	$PrawoJazdyT = $row['PrawoT'];
	$Zweryfikowany = $row['Zweryfikowany'];
	}
	}
	if(isset($_POST['edytuj'])){
		$ID=$_POST['ID'];
		$Nazwa = $_POST['Nazwa'];
		$Mail = $_POST['Mail'];
		$Password = $_POST['Password'];
		$Address = $_POST['Address'];
		$City = $_POST['City'];
		$Zweryfikowany = $_POST['Zweryfikowany'];
		$conn -> query("UPDATE uzytkownicy SET Nazwa='$Nazwa', Mail='$Mail', Password = '$Password', Address='$Address', City='$City', Zweryfikowany='$Zweryfikowany' WHERE ID=$ID") or die($conn ->error);
		header("Location: ../zarzadzajuzytkownikami.php");
	}
	if (isset($_GET['delete'])){
		$Mail = $_GET['delete'];
		$conn->query("DELETE FROM wypozyczenie WHERE Mail='$Mail'")or die($conn->error);
		$conn->query("DELETE FROM uzytkownicy WHERE Mail='$Mail'")or die($conn->error);
		header("Location: ../zarzadzajuzytkownikami.php");
	}
?>