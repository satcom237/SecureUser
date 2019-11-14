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
		$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);
		$salt = 10;
		$password = $password . $salt; //Salting the password

		//Insert query
		function insertUser($username, $firstName, $lastName, $email, $password, $age, $salt){
			$conn1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$query = "INSERT INTO Users (username, firstName, lastName, email, password, age, salt) VALUES (?, ?, ?, ?, MD5(?), ?, ?)";

			$stmt = mysqli_stmt_init($conn1); //Creating param query
			if(!mysqli_stmt_prepare($stmt, $query)){
				echo "ERROR";
			}
			else{
				validateUser($username, $firstName, $lastName, $email, $password, $age, $salt);
				mysqli_stmt_bind_param($stmt, "sssssss", $username, $firstName, $lastName, $email, $password, $age, $salt);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$message = "Record successfully added";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo $message;
			}
		}

		function validateUser($username, $firstName, $lastName, $email, $password, $age, $salt){
			$conn1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$sql = "SELECT username FROM users WHERE username = '$username'"; //Get data from table
			$result = mysqli_query($conn1, $sql); //Execute
			if($row = mysqli_fetch_assoc($result)){ //Checks table data
				$message = "Username already taken";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "Username already taken";
				exit;
			}
			if($username == NULL || $firstName == NULL || $lastName == NULL ||
				$email == NULL || $password == NULL){
				$message = "Required field/s missing";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo " Required field/s missing";
				exit;
			}
			if(strlen($password) < 8){ //Make sure password is atleast 8 chars
				$message = "Password is less than 8 characters";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo $message;
				exit;
			}
			if($age != NULL){
				if(!is_numeric($age) || $age > 120){
					$message = "Enter valid age";
					echo "<script type='text/javascript'>alert('$message');</script>";
					echo " Enter valid age";
					exit;
				}
			}
		}

		insertUser($username, $firstName, $lastName, $email, $password, $age, $salt);

		//Close connection
		mysqli_close($conn);
		?>

	</body>
</html>
