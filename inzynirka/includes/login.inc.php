<?php  
if(isset($_POST['login-submit'])){
	require 'config.inc.php';

	$usernamemail = $_POST['NameMail'];
	$password = $_POST['Password'];

	if(empty($usernamemail) ||  empty($password))
	{
		header("Location: ../Logowanie.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM uzytkownicy WHERE Name=? OR Mail=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../Logowanie.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss",$usernamemail,$usernamemail);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$passwordcheck = password_verify($password, $row['Password']);
				if($passwordcheck == false){
					header("Location: ../Logowanie.php?error=Invalidpassword");
					exit();
				}
				else if($passwordcheck == true){
					session_start();
					$_SESSION['ID']= $row['ID'];
					$_SESSION['Username']= $row['Name'];
					$_SESSION['Mail']= $row['Mail'];

					header("Location: ../index.php?login=success");
					exit();
				}
				else {
					header("Location: ../Logowanie.php?error=Invalidpassword");
					exit();
				}
			}
			else {
				header("Location: ../Logowanie.php?error=nouser");
				exit();
			}
		}
	}
}
else{
	header("Location: ../Logowanie.php");
	exit();
}

?>