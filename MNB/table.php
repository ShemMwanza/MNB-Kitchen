<!DOCTYPE html>
<html>
<head>
	<title>User Data</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<style type="text/css">
	 .H h1,h2{
	 	color:#ffffff;
	 	font-size: 30px;
	 	

	 }
	 th{

	 }
	 th, td 
	 {
	 	border:none;
        padding: 15px;
        text-align: left;
        color: #ffd93e;
    }
    .btn{
   background-color: #ffd93e;
    border-radius: 5px;
    width: 100%;
    height: 28px;
    text-align: center;
    color: #ffffff;
    border: none;
    cursor:pointer;
    }
    .search{
    top: 50px;
    width: 200px;
    height: 20px;
    position: absolute;
    margin-left: 55%;
    border-radius: 50px;
    padding: 10px;
    
}
.search-text{
    width: 200px;
    height: 20px;
    background: none;
    border: none;
    color: #ffffff;
    border-bottom: 3px solid;
    border-bottom-color: #ffd93e;
    outline: none;
    font-size: 20px;
    
    
}
::placeholder {
    color: #ffffff;
    font-size: 15px;
}
.search-btn i{
 
    top: 50px;
    height: 20px;
    width: 30px;
    color: #ffd93e;
    position: absolute;
    font-size: 25px;
    padding: 10px;
    margin-left: 72%;
    

}

	</style>
	<link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
	<form method="post" action="SearchTable.php">
	  <div class="search">
            <input class="search-text" type="text" name="id" placeholder="Search User by ID">  
                
        </div>
        
           <a class="search-btn"href="SearchTable.php">
            <i class="fas fa-search" name="search"></i>
            </a>
     </form>
  
	<div class="H">
		<h1 >Customer's Table</h1>
	</div>
	
	<table class="table">
		<tr>
			<th>Email</th>
			<th>Username</th>
			
			<th>DOB</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
		require_once('connection.php');
		$sql="Select * from user";
		$result=$conn->query($sql);
		

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{
				echo "<tr><td>".$row["Email"]."</td>
				<td>".$row["Username"]."</td>
				
				<td>".$row["DOB"]."</td>
				<td>
				<form action='EditUsers.php' method='post'>
				<a href='EditUsers.php'><button type='submit' class='btn' >Edit</button> </a>
				<input type='hidden' name='delete' value='".$row["userID"]."' >
				</form>
				</td>

				<td>
				<form action='DeleteUsers.php' method='post'>
				<input type='hidden' name='delete' value='".$row["userID"]."' >
				<button type='submit' class='btn' name='deleteBtn'>Delete</button> 
				</form>
				</td>
				

				</tr>";

			}
			echo "</table>";
		}
		else
		{
			echo"Nothing is happening";
		}
		
		?>
		</table>
		<div class="H">
		<h2>Admin's Table</h2>
		</div>
		<?php
		
		echo "<table>";
		 echo"<tr>
			<th>adminID</th>
			<th>Email</th>
			<th>Username</th>
			
			<th>Edit</th>
			<th>Delete</th>

		</tr>";
		require_once('connection.php');
		$sql="Select * from admin";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{
				echo "<tr>
				<td>".$row["adminID"]."</td>
				<td>".$row["Email"]."</td>
				<td>".$row["Username"]."</td>
				
				<td>
				<form action='EditAdmin.php' method='post'>
				<input type='hidden' name='id' class='btn' value='".$row["adminID"]."' >
				<a href='EditAdmin.php'><button type='submit'class='btn' name='deleteBtn'>Edit</button> </a>
				</form>
				</td>
				<td>
				<form action='DeleteUsers.php' method='post'>
				<input type='hidden' name='deleteAdmin' class='btn' value='".$row["adminID"]."' >
				<button type='submit' class='btn' name='AdmindeleteBtn'>Delete</button> 
				</form>
				</td>
				
				</tr>";
				
			}
			echo "</table>";
		}
		else
		{
			echo"Nothing is happening";
		}
		$conn->close();

		 ?>
	

</body>
</html>