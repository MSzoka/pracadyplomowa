<?php
require "config.inc.php";
if(isset($_POST['uzupelnij'])){
		$target = "../images/".basename($_FILES['image']['name']);
    	$prawojazdyp = $_FILES['image']['name'];
    	$target1= "../images/".basename($_FILES['image1']['name']);
    	$prawojazdyt = $_FILES['image1']['name'];
		$ID= $_POST['ID'];
		$Nazwa = $_POST['Nazwa'];
		$Mail = $_POST['Mail'];
   		$ContactNo = $_POST['ContactNo'];
   		$Address = $_POST['Address'];
   		$City = $_POST ['City'];
   		$Country = $_POST['Country'];

		$conn->query("UPDATE uzytkownicy SET Nazwa='$Nazwa', Mail='$Mail', ContactNo='$ContactNo', Address='$Address', City='$City',Country='$Country', PrawoP='$prawojazdyp', PrawoT='$prawojazdyt' WHERE ID=$ID") or die($conn->error());
		if (move_uploaded_file($_FILES['name']['tmp_name'], $target)) {
			$msg = "Pomyslnie zaladowano zdjecie";
		}else
		{
			$msg = "Wystapil blad podczas ladowania zdjecia";
		}
		header("Location: ../index.php");
		exit();
	}
?>