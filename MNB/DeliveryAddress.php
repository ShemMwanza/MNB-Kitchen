<!DOCTYPE html>
<html>
<head>
	<title>Order Completion</title>
	<link rel="stylesheet" type="text/css" href="DeliveryAddress.css">
</head>
<body>
	<div class="box">
		<form action="DeleteUsers.php" method="post">
		<div class="logo">
            <img src="Images/logo.png" alt="">
        </div>
		<?php 
		require_once('connection.php');
        session_start();
		$sql="SELECT SUM(Quantity*Price) AS Total FROM orders where Email ='".$_SESSION['User']."'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
              {
               while ($row=$result->fetch_assoc())
                {
                   echo "<p class ='total'>Your Total: KES ".$row['Total']."</p>"; 
                }
              }
        echo "<table>";
		 echo"<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>

		</tr>";
		
		require_once('connection.php');

        $sql="Select orderID,Name,Price,Quantity from orders where Email='".$_SESSION['User']."'";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{

				echo "<tr>
				<input value='".$row["orderID"]."'type='hidden' name='orderID' >

				<td name='name'>".$row["Name"]."</td>
				<td name='price'> ".$row["Price"]."</td>
				<td><input class='quant' value='".$row["Quantity"]."'type='text' name='quantity' ></td>
				<td><form method='post' action='DeleteUsers.php'><button type='submit'class='btn' name='RemoveOrder'>Remove</button></form>
				</td>



				
				</tr>";
				
			  }
}
  
				
	
			
			
		else
		{
			echo"<p class='p'>*There is no present order*</p>";
		}
		$conn->close();

		 
	echo"</table>";


		 ?>

		<p>*Notice: We will contact you to confirm your delivery address*</p>
		<br><br>

		<a href="Order.php"><button type='submit'class='btn1' name='CompleteOrder'>Complete Order</button> </a>

		 </form>
	</div>

</body>
</html>
