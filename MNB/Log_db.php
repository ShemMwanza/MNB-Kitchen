<?php 

require_once('connection.php');
session_start();
    if(isset($_POST['login']))
    {
      $email=$_POST['email'];
      $password=$_POST['password'];

       if(empty($email) || empty($password))
       {
             echo '<script>alert("Fill in the blanks")</script>';
             echo '<script>location.href="Login.php"</script>';
       }
       else
       {
            $section=explode("@",$email);
            if($section[1]=="mnb.com")
              {
                $sql1="select Email,Password from admin where Email ='".$email."' and Password='".$password."'";
                $result1=mysqli_query($conn,$sql1);

                if(mysqli_fetch_assoc($result1))
                  {
 
                   $_SESSION['Admin']=$email;
                  echo '<script>alert("Successfully Logged in!")</script>';
                  echo '<script>location.href="adminPage.php"</script>';
                  }
                 else
                  {
                   echo '<script>alert("Incorrect Email or Password!")</script>';
                  echo '<script>location.href="Login.php"</script>';
                  }

             }
            

            else
             {

              $sql="select Email,Password from user where Email ='".$email."' and Password='".$password."'";
              $result=mysqli_query($conn,$sql);
              if(mysqli_fetch_assoc($result))
               {

                $_SESSION['User']=$email;
                echo '<script>alert("Successfully Logged in!")</script>';
                  echo '<script>location.href="IndexPage.php"</script>';
                  $sql1="Select userID from user where Email='".$_SESSION['User']."'";
             $result1=$conn->query($sql1);

             if($result1->num_rows>0)
              {
               while ($row=$result1->fetch_assoc())
                {
                    $_SESSION['UserID']=$row['userID'];
                }
              }
               }
               else
                {
                  echo '<script>alert("Incorrect Email or Password!")</script>';
                  echo '<script>location.href="Login.php"</script>';
               
               }
            }

            
       }
    }
    else
    {
        echo 'Not Working ';
    }
mysqli_close($conn);

  
?>
