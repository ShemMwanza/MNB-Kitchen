<?php 
$dbserver="localhost";
$dbuser="root";
$password="";
$dbname="mnb";

$conn=mysqli_connect($dbserver,$dbuser,$password,$dbname);

if($conn)
{
    echo "";

}
else{
    echo "Failed to connect";
}
 ?>