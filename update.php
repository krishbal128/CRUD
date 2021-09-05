<?php  
    $conn=mysqli_connect("localhost:3306","root","","task");
    $db=mysqli_select_db($conn,"task");
    if(isset($_POST["update"]))
    {
        $id=$_POST['up-id'];
   $FirstName=$_POST['fname'];
   $LastName=$_POST['lname'];
   $Email=$_POST['email'];
   $Password=$_POST['pass'];
   $data=rand(1000,10000)."-".$_FILES["resume"]["name"];
   $tname=$_FILES["resume"]["tmp_name"];
   $uploads_dir ='uploads/';
   move_uploaded_file($tname,$uploads_dir.'/'.$data);
   $sql="UPDATE register SET FirstName='$FirstName', LastName='$LastName', Email='$Email', Password='$Password', resume='$data'  where id='$id'";
   $query=mysqli_query($conn,$sql);
   
    if($query)
    {
       
        header("Location:dash.php");
    }
    else{
        echo '<script>alert("not data update")</script>';
        header("Location:dash.php");
    }
}
    