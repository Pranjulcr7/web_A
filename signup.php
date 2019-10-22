<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sign Up Page</title>
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
    error_reporting(E_ERROR);

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $ID = $_POST['UID'];
            $PASSWORD = $_POST['password'];
            $NAME = $_POST['name'];
            $SEX = $_POST['sex'];
            $PHONE = $_POST['phoneno'];
            $ADDRESS = $_POST['address'];
            $EMAIL = $_POST['email_id'];

            $con = mysqli_connect("localhost","root","amiti123","smartphone");
                       
        }
      $query = "INSERT INTO user (user_id, password, name, sex, phoneno, shippingaddress, emailid) VALUES ('$ID', '$PASSWORD', '$NAME', '$SEX', '$PHONE', '$ADDRESS', '$EMAIL')";
                        $result = mysqli_query($con,$query);
                        if($result){
       echo ("<SCRIPT LANGUAGE='JavaScript'>
             window.alert('You are registered successfully');
         window.location.href='login.php';
           </SCRIPT>");
                  }
        ?>


  
  <div id="main-wrapper">
    <div class="navbar">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online SmartPhone Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="login.php">login</a></li>
    </ul>
  </div>
</nav>
    
    </div>
    <div class="template-page-wrapper" style="color:orange">
      <form class="form-horizontal templatemo-signin-form" role="form" action="" method="POST">
        <div class="form-group">
          <div class="col-md-12">
            <label for="UID" class="col-sm-2 control-label">User Id</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="UID" placeholder="User ID" name = "UID">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
          </div>
        </div>
          <div class="form-group">
          <div class="col-md-12">
            <label for="Department" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" placeholder="Full Name" name ="name">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="Department" class="col-sm-2 control-label">Sex</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sex" placeholder="sex" name ="sex">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="Phone Number" class="col-sm-2 control-label">PhoneNo:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="phoneno" placeholder="Phone Number" name="phoneno">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email_id" placeholder="Email Id" name="email_id">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Sign up" class="btn btn-lg btn-danger btn-block">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>