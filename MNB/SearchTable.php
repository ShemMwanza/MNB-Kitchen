<!DOCTYPE html>
<html>
<head>
	<title>Search user</title>
	<link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
   	
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
		$id=$_POST["id"];
		$sql="Select * from user where userID='".$id."'";
		$result=$conn->query($sql);
		

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{
				echo "<tr><td>".$row["Email"]."</td>
				<td>".$row["Username"]."</td>
				
				<td>".$row["DOB"]."</td>
				<td>
				<a href='EditUsers.php'><button type='submit' class='btn' >Edit</button> </a>
				<input type='hidden' name='delete' value='".$row["userID"]."' >
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
</body>
</html>