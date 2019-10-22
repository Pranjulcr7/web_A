<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" href="css/templatemo_main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style type="text/css">
body{
  background: url(pic3.jpg) no-repeat center fixed;
  background-size: cover;

}  </style>
    </head>
        <div class="navbar">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online SmartPhone Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="login.php">Logout</a></li>
    </ul>
  </div>
</nav>
    
    </div>
    <body >
        <div style="text-align: center;font-size: 30px;font-weight: bold;color: green">
          <?php
        error_reporting(E_ERROR);
        session_start();    
        $user=$_SESSION['$name'];
                        
        ?>
        <?php
        echo "Welcome User ".$user;
        ?>  
        </div>
        
        <article>


<form class="form-horizontal templatemo-signin-form" role="form" action="" method="POST">
    <div class="form-group">
          <div class="col-md-12">
<input type="text" class="form-control" placeholder="Enter Phone name" name="model" required="">
</div>
</div>
<button type="submit" class="btn btn-lg btn-success btn-block"> SEARCH </button>
</form>

<form class="form-horizontal templatemo-signin-form" role="form" action="" method="POST">
    <div class="form-group">
          <div class="col-md-12">
<input type="text" class="form-control" placeholder="Enter phone name to reserve" name="brname" required="">
</div>
</div>
<button type="submit" class="btn btn-lg btn-danger btn-block"> RESERVE </button>
</form>

<?php

$conn = mysqli_connect("localhost","root","amiti123","smartphone");

if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
if(isset($_POST['model'])){

$MODEL = $_POST['model'];
$sql = "select brand,model,color,ram,storage,processor,price from `phone` where model LIKE '%$MODEL%' and flag='0'";

$result = mysqli_query($conn, $sql);
?>








<?php 
if(($row = mysqli_num_rows($result))!=0) {?>
  <div class="container" style="overflow-y: scroll;height:200px">
    <table class="table table-bordered" style="color: white; margin-top: 2em">
  <p style="color: white;">The available smartphones are:</p>
  <tr >

<th style="">BRAND </th>
<th>MODEL </th>
<th>COLOR </th>
<th>RAM </th>
<th>STORAGE </th>
<th>PROCESSOR </th>
<th>PRICE </th>

</tr>
<?php
while($row = mysqli_fetch_assoc($result)){ 
    ?>
<tr>

<td><?php echo $row['brand']; ?></td>

<td><?php echo $row['model']; ?></td>

<td><?php echo $row['color']; ?></td>

<td><?php echo $row['ram']; ?></td>

<td><?php echo $row['storage']; ?></td>

<td><?php echo $row['processor']; ?></td>

<td><?php echo $row['price']; ?></td>

</tr>
</div>

<?php

} }
else { ?>
    <h1 style="text-align: center;color: red">No phone found</h1>
<?php } ?>
</table>

<?php } ?>

<?php
$conn1 = mysqli_connect("localhost","root","amiti123","smartphone");

if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
if(isset($_POST['brname'])){
    $MODEL = $_POST['brname'];
    $sql2= "select * from `phone` where model='$MODEL' and flag ='0' ";
    $result2= mysqli_query($conn1,$sql2);
    $count = mysqli_num_rows($result2);
    if($count!=0){
    $sql="update `phone` SET flag='1',user_id='$user' where model='$MODEL'";
    $result = mysqli_query($conn, $sql);
    $sql1="update `user` SET itempurchased='$MODEL' where user_id='$user'";
    $result1 = mysqli_query($conn, $sql1); 
                        
                        {
             echo ("<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('Phone Reserved successfully');
                 
                 </SCRIPT>");}
           
                  }
                  else{
                      echo("<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('reservation unsuccessful');
                 
                 </SCRIPT>");
                  }

   
 

}
?>
</article>
</div>
    </body>
</html>
