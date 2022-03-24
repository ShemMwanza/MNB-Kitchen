
	 <!DOCTYPE html>
	 <html>
	 <head>
	 	<title>Customer Orders</title>
	 	<link rel="stylesheet" type="text/css" href="ViewOrders.css">
	 </head>
	 <body>
	 	<h1>Pending Orders</h1>
	 	<form action="DeleteUsers.php" method="post">
	 	<?php 
	echo "<table>";
		 echo"<tr>
			<th>Food Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Email</th>
			

		</tr>";
		
		require_once('connection.php');
		$sql="Select * from orders";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{

				echo "<tr>
				<input type='hidden' name='OrderID' value='".$row["orderID"]."'>
				<td name='name'>".$row["Name"]."</td>
				<td name='price'> ".$row["Price"]."</td>
				<td name='quantity'>  ".$row["Quantity"]."</td>
				<td name='email'> ".$row["Email"]."</td>
				<td>
				<a ><button type='submit'class='btn' name='Completebtn'>Completed</button> </a>
				</td>



				
				</tr>";  
				
	
			}
			echo "</table>";
		}
		else
		{
			echo "<p class='p'>*There is no pending order*</p>";
		}
		 
	echo"</table>";

	 ?>
	 <h1>Completed orders</h1>
	 <?php 
	echo "<table>";
		 echo"<tr>
			<th>Email</th>
			<th>Food Name</th>
			<th>Quantity</th>
			<th>Price</th>
			

		</tr>";
		
		require_once('connection.php');
		$sql="Select * from completedorder";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{

				echo "<tr>
				
				<td name='email'> ".$row["Email"]."</td>
				<td name='name'>".$row["foodName"]."</td>
				<td name='quantity'>  ".$row["Quantity"]."</td>
				<td name='price'> ".$row["Price"]."</td>



				
				</tr>";  
				
	
			}
			echo "</table>";
		}
		else
		{
			echo"<p class='p'>*There is no completed order*</p>";
		}
		$conn->close();

		 
	echo"</table>";

	 ?>
	  </form>
	 </body>
	 </html>