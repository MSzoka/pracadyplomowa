<?php
if(isset($_POST['signup-submit'])){
	require 'config.inc.php';

	$username = $_POST['Name'];
	$mail = $_POST['Mail'];
	$password = $_POST['Password'];
	$password1 = $_POST['Password1'];

	if(empty($username) || empty($mail) || empty($password) || empty($password1)){
		header("Location: ../Rejestracja.php?error=emptyfields&Name=".$username."&Mail=".$mail);
		exit();
	}
	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../Rejestracja.php?error=invalidmailname");
		exit();

	}
	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		header("Location: ../Rejestracja.php?error=invalidmail&Name=".$username);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../Rejestracja.php?error=invalidname&Mail=".$mail);
		exit();
	}
	else if($password !== $password1) {
		header("Location: ../Rejestracja.php?error=invalidpassword&Name=".$username."&Mail=".$mail);
		exit();
	}
	else {
		$sql = "SELECT Name FROM uzytkownicy WHERE Name=?";
		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location: ../Rejestracja.php?error=sqlerror");
		exit();
	}
	else {
		mysqli_stmt_bind_param($stmt,"s",$username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck= mysqli_stmt_num_rows($stmt);
		if($resultCheck > 0) {
			header("Location: ../Rejestracja.php?error=usertaken&Mail=".$mail);
			exit();
		}
		else {
			$sql = "INSERT INTO uzytkownicy (Name, Mail, Password) VALUES (?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../Rejestracja.php?error=sqlerror");
			exit();
			}
			else {
				$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
				mysqli_stmt_bind_param($stmt,"sss",$username, $mail, $hashedpassword);
				mysqli_stmt_execute($stmt);
				header("Location: ../Rejestracja.php?signup=success");
				exit();
			}
		}
	}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../Rejestracja.php");
				exit();
}
?>