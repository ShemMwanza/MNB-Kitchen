<?php 
session_start();
require_once('connection.php');
if(isset($_SESSION['User'])){
	session_destroy();
	echo '<script>alert("Successfully Logged out!")</script>'; 
	echo '<script>location.href="IndexPage.php"</script>';
}
else if (isset($_SESSION['Admin'])) {
	session_destroy();
	echo '<script>alert("Successfully Logged out!")</script>'; 
	echo '<script>location.href="IndexPage.php"</script>';
}
else{
	echo '<script>alert("You are not logged in!")</script>'; 
	echo '<script>location.href="IndexPage.php"</script>';
}
 
 ?>
