<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="adminPage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="page">
        
      <div class="navigation-bar">

            <div id="Sidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="Page.php" target="frame">Add Item</a>
                <a href="table.php" target="frame" >View User</a>
                <a href="ViewOrders.php" target="frame" >Orders</a>
                <a href="logout.php">Log out</a>

                
            </div>

              <div id="main" ></div>
                  <a class="Options" onclick="openNav()"><i class="fas fa-bars"></i></a>

             <?php


             session_start();
             require_once('connection.php');
    $sql="Select Username from admin where Email='".$_SESSION['Admin']."'";
    $result=$conn->query($sql);

    if($result->num_rows>0)
    {
      while ($row=$result->fetch_assoc())
      {
      echo"
      <h4 class='eat'>Hey ".$row["Username"]."</h4>";
      }
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

 </div>

              
<div class="iframe">
  <iframe src="Page.php" height="800" width="1300" name="frame" ></iframe>
</div>




  
</body>
</html>