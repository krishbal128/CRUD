<?php  
    $conn=mysqli_connect("localhost:3306","root","","task");
    $db=mysqli_select_db($conn,"task");
    if(isset($_POST["delete"]))
    {
        $id=$_POST['del-id'];
   $sql="DELETE FROM register where id='$id'";
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
    