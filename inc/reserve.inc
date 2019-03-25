<?php 
	session_start();
	require_once "db.php";

	$db = db::get();

if (isset($_POST["submit"])) {

	$conn = mysqli_connect("localhost", "root", "", "roxforthotel");

	$reservedate = new DateTime($_POST["reserve_date"]);
	$reservedate->format('Y-m-d H:i:s');

	$endReserve = new DateTime($_POST["reserve_date_end"]);
	$endReserve->format('Y-m-d H:i:s');

	$forwho = mysqli_real_escape_string($conn, $_POST["forwho"]);
	$pepolenumber = mysqli_real_escape_string($conn, $_POST["numberofpepole"]);
	$pepolenumber = (int)$pepolenumber;
	$message = mysqli_real_escape_string($conn, $_POST["message"]);
	$bookedat = date("Y-m-d");
	$now = date('Y-m-d H:i:s');
	$roomNumber = mysqli_real_escape_string($conn, $_POST["roomNumber"]);

	if (empty($reservedate) || empty($endReserve) || empty($forwho) || empty($pepolenumber)) 
	{
		echo "<script>window.location.href='../index.php?error=empty';</script>";
	}
	elseif ($pepolenumber > 20) {
		echo "<script>window.location.href='../index.php?error=big';</script>";
	}
	else
	{	
		if(empty($message)){$message = "No message  given.";}

			$userid = 9; //basically, you are booking as a quest if you not logged in

			if (isset($_SESSION["username"])) 
			{

				$user = $_SESSION["username"];
				$selectString = "SELECT id FROM users WHERE username = '".$user."'";
				$selectQuery = mysqli_query($conn, $selectString);
				$userstuff = mysqli_fetch_assoc($selectQuery);
				$userid = $userstuff["id"];
			}

			if ($now > date_format($reservedate, "Y-m-d H:i:s")) {echo "<script>window.location.href='../index.php?error=wrongDate';</script>";}

			else
			{
					$selectReservedTablesThenQuery = "SELECT reservations.room_id FROM reservations WHERE reservations.reserve_date <= '".date_format($reservedate, 'Y-m-d H:i:s')."' AND reserve_date_end >= '".date_format($endReserve, 'Y-m-d H:i:s')."'";
					$reservedTablesThen = $db->getArray($selectReservedTablesThenQuery);
					$reservedThen = array();

					foreach ($reservedTablesThen as $tables) {
						array_push($reservedThen, intval($tables["table_id"]));
					}

					if (!(in_array($roomNumber, $reservedThen))) {
						$insertString = "INSERT INTO `reservations` (`id`, `forWho`, `reserve_date`, `reserved_date_end`, `message`, `pepoleNo`, `reserved_by`, `room_id`, `reserved_at`) VALUES (NULL, '$forWho', '".date_format($reservedate, 'Y-m-d H:i:s')."', '".$endReserve."','$message', '$pepolenumber', '$userid', '$roomNumber', '$bookedat')";
						mysqli_query($conn, $insertString);
						header("location: " .$_SERVER["http-referer"]);
					}
					else
					{
						echo "<script>window.location.href='../index.php?error=reserved';</script>";
					}
			}

		}

	}
	
 ?>