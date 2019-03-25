<?php

if (isset($_POST['submit']))
{

	include_once 'dbh.inc.php';

	$userName = mysqli_real_escape_string($conn, $_POST['userName']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$passwordVerify = mysqli_real_escape_string($conn, $_POST['passwordVerify']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	

	if (empty($userName) || empty($password) || empty($passwordVerify) || empty($email))
	{
		header("Location: ../home.php?signup=empty");
		exit();
	}
	else
	{
		if ($password != $passwordVerify)
		{
			header("Location: ../home.php?signup=pwnotmatch");
			exit();
		}
		else
		{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../home.php?signup=email");
				exit();
			}
			else
			{
				$sql = "SELECT * FROM users WHERE email=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql))
				{
					header("Location: ../home.php?login=error1");
					exit();
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "s", $email);

					mysqli_stmt_execute($stmt);

					mysqli_stmt_store_result($stmt);
					$resultCheck = mysqli_stmt_num_rows($stmt);
					if ($resultCheck > 0)
					{
						header("Location: ../home.php?signup=emailtaken");
						exit();
					}
					else
					{
						$passwordHash = password_hash($password, PASSWORD_DEFAULT);
						$sql = "INSERT INTO users (userName, passwordHash, email) VALUES (?, ?, ?)";
						$stmt = mysqli_stmt_init($conn);

						if(!mysqli_stmt_prepare($stmt, $sql))
						{
						    header("Location: ../home.php?login=error2");
						    exit();
						}
						else
						{
							mysqli_stmt_bind_param($stmt, "sss", $userName, $passwordHash, $email);
							mysqli_stmt_execute($stmt);
							header("Location: ../home.php?signup=success");
							exit();

						}
					}
				}
			}
		}
	}

	mysqli_stmt_close($stmt);

}
else
{
	header("Location: ../home.php");
	exit();
}
