<!DOCTYPE html>
<html>
<head>
    <title>Index Page</title>
    <link rel="stylesheet" type="text/css" href="IndexPage.css">
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
     <?php
      session_start();  
       require_once('connection.php');

            if(isset($_SESSION['User']))
            {
            echo ' <a name="menu" href="Order.php"><li>Food Menu</li></a>
            ';
          
            }
           else
           {
            echo '<a name="menu" href="Login.php"><li>Food Menu</li></a>
            ';
           }
          ?>
                <a href="AboutUs.php"><li>About Us</li></a>
                
                
            </ul>
        </div>
      
        

            <?php 
            
            require_once('connection.php');

            if(isset($_SESSION['User']))
            {
            $sql="Select Username from user where Email='".$_SESSION['User']."'";
            $result=$conn->query($sql);

            if($result->num_rows>0)
                {
                   while ($row=$result->fetch_assoc())
                    {
                       echo"<h4 class='name'>".$row["Username"]."</h4>";
                       echo"<a href='Cart.php'><i id='cart' class='fa fa-shopping-cart'></i></a>";
                    }
                
               }
            }
           else
           {
            echo '<div class="signbutton">
                <a href="Sign up.php"><button id = "sbutton" name="signup" >Sign Up</button></a>
                </div>
            ';
           }
          ?>
          
            
            <div id="Sidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="IndexPage.php">Home</a>
                <?php  
                   require_once('connection.php');

            if(isset($_SESSION['User']))
            {
            echo ' <a name="menu" href="Order.php">Food Menu</a>
            <a href="UProfile.php">My Profile</a>
                <a href="History.php">History</a>
            ';
          
            }
           else
           {
            echo '<a name="menu" href="Login.php">Food Menu</a>
            <a href="AboutUs.php">About Us</a>

            ';
           }
          ?>

               

                <?php  
                   require_once('connection.php');

            if(isset($_SESSION['User']) || isset($_SESSION['Admin']))
            {
            echo ' <a href="logout.php">Log out</a>
            ';
          
            }   
            
            ?>
            </div>

              <div id="main" ></div>
                  <a class="Options" onclick="openNav()"><i class="fas fa-bars"></i></a>
                 
             </div>
       

            

    </div>
         <div class="Headline">
         <h1><span>Awaken</span> Your <span>Taste</span> Buds <span>Today</span> </h1>
         <h2><span>MNB</span> allows you to place <span>your</span> orders <br>for <span>some </span> of the <span>best</span> meals <br> <span>Kenya</span> can offer </h2>
         <?php 
            require_once('connection.php');

            if(isset($_SESSION['User']))
            {
            echo ' <div class="Order">
                 <a href="Order.php"><button  id = "Obutton" name="Order" type="submit">Order Here</button></a>
                  </div>
            ';
          
            }
           else
           {
            echo ' <div class="Order">
                 <a href="Login.php"><button  id = "Obutton" name="Order" type="submit">Order Here</button></a>
                  </div>
            ';
           }
          ?>

         <br><br><br>
         
         <h3>Kenya's #1 Online Food Store</h3>
          <div class="Ratings">
            <a href="Comments.php"><button  id = "Rate" name="Ratings" type="submit">View Comments</button></a>
            
          </div>
          <h5>Our Specials</h5>

         <div id="content">
 
 
  <?php
   require_once('ImageUploadPage.php');
   $result = mysqli_query($conn, "SELECT * FROM items where type ='Special'");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "  <a href='#'><img src='Uploaded/".$row['image']."' ></a>";
        echo "<p class='p'>".$row['name']."</p>";
        echo "<p >KES  ".$row['price']."</p>";
       

      echo "</div>";
    }
  ?>
        
        </div>

        
        <script>
            function openNav() {
                document.getElementById("Sidebar").style.width = "230px";
                document.getElementsByClassName("Option");
              }
               
              function closeNav() {
                document.getElementById("Sidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
              }
         </script>

              <footer class="footer">
                    <p class="c">Copyright &copy; <script>document.write(new Date().getFullYear());</script></p>
                                    
                  
                  <div class="SocialLinks">
                    
                      <a class="Insta"href="https://www.instagram.com/_mwanzamba/?hl=en" target="_blank">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <a class="Facebook"href="#" style="color:#ffd93e;">
                        <i class="fab fa-facebook"></i>
                      </a>
                      <a class="Twitter"href="#">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a class="YT"href="#" target="_blank">
                        <i class="fab fa-youtube"></i>
                      </a>

              </footer>
  
                </div>

              



</div>

  
</body>
</html>