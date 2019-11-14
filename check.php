<!DOCTYPE html>

<html>
	<head>
		<title>Status</title>
		<link rel="stylesheet" href="./style.css" media="screen">
	</head>
	<body>
		<h2>Status</h2>
		<?php

		include 'connect.php';

		//Error check connection
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}

		//User inputs
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$salt = 10;
		$password = $password . $salt; //Salting the password

		checkUser($username, $password, $salt);

		function checkUser($username, $password, $salt){
			$conn1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$query = "SELECT username FROM users WHERE username = ? AND
				password = MD5(?)"; //Get data from table

			$stmt = mysqli_stmt_init($conn1); //Creating param query
			if(!mysqli_stmt_prepare($stmt, $query)){
				echo "ERROR";
			}
			else{
				mysqli_stmt_bind_param($stmt, "ss", $username, $password);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
			}

			if($row = mysqli_fetch_assoc($result)){ //Checks table data
				$message = "You have logged in";
			}
			else{
				$message = "Username or Password is invalid";
			}
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo $message;
			exit;
		}

		//Close connection
		mysqli_close($conn);
		?>
	</body>
</html>
