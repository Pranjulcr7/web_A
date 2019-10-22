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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style type="text/css">
body{
  background: url(pic3.jpg) no-repeat center fixed;
  background-size: cover;

}  </style>
    </head>

    <body>
        <?php
        // put your code here
        error_reporting(E_ERROR);
        session_start();
    if (isset($_POST['UID'])) {
        $Uid = $_POST['UID'];	
       
        $Password = $_POST['password'];
        
        
        $con = mysqli_connect("localhost","root","1234","smartphone");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
		
		
			$query = "SELECT * FROM user WHERE user_id='$Uid' and password='$Password'";
      $sql = "select name from user where user_id='$Uid'";
      $result1 = mysqli_query($con,$sql);
      $row=mysqli_fetch_assoc($result1);
      $name=$row['name'];
      printf("Number of row in the table : " . $name);
      $result = mysqli_query($con,$query);
      $count = mysqli_num_rows($result);
                        if($count==1){
			 echo ("<SCRIPT LANGUAGE='JavaScript'>
  		  		 window.alert('You are logged in successfully');
				 window.location.href='homepage.php';
  				 </SCRIPT>");
       $_SESSION['$name']=$name;

           
                  }else{
                      echo("Invalid credenatials");
                  }
	      }
           
              else{
        ?>
     <div id="main-wrapper">
    <div class="navbar">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online SmartPhone Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="signup.php">Sign Up</a></li>
    </ul>
  </div>
</nav>
    
    </div>


    <div class="container-fluid" style="margin-top: 10%">
      <form class="form-horizontal templatemo-signin-form" role="form" action="" method="POST" style="color: orange">
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
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
          </div>
        </div>
            
          <button type="submit" class="btn btn-lg btn-success btn-block"  name="submit" value="Register" >Login</button>
      
    </div>

        
          
      <?php } ?>
    </body>
    
</html>
