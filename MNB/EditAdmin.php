<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
	<link rel="stylesheet" type="text/css" href="Edit.css">
</head>
<body>
	<div class="Loginbox">
	<form action="DeleteUsers.php" method="post">
		
	
<div class="title-edit">

	<h1>Edit</h1>
	

</div>
<?php 
require_once('connection.php');
$id=$_POST["id"];
$sql="Select * from admin where adminID='".$id."'";
		$result=$conn->query($sql);
		

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{
			echo"

			<input type='hidden' name='editID' value='".$row["adminID"]."'>
			
			<div class='Email'>	
		<h2>Email</h2>
		<input type='email' name='updateEmail'  value='".$row["Email"]."'>
	</div>
	<div class='Username'>	
		<h2>Username</h2>
		<input type='text' name='updateUsername' value='".$row["Username"]."'>
	</div>


	<div class='password'>
		<h3>Password</h3>
		<input type='Password' name='updatePassword'   value='".$row["Password"]."'>
	</div>
	
	<br>
	
	<div class='logbutton'>
		<button  id = 'lbutton' name='Adminupdatebtn' type='submit'>Update</button>
		
	</div>



";

			}
			} 
			?>
 </form>
</div>
</body>
</html>