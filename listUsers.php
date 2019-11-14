<!DOCTYPE html>

<html>
	<head>
		<title>List Users</title>
		<link rel="stylesheet" href="./style.css" media="screen">
	</head>
	<body bgcolor="#e8e8e8">
		<?php

		include 'connect.php';

		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}

		//Get name of table
		$query = "SELECT * FROM Users ";

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}

		//Get number of columns
		$fields_num = mysqli_num_fields($result);
		echo "<h1>List Users: </h1>";
		echo "<table id='t01' border='1'><tr>";

		//Prints table headers
		for($i=0; $i<$fields_num-1; $i++) {
			$field = mysqli_fetch_field($result);
			echo "<td><b>$field->name</b></td>";
		}
		echo "</tr>\n";

		//Prints table contents
		while($row = mysqli_fetch_row($result)) {
			echo "<tr>";
			for($i=0;$i<6;$i++){
				echo "<td>$row[$i]</td>";
			}
			echo "</tr>\n";
		}

		mysqli_free_result($result);
		mysqli_close($conn);
		?>

		<a href="http://localhost/SecureUser/signUp.php">
			Link to Sign Up Page</a>

	</body>
</html>
