<!DOCTYPE html>
<html>
<head>
	<title>User comments</title>
	<link rel="stylesheet" type="text/css" href="Comments.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="top">
		<h1>Comments</h1>
	<a class="close"href="IndexPage.php">
            <i class="fas fa-times"></i>
            </a>
	</div>
	
	<?php 
	echo "<table>";
		 echo"<tr>
			<th>User</th>
			<th>Comment</th>
			
			

		</tr>";
	    session_start();
		require_once('connection.php');
		$sql="SELECT user.Username, comments.comment FROM user LEFT JOIN comments ON user.userID = comments.userID WHERE user.userID=comments.userID ORDER BY user.userID";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{

				echo "<tr>
				
				<td name='name'>".$row["Username"]."</td>
				<td name='price'> ".$row["comment"]."</td>
	
				</tr>";  
				
	
			}
			echo "</table>";
		}
		else
		{
			echo"<p>*No user has commented yet*</p>";
		}
		$conn->close();

		 
	echo"</table>";

	 ?>
	 <form method="post" action="DeleteUsers.php">
	 <div class="secondbox">
	 
        <img src="Images/logo.png" alt="">
	 	 <textarea  id="text" cols="36" rows="3" name="comment" placeholder="Comment here"></textarea>
	 	 <br><br>
	 	 <button name="commentbtn" type="submit" >Submit</button>
                
	 </div>

</form>

</body>
</html>