<!DOCTYPE html>
<html>
<head>
<title>Order Food Page</title>
<link rel="stylesheet" type="text/css" href="Page.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  
  <div class="page">
        
      <div class="navigation-bar">

          <div class="logo">

            <img src="Images/logo.png" alt="">
          </div>

        <div class="navigation-links">
            <ul>
                <a href="IndexPage.php"><li>Home</li></a>
                <a href="Order.php"><li>Products</li></a>
                <a href="#"><li>About Us</li></a>
                
                
            </ul>
        </div>
        <div class="search">
            <input class="search-text" type="text" name="" placeholder="Search">  
                
        </div>
        
           <a class="search-btn"href="#">
            <i class="fas fa-search"></i>
            </a>
            
               <?php


             session_start();
             require_once('connection.php');
$sql="Select Username from user where Email='".$_SESSION['User']."'";
    $result=$conn->query($sql);

    if($result->num_rows>0)
    {
      while ($row=$result->fetch_assoc())
      {
      echo"
      <h4 class='eat'>".$row["Username"]."</h4>";
       echo"<a href='Cart.php'><i id='cart' class='fa fa-shopping-cart'></i></a>";
      }
    }


              ?> 

            <div id="Sidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="IndexPage.php">Home</a>
                <a href="#">Products</a>
                <a href="UProfile.php">My Profile</a>
                <a href="History.php">History</a>
                <a href="logout.php">Log out</a>
                
            </div>

              <div id="main" ></div>
                  <a class="Options" onclick="openNav()"><i class="fas fa-bars"></i></a>
                 
             </div>
       

            

    </div>


<div id="content">
 
  <h1>Burgers</h1>
  <?php
   require_once('ImageUploadPage.php');
   $result = mysqli_query($conn, "SELECT * FROM items where type ='Burger'");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "  <a href='#'><img src='Uploaded/".$row['image']."' ></a>";
        echo "<p>".$row['name']."</p>";
        echo "<p  id='desc'>".$row['description']."</p>";
        echo "<p>KES  ".$row['price']."</p>";
        echo"<form action='Cart.php' method='post'>";
        echo "<input type='hidden' name='itemID' value='".$row['itemID']."'>";
        echo "<input class='AddtoCart' type='submit' value='Add to Cart' name='addtocart'>";
        echo "</form>";

      echo "</div>";
    }
  ?>

  <h1>Pizza</h1>
  <?php
   require_once('ImageUploadPage.php');
   $result = mysqli_query($conn, "SELECT * FROM items where type ='Pizza'");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      echo "<input class='id' type='hidden' name='itemID' value='".$row['itemID']."'>";
        echo "  <a href='#'><img src='Uploaded/".$row['image']."' name='image'></a>";
        echo "<p>".$row['name']."</p>";
        echo "<p  id='desc'>".$row['description']."</p>";
        echo "<p>KES  ".$row['price']."</p>";
        echo"<form action='Cart.php' method='post'>";
        echo "<input type='hidden' name='itemID' value='".$row['itemID']."'>";
        echo "<a href='Cart.php'><input class='AddtoCart' type='submit' value='Add to Cart' name='addtocart'></a>";
        echo "</form>";

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
        echo "<p  id='desc'>".$row['description']."</p>";
        echo "<p>KES  ".$row['price']."</p>";
        echo"<form action='Cart.php' method='post'>";
        echo "<input type='hidden' name='itemID' value='".$row['itemID']."'>";
        echo "<input class='AddtoCart' type='submit' value='Add to Cart' name='addtocart'>";
        echo "</form>";

      echo "</div>";
    }
  ?>

  
</div>

<script>
   function openNav()
    {
      document.getElementById("Sidebar").style.width = "230px";
      document.getElementsByClassName("Option");
    }  
   function closeNav() 
   {
      document.getElementById("Sidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
   }
</script>
</body>
</html>