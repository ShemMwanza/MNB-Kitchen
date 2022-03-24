<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="UProfile.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
      <div class="navigation-bar">
      	 <div id="Sidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="IndexPage.php">Home</a>
                <a href="Order.php">Products</a>
                <a href="UProfile.php">My Profile</a>
                <a href="logout.php">Log out</a>
                
         </div>

              <div id="main" ></div>
                  <a class="Options" onclick="openNav()"><i class="fas fa-bars"></i></a>
                 
     </div>
	<div class="Loginbox">
		<form action="DeleteUsers.php" method="post">
<div class="logo">

            <img src="Images/logo.png" alt="">
          </div>
	


	<h1>Profile Details</h1>
	

<?php 
session_start();
require_once('connection.php');


$sql="Select * from user where Email ='".$_SESSION['User']."'";
		$result=$conn->query($sql);
		

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{
			echo"
			
			<input type='hidden' name='editID' value='".$row["userID"]."'>
			
			<div class='Email'>	
		<h2>Email</h2>
		<input type='email' name='updateEmail' value='".$row["Email"]."'>
	</div>
	<div class='Username'>	
		<h2>Username</h2>
		<input type='text' name='updateUsername' value='".$row["Username"]."'>
	</div>
	<div class='password'>
		<h3>Password</h3>
		<input type='Password' name='updatePassword'   value='".$row["Password"]."'>
	</div>

	<div class='dob'>
		<h3>DOB</h3>
		<input type='text' name='updateDate'  value='".$row["DOB"]."'>
	</div>
	<br>

	<div class='logbutton'>
		<button  id = 'lbutton' name='updatebtn' type='submit'>Update</button>
		
	</div>
	
";

			}
			} 
			?>
</form>
<script>
            function openNav() {
                document.getElementById("Sidebar").style.width = "230px";
                document.getElementsByClassName("Option");
              }  
              function closeNav() {
                document.getElementById("Sidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
              }
</script>
</div>

</body>
</html>