<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="Edit.css">
</head>
<body>
	<div class="Loginbox">
	<form action="UpdateItem.php" method="post">

	
<div class="title-edit">

	<h1>Edit</h1>
	

</div>
<?php 
require_once('connection.php');
$id=$_POST["editItem"];
$sql="Select * from items where itemID='".$id."'";
		$result=$conn->query($sql);
		

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{

			echo"
			<input type='hidden' name='ID' value='".$row["itemID"]."'>

			<input type='file' name='image' value='".$row["image"]."'>
			
			<div class='Email'>	
		<h2>Name</h2>
		<input type='text' name='name'  value='".$row["name"]."'>
		<br>
	</div>
	<div class='Username'>	
		<h2>Description</h2>
		<input type='text' name='description' value='".$row["description"]."'>
		<br>
	</div>


	<div class='password'>
		<h3>Price</h3>
		<input type='text' name='price' value='".$row["price"]."'>
	</div>
	<div class='dob'>
		<h3>Type</h3>
		<input type='text' name='type'   value='".$row["type"]."'>
	</div>
	<br>
	
	<div class='logbutton'>
		<button  id = 'lbutton' name='updateItembtn' type='submit'>Update</button>
		
	</div>



";

			}
			} 
			?>
 </form>
</div>
</body>
</html>