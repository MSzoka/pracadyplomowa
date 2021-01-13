<?php
if(isset($_POST['wypożycz-submit'])){
	require 'config.inc.php';

	$IDpojazdu = $_POST['ID'];
	$Mail = $_POST['Mail'];

	if(empty($IDpojazdu)){
		header("Location: ../wypożycz.php?error=emptyfields");
		exit();
	}
	else {
		$sql = "SELECT * FROM wypozyczenie INNER JOIN uzytkownicy on wypozyczenie.Mail = uzytkownicy.Mail";
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location: ../wypożycz.php?error=sqlerror");
		exit();
	}
	else {
		mysqli_stmt_bind_param($stmt,"s",$IDpojazdu);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck= mysqli_stmt_num_rows($stmt);
		if($resultCheck > 0) {
			header("Location: ../wypożycz.php?error=pojazdtaken");
			exit();
		}
		else {
			$sql = "INSERT INTO wypozyczenie (Mail, IDpojazdu) VALUES (?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../wypożycz.php?error=sqlerror");
			exit();
			}
			else {
				mysqli_stmt_bind_param($stmt,"ss",$Mail, $IDpojazdu);
				mysqli_stmt_execute($stmt);
				header("Location: ../wypożycz.php?signup=success");
				exit();
			}
		}
	}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../wypożycz.php");
				exit();
}
?>