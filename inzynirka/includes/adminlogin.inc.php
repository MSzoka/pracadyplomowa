<?php  
if(isset($_POST['admin-submit'])){
	require 'config.inc.php';

	$usernamemail = $_POST['Nazwa'];
	$password = $_POST['Password'];

	if(empty($usernamemail) ||  empty($password))
	{
		header("Location: ../adminlogin.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM `admin`";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../adminlogin.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s",$usernamemail);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$passwordcheck = password_verify($password, $row['Password']);
				if($passwordcheck == false){
					header("Location: ../adminlogin.php?error=Invalidpassword");
					exit();
				}
				else if($passwordcheck == true){
					session_start();
					$_SESSION['Nazwa']= $row['Nazwa'];

					header("Location: ../admin.php?login=success");
					exit();
				}
				else {
					header("Location: ../adminlogin.php?error=Invalidpassword");
					exit();
				}
			}
			else {
				header("Location: ../adminlogin.php?error=nouser");
				exit();
			}
		}
	}
}
else{
	header("Location: ../admin.php");
	exit();
}

?>