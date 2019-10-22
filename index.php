<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/templatemo_main.css">
    </head>
    <body>
        <?php
        // put your code here
        error_reporting(E_ERROR);
        session_start();
    if (isset($_POST['UID'])) {
        $Uid = $_POST['UID'];	
       
        $Password = $_POST['password'];
        
        
        $con = mysqli_connect("localhost","root","amiti123","smartphone");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
		
		
			$query = "SELECT * FROM user WHERE user_id='$Uid' and password='$Password'";
                        $result = mysqli_query($con,$query);
                        $count = mysqli_num_rows($result);
                        if($count==1){
			 echo ("<SCRIPT LANGUAGE='JavaScript'>
  		  		 window.alert('You are logged in successfully');
				 window.location.href='homepage.php';
  				 </SCRIPT>");
       $_SESSION['UID']=$Uid;
           
                  }else{
                      echo("Invalid credenatials");
                  }
	      }
           
              else{
        ?>
          
        <form class="form-horizontal templatemo-signin-form" role="form" action="" method="POST">
        <div class="form-group">
          <div class="col-md-12">
            <label for="UID" class="col-sm-2 control-label">User Id</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="UID" placeholder="User ID" name = "UID" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
          </div>
        </div>
            <button type="submit"  name="submit" value="Register" style="text-align: center; margin-left: 20%;" >Login</button>
        </form>
        <form class="form-horizontal templatemo-signin-form" role="form" action="sign-in.php" method="POST">
          <div class="form-group" style="margin-top: -5%">
          <div class="col-md-12">
            <div class="col-sm-10">
          <button type="submit"  name="sign up" value="Register" style="margin-left: 20%;"><a href="signup.php">sign up</a></button>
          </div>
          </div>
        </div>
        </form>

        
      <?php } ?>
    </body>
    
</html>
