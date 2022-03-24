<?php 
session_start();
$_SESSION['User'];
require_once('connection.php');
if(isset($_POST['addtocart']))
{

             require_once('connection.php');
             $sql1="Select userID from user where Email='".$_SESSION['User']."'";
             $result1=$conn->query($sql1);

             if($result1->num_rows>0)
              {
               while ($row=$result1->fetch_assoc())
                {
                    $_SESSION['UserID']=$row['userID'];
                }
              }
             $sql1="Select Username from user where Email='".$_SESSION['User']."'";
             $result1=$conn->query($sql1);

             if($result1->num_rows>0)
              {
               while ($row=$result1->fetch_assoc())
                {
                    $_SESSION['Username']=$row['Username'];
                }
              }

		$id=$_POST["itemID"];
		require_once('connection.php');
		$sql="Select * from items where itemID='".$id."'";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{
				
    	        $sql3 = "INSERT INTO cart(Fimage, Name,Price,userID)
                VALUES('".$row['image']."', '".$row["name"]."', '".$row["price"]."','".$_SESSION['UserID']."')";


                if ($conn->query($sql3) === TRUE)
                 {
                  echo '<script>alert("Item added to cart")</script>';
                  echo '<script>location.href="Order.php"</script>'; 
                 } 
                else 
                {
                    echo "Error: " . $sql3 . "<br>" . $conn->error;
                }
			}
			
		}
		else
		{
			echo "Error: " . $sql3 . "<br>" . $conn->error;
			echo"Nothing is happening";
		}
		

	 

}
// if(isset($_POST['addtocart']))
// {
// require_once('connection.php');
// 		$sql1="Select userID from user where Email='".$_SESSION['User']."'";
//         $result1=$conn->query($sql1);

//     if($result1->num_rows>0)
//     {
//       while ($row=$result1->fetch_assoc())
//       {
//       	 $sql4 = "INSERT INTO cart(userID)
//                 VALUES('".$row["userID"]."')";

//                   if ($conn->query($sql4) === TRUE)
//                  {
//                     echo"Nothing is happening";
  
//                  } 
//                 else 
//                 {
//                     echo "Error: " . $sql4 . "<br>" . $conn->error;
//                 }
//       }
//     }
//     $conn->close(); 
// }
 ?>

<!-- session_start();
$_SESSION['User'];
require_once('connection.php');
if(isset($_POST['addtocart']))
{
	
		
		echo "<table>";
		 echo"<tr>
			<th>Food Image</th>
			<th>Name</th>
			<th>Price</th>

		</tr>";
		$id=$_POST["itemID"];
		require_once('connection.php');
		$sql="Select * from items where itemID='".$id."'";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{
				echo "<tr>
				<td><img height='40' width='40' src='Uploaded/".$row['image']."' ></td>
				<td>".$row["name"]."</td>
				<td>".$row["price"]."</td>
				<td>
				<a ><button type='submit'class='btn' name='deleteBtn'>Remove</button> </a>
				</td>
				
				</tr>";
	
    	$sql3 = "INSERT INTO cart(Fimage, Name,Price)
    VALUES('".$row['image']."', '".$row["name"]."', '".$row["price"]."')";


if ($conn->query($sql3) === TRUE) {
  header("location:Order.php");
  
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}
			}
			echo "</table>";
		}
		else
		{
			echo"Nothing is happening";
		}
		$conn->close();

		 
	echo"</table>";
} -->

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="Cart.css">
</head>
<body>

	<div class="Cartbox">

		<form action="DeleteUsers.php" method="post">
			<h1 id="Tcart">Cart</h1>
	<?php 
	echo "<table>";
		 echo"<tr>
			<th>Food Image</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>

		</tr>";
		
		require_once('connection.php');
		$sql="Select * from cart where userID='".$_SESSION['UserID']."'";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{

				echo "<tr>

				<input type='hidden' name='CartID' value='".$row["cartID"]."'>
				<td><img height='60' width='60' src='Uploaded/".$row['Fimage']."' ></td>
				<td name='name'>".$row["Name"]."</td>
				<td name='price'> ".$row["Price"]."</td>
				<td><input class='quant' type='text' name='quantity' ></td>
				<td>
				<a ><button type='submit'class='btn' name='RemoveBtn'>Remove</button> </a>
				</td>



				
				</tr>";
				
				if(isset($_POST['OrderComplete']))
           {
           	require_once('connection.php');

             $sql= "INSERT INTO orders(Name,Price,Quantity,userID,Email)
                VALUES('".$row["name"]."', '".$row["price"]."','".$_POST['quantity']."','".$_SESSION['UserID']."','".$_SESSION['User']."')";


                if ($conn->query($sql) === TRUE)
                 {
                    
  
                 } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
}
  
				
	
			}
			echo "</table>";
		}
		else
		{
			echo"<p class='noitemincart'>*There is no item in the cart*</p>";
		}
		$conn->close();

		 
	echo"</table>";

	 ?>
	 

	 <br><br>
	 <a href="DeliveryAddress.php"><button type='submit'class='btn1' name='OrderComplete'>Check Out</button> </a>
 </form>
</div>

</body>
</html>
