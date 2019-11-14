<!DOCTYPE html>

<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="./style.css" media="screen">
	</head>
	<body bgcolor="#e8e8e8">
		<h2>Log In</h2>

		<form action="check.php" method="post">
    	<p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    	</p>
			<p>
			 	<label for="password">Password:</label>
			 	<input type="text" name="password" id="password">
	 		</p>
			<div class="clearfix">
      	<button type="submit" value="Enter" class="signupbtn">Enter</button>
    	</div>
		</form>
		<ul>
			<li><a href="http://localhost/SecureUser/listUsers.php">
				Link to List Users Page</a></li>
			<li><a href="http://localhost/SecureUser/signUp.php">
				Link to Sign Up Page</a></li>
		</ul>
	</body>
</html>
