<?php
 session_start();
 if(isset($_POST['data'])){
 	require 'config.inc.php';
	$IDPojazdu = $_SESSION['IDPojazdu'];
	$Mail = $_SESSION['Mail'];
	$CenaZaDzien = $_SESSION['CenaZaDzien'];
	$datefrom = date('Y-m-d ',strtotime($_POST['datefrom']));
	$dateto = date('Y-m-d ',strtotime($_POST['dateto']));
	$date1 = new DateTime(date('Y-m-d ',strtotime($_POST['datefrom'])));
	$date2 = new DateTime(date('Y-m-d ',strtotime($_POST['dateto'])));
	$roznica = $date1 ->diff($date2);
	$days = $roznica -> format("%a");
	$CenaKońcowa = $days * $CenaZaDzien;
	$conn->query("INSERT INTO wypozyczenie(Mail,IDPojazdu,Rozpoczecie,Zakonczenie, Zaplata, Informacja) VALUES ('$Mail','$IDPojazdu','$datefrom','$dateto','$CenaKońcowa','Oczekujace')") or die($conn->error);
	header("Location: ../wypozycznia.php");
	exit();
}
?>