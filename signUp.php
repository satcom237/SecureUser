<!DOCTYPE html>

<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="./style.css" media="screen">
	</head>
	<body bgcolor="#e8e8e8">
		<h2>Sign Up</h2>

		<form action="insert.php" method="post">
    	<p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    	</p>
    	<p>
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName">
    	</p>
    	<p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName">
    	</p>
	  	<p>
      	<label for="email">Email:</label>
        <input type="text" name="email" id="email">
    	</p>
			<h5>Password must be atleast 8 characters long</h5>
			<p>
			 	<label for="password">Password:</label>
			 	<input type="text" name="password" id="password">
	 		</p>
	 		<p>
				<label for="age">Age:</label>
				<input type="text" name="age" id="age">
			</p>
			<div class="clearfix">
      	<button type="submit" value="Sign Up" class="signupbtn">Sign Up</button>
    	</div>
		</form>

		<ul>
			<li><a href="http://localhost/SecureUser/listUsers.php">
				Link to List Users Page</a></li>
			<li><a href="http://localhost/SecureUser/logIn.php">
				Link to Log In Page</a></li>
		</ul>
	</body>
</html>
