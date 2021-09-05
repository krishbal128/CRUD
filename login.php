<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Signup</title>
  </head>
  <body>
  <div class="topnav">
  <a href="sign.php">Signup</a>
  <a href="login.php">Login</a>
  <a href="dash.php">Dashboard</a>
</div>
      <br>
    <h1>Login Form</h1>
</br>
<div class="container">
    <div class="myform">
       <form  method="POST" action="#" autocomplete="off" >
           <div class ="row">
               <div class="form-group col-12">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email Id"  required>
               </div>
               <div class="form-group col-12">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
               </div>
            </div></br>
               <button type="submit" name="login" class="btn btn-primary">Login</button>
           
       </form></br>
       </div>

</div>
   

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <?php
   if(isset($_POST["login"]))
   { 
   $conn=mysqli_connect("localhost:3306","root","","task");
   mysqli_select_db($conn,"task");
   $Email=$_POST['email'];
   $Password=$_POST['pass'];
   $sql="SELECT * FROM register WHERE Email='$Email' and Password='$Password'";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)==0)
   echo "<script>alert('The email or password is Wrong');</script>";
   
   else 
   $_SESSION["email"]=$Email;
   header("Location:user.php");
}   
   
   ?>
</body>
</html>