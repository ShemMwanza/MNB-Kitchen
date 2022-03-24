<?php
require_once('connection.php');
$email=$_POST["email"];
$Username=$_POST["Username"];
$password=$_POST["password1"];
$Date=$_POST["DateB"];




// $sql = "INSERT INTO user (Email, Username,Password,DOB) VALUES ("$email", "$Username", "$password","$Date")";
$section=explode("@",$email);
if($section[1]=="mnb.com")
{
	$sql= "INSERT INTO admin(Email, Username, Password)
    VALUES ('$email', '$Username', '$password')";
    

}
else
{
	$sql = "INSERT INTO user(Email, Username, Password,DOB)
    VALUES ('$email', '$Username', '$password','$Date')";
}

if ($conn->query($sql) === TRUE) {
  header("location:Login.php");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>


