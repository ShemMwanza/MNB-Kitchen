<?php
require_once('connection.php');

//Update Item
if(isset($_POST['updateItembtn']))
{
 $id=$_POST["ID"];
  $image=$_POST["image"];
  $name=$_POST["name"];
  $description=$_POST["description"];
  $price=$_POST["price"];
  $sql="Update items set image='".$image."' , name='".$name."',description='".$description."',price='".$price."' where itemID='".$id."'";
   if ($conn->query($sql) === TRUE)
      {
          echo '<script>alert("Successfully Updated!")</script>';
          echo '<script>location.href="Page.php"</script>'; 
     }
else
    {
       echo "There is a problem";
               
    }
}

//Delete Items

if(isset($_POST['ItemdeleteBtn']))
{
  $id=$_POST["deleteItem"];
  $sql1="delete from items where itemID='".$id."'";
   if ($conn->query($sql1) === TRUE)
    {
      echo '<script>location.href="Page.php"</script>'; 
    }

else
    {
       echo "There is a problem";
               
    }
}

?>