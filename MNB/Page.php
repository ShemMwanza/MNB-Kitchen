<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
  body{
    background: none;
  }
</style>
 <link rel="stylesheet" type="text/css" href="Page.css">
</head>
<body>

  
<div id="content">
  <h1>Burgers</h1>
  <?php
   require_once('ImageUploadPage.php');
   $result = mysqli_query($conn, "SELECT * FROM items where type ='Burger'");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "  <a href='#'><img src='Uploaded/".$row['image']."' ></a>";
        echo "<p>".$row['name']."</p>";
        echo "<p id='desc' >".$row['description']."</p>";
        echo "<p>KES  ".$row['price']."</p>";
       echo " <form action='UpdateItem.php' method='post'>
        <input type='hidden' name='deleteItem' value='".$row["itemID"]."' >
        <button type='submit' class='btn' name='ItemdeleteBtn'>Delete</button> 
        <br>
        <br>
        </form>
        <form action='EditItems.php' method='post'>
        <input type='hidden' name='editItem' value='".$row["itemID"]."' >
        <a href='EditItems.php'><button type='submit' class='btn' name='ItemeditBtn'>Edit</button> </a>
        </form>";

      echo "</div>";
    }
  ?>


  <h1>Pizza</h1>
  <?php
   require_once('ImageUploadPage.php');
   $result = mysqli_query($conn, "SELECT * FROM items where type ='Pizza'");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "  <a href='#'><img src='Uploaded/".$row['image']."' ></a>";
        echo "<p>".$row['name']."</p>";
        echo "<p id='desc'>".$row['description']."</p>";
        echo "<p>KES  ".$row['price']."</p>";
        echo " <form action='UpdateItem.php' method='post'>
        <input type='hidden' name='deleteItem' value='".$row["itemID"]."' >
        <button type='submit' class='btn' name='ItemdeleteBtn'>Delete</button> 
        <br>
        <br>
        </form>
        <form action='EditItems.php' method='post'>
        <input type='hidden' name='editItem' value='".$row["itemID"]."' >
        <a href='EditItems.php'><button type='submit' class='btn' name='ItemeditBtn'>Edit</button> </a>
        </form>";

      echo "</div>";
    }
  ?>
    <h1>Specials</h1>
  <?php
   require_once('ImageUploadPage.php');
   $result = mysqli_query($conn, "SELECT * FROM items where type ='Special'");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "  <a href='#'><img src='Uploaded/".$row['image']."' ></a>";
        echo "<p>".$row['name']."</p>";
        echo "<p id='desc'>".$row['description']."</p>";
        echo "<p>KES  ".$row['price']."</p>";
        echo " <form action='UpdateItem.php' method='post'>
        <input type='hidden' name='deleteItem' value='".$row["itemID"]."' >
        <button type='submit' class='btn' name='ItemdeleteBtn'>Delete</button> 
        <br>
        <br>
        </form>
        <form action='EditItems.php' method='post'>
        <input type='hidden' name='editItem' value='".$row["itemID"]."' >
        <a href='EditItems.php'><button type='submit' class='btn' name='ItemeditBtn'>Edit</button> </a>
        </form>";

      echo "</div>";
    }
  ?>


  <form method="POST" action="ImageUploadPage.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea  id="text" cols="40" rows="2" name="name" placeholder="Type the name"></textarea><br>
      <textarea id="text" cols="40" rows="4" name="description" placeholder="Give a description"></textarea><br>
      <textarea  id="text" cols="40" rows="2" name="type" placeholder="Enter the food type"></textarea><br>
      <textarea id="text" cols="40" rows="2" name="price" placeholder="Type the price"></textarea>
    </div>
    <div >
      <button class="Ubtn" id="button" type="submit" name="upload" >Upload</button>
    </div>
  </form>
</div>
</body>
</html>