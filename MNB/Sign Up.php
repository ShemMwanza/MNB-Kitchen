<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="Sign up.css">
</head>
<body>
    <div class="Signupbox">
        <form action="db_connect.php" method="post">
            <div class="logo">

              <img src="Images/logo.png" alt="">
            </div>
            <div class="title-signup">
                <h1>Sign Up</h1>
        
            </div>

            <div class="Email">
                <h2>Email</h2>
                <input type="email" name="email" id="email1">
            </div>

            <div class="Uname">
                <h3>Username</h3>
                <input type="text" name="Username" id="uname">
            </div>
            
            <div class="password">
                <h4>Password</h4>
                <input type="Password" name="password1" id="Lpassword">
            </div>
            
            <div class="Date"> 
                <h5>Date of Birth</h5>
                <input type="date" name="DateB"  step="1"id="myDate">  
            </div>
            <br>
           
            
            <div class="signbutton">
                <button  id = "sbutton" name="signup" type="submit">Sign Up</button>
                
            </div>
            <div class="loginlink">
                <p>Already have an account?<a href="Login.php" title="Already have an account?"> Log in</a></p>
            </div>
           
           
            
        </form>

    </div>
    

</body>
</html>