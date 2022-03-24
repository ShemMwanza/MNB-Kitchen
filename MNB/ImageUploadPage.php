<?php
  
  require_once('connection.php');
  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
  	$description = mysqli_real_escape_string($conn, $_POST['description']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

  	$target = "Uploaded/".basename($image);

  	$sql = "INSERT INTO items (image, description,price, name ,type) VALUES ('$image', '$description', '$price' , '$name', '$type')";
  
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		header("location:Page.php");
  	}else{
  		echo "Problem in uploading file";
  	}
  }
  
?>
