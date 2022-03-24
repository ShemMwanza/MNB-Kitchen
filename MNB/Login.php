
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
	
</head>
<body>
	
<div class="Loginbox">
	<form action="Log_db.php" method="post">
<div class="logo">

            <img src="Images/logo.png" alt="">
</div>
<div class="title-login">

	<h1>Login</h1>
	

</div>
	

	<div class="Email">
		
		
		<h2>Email</h2>
		<input type="email" name="email"  id="emailadd">
	</div>


	<div class="password">
		<h3>Password</h3>
		<input type="Password" name="password"  id="Lpassword">
	</div>
	<br>
	
	<div class="logbutton">
		<button  id = "lbutton" name="login" type="submit">Login</button>
		
	</div>
	<br>
	<div class="signuplink">
		<a href="Sign up.php">Create a new account</a>
	</div>
 </form>
</div>
	
</body>
</html>