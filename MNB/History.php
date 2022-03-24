<!DOCTYPE html>
<html>
<head>
	<title>Order History</title>
	<link rel="stylesheet" type="text/css" href="History.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="top">
		<h1>History</h1>
	<a class="close"href="indexPage.php">
            <i class="fas fa-times"></i>
            </a>
	</div>
	
	<?php 
	echo "<table>";
		 echo"<tr>
			<th>Food Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Email</th>
			

		</tr>";
	    session_start();
		require_once('connection.php');
		$sql="Select * from completedorder where Email='".$_SESSION['User']."'";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{

				echo "<tr>
				
				<td name='name'>".$row["foodName"]."</td>
				<td name='price'> ".$row["Price"]."</td>
				<td name='quantity'>  ".$row["Quantity"]."</td>
				<td name='email'> ".$row["Email"]."</td>
	
				</tr>";  
				
	
			}
			echo "</table>";
		}
		else
		{
			echo"<p>*You have no previous orders*</p>";
		}
		$conn->close();

		 
	echo"</table>";

	 ?>


</body>
</html>