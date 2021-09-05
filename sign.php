
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
    <h1>Signup Form</h1>
</br>
<div class="container">
    <div class="myform">
       <form  name=lg onsubmit="return validaterss()" method="POST" action="sign.php" enctype="multipart/form-data" >
           <div class ="row">
               <div class="form-group col-12">
                <label>First Name</label>
                <input type="text" name="fname" autocomplete="nope" class="form-control" placeholder="First Name" required>
               </div>
               <div class="form-group col-12">
                <label>Last Name</label>
                <input type="text" name="lname" autocomplete="nope" class="form-control" placeholder="Last Name"  required>
               </div>
               <div class="form-group col-12">
                <label>Email</label>
                <input type="email" name="email"  class="form-control" placeholder="Email Id"  required>
               </div>
               <div class="form-group col-12">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
               </div>
               <div class="form-group col-12">
                <label>Resume</label>
                <input type="file" name="resume" class="form-control" required>
               </div>
               
           </div></br>
           <button type="submit" name="submit" class="btn btn-primary">Submit</button>
           
       </form>
       </div>

</div>
   

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
function validaterss() {
    var em=document.lg.email.value;
    var atpos=em.indexOf("@");
    var dotpos=em.lastIndexOf(".");
    if(atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length)
     {
        alert("Please enter the correct format email ");
        return false; 
     }
}

</script>
  <?php
   if(isset($_POST["submit"]))
   {
     
   $conn=mysqli_connect("localhost:3306","root","","task");
   mysqli_select_db($conn,"task");
   $FirstName=$_POST['fname'];
   $LastName=$_POST['lname'];
   $Email=$_POST['email'];
   $Password=$_POST['pass'];
   $data=rand(1000,10000)."-".$_FILES["resume"]["name"];
   $tname=$_FILES["resume"]["tmp_name"];
   $uploads_dir ='uploads/';
   move_uploaded_file($tname,$uploads_dir.'/'.$data);
   $exist=mysqli_query($conn,"SELECT * FROM register WHERE Email='$Email'");
   if(mysqli_num_rows($exist)>0)
   {
     echo '<script>alert("The email id already exist");</script>';
   }
   else{
   $sql="INSERT INTO register(FirstName,LastName,Email,Password,resume) values('$FirstName','$LastName','$Email','$Password','$data')";
   $query=mysqli_query($conn,$sql);
   if($query)
   {
    echo '<script type="text/javascript">'; 
    echo 'alert("Data Registered Successfully");'; 
    echo 'window.location.href = "dash.php";';
    echo '</script>'; 
   }
   else{
    echo '<script>alert("Data registered Failed");</script>';
   }
   }
  }
   ?>
  </body>
</html>