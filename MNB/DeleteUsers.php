<?php 
require_once('connection.php');
session_start();

//Delete Users

if(isset($_POST['deleteBtn']))
{
	$id=$_POST["delete"];
	$sql1="delete from user where userID='".$id."'";
	 if ($conn->query($sql1) === TRUE)
                    {
                       header("location:table.php");
                    }
else
    {
       echo "There is a problem";
               
    }
}
if(isset($_POST['AdmindeleteBtn']))
{
	$id=$_POST["deleteAdmin"];
	$sql2="delete from admin where adminID='".$id."'";
	 if ($conn->query($sql2) === TRUE)
        {
            header("location:table.php");
        }
else
    {
       echo "There is a problem";
               
    }
}



//Update Users


if(isset($_POST['updatebtn']))
{
	$id=$_POST["editID"];
	$email=$_POST["updateEmail"];
	$username=$_POST["updateUsername"];
	$password=$_POST["updatePassword"];
	$date=$_POST["updateDate"];
	$sql="Update user set Email='".$email."' , Username='".$username."',Password='".$password."',DOB='".$date."' where userID='".$id."'";
	 if ($conn->query($sql) === TRUE)
      {
        

        require_once('connection.php');
        if(isset($_SESSION['User']))
         {
          echo '<script>alert("Successfully Updated!")</script>';
          echo '<script>location.href="UProfile.php"</script>'; 
         }
        else
         {
          echo '<script>alert("Successfully Updated!")</script>';
          echo '<script>location.href="table.php"</script>'; 
         }
          

     }
else
    {
       echo "There is a problem";
               
    }
}
if(isset($_POST['Adminupdatebtn']))
{
	$id=$_POST["editID"];
	$email=$_POST["updateEmail"];
	$username=$_POST["updateUsername"];
	$password=$_POST["updatePassword"];
	$date=$_POST["updateDate"];
	$sql="Update admin set Email='".$email."' , Username='".$username."',Password='".$password."' where adminID='".$id."'";
	 if ($conn->query($sql) === TRUE)
                    {
                       header("location:table.php");
                    }
else
    {
       echo "There is a problem";
               
    }
}




//Remove from order
if(isset($_POST['RemoveOrder']))
{
  $id=$_POST["orderID"];
  $sql1="delete from orders where orderID='".$id."'";
   if ($conn->query($sql1) === TRUE)
                    {
                       header("location:DeliveryAddress.php");
                    }
else
    {
       echo "There is a problem";
               
    }
}



//Remove from cart
if(isset($_POST['RemoveBtn']))
{
  $id=$_POST["CartID"];
  $sql1="delete from cart where cartID='".$id."'";
   if ($conn->query($sql1) === TRUE)
                    {
                       header("location:Cart.php");
                    }
else
    {
       echo "There is a problem";
               
    }
}

require_once('connection.php');
if(isset($_POST['OrderComplete']))
{
    $sql="Select * from cart where userID ='".$_SESSION['UserID']."'";
    $result=$conn->query($sql);

    if($result->num_rows>0)
    {
      while ($row=$result->fetch_assoc())
      {

             $sql= "INSERT INTO orders(Name,Price,Quantity,userID,Email)
                VALUES('".$row["Name"]."', '".$row["Price"]."','".$_POST['quantity']."','".$_SESSION['UserID']."','".$_SESSION['User']."')";


                if ($conn->query($sql) === TRUE)
                 {
                  echo '<script>location.href="DeliveryAddress.php"</script>';
                 } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    echo '<script>alert("There is no item in cart")</script>';
                }
}
     } 
     }

 if(isset($_POST['CompleteOrder']))
{ 

  $sql1="delete from cart where userID='".$_SESSION['UserID']."'";
  if ($conn->query($sql1) === TRUE)
    {
      echo '<script>location.href="Order.php"</script>';
      echo '<script>alert("Your Order has been placed")</script>';


    } 
  else 
    {
      echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

}     

if(isset($_POST['Completebtn']))
{
  $id=$_POST["OrderID"];
  require_once('connection.php');
    $sql="Select * from orders where orderID='".$id."'";
    $result=$conn->query($sql);

    if($result->num_rows>0)
    {
      while ($row=$result->fetch_assoc())
      {

  $sql= "INSERT INTO completedorder(foodName,Price,Quantity,Email)
                VALUES('".$row["Name"]."', '".$row["Price"]."','".$row["Quantity"]."','".$row["Email"]."')";


                if ($conn->query($sql) === TRUE)
                 {
                    echo '<script>location.href="ViewOrders.php"</script>';
                 } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

  $sql1="delete from orders where orderID='".$id."'";
    if ($conn->query($sql1) === TRUE)
                 {
                  
                 } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
}
}
}  

   //Adding comment to database

if( isset($_SESSION['User']) && isset($_POST['commentbtn']))
  
  {
    $sql="INSERT INTO comments(userID,comment)VALUES ('".$_SESSION['UserID']."','".$_POST['comment']."')";
        if ($conn->query($sql) === TRUE)
          {
             echo '<script>location.href="Comments.php"</script>';
          } 
        else 
          {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

  }

  
else if(isset($_POST['commentbtn']) && !isset($_SESSION['User']))
{
  echo '<script>location.href="Login.php"</script>';
}
else{
  echo "Error";
}




 ?>
