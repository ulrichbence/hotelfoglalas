<?php

session_start();

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($email) || empty($password)) {
		header("Location: ../home.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE email=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) { 
		    header("Location: ../home.php?login=error");
		    exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $email);

			mysqli_stmt_execute($stmt);

        	$result = mysqli_stmt_get_result($stmt);

        	if ($row = mysqli_fetch_assoc($result)) {
				$passwordHashCheck = password_verify($password, $row['passwordHash']);
				if ($passwordHashCheck == false) {
					header("Location: ../home.php?login=hasherror");
					exit();
				} elseif ($passwordHashCheck == true) {
					$_SESSION['ID'] = $row['ID'];
					$_SESSION['userName'] = $row['userName'];
					$_SESSION['email'] = $row['email'];
					header("Location: ../home.php?login=success");
					exit();
				}
        	} else {
        		header("Location: ../home.php?login=error");
				exit();
        	}
		}
	}

	mysqli_stmt_close($stmt);

} else {
	header("Location: ../home.php?login=error");
	exit();
}