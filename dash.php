<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style2.css" rel="stylesheet">
    <title>Data Table</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="myScript.js"></script>
</head>
<body>
<div class="topnav">
  <a href="sign.php">Signup</a>
  <a href="login.php">Login</a>
  <a href="dash.php">Dashboard</a>
</div>
<div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        
      <form  method="POST" action="update.php" enctype="multipart/form-data" >
      <div class="modal-body">
                <input type="hidden" name="up-id" id="up-id">
               <div class="form-group col-12">
                <label>First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" >
               </div>
               <div class="form-group col-12">
                <label>Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" >
               </div>
               <div class="form-group col-12">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Id" >
               </div>
               <div class="form-group col-12">
                <label>Password</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
               </div>
               <div class="form-group col-12">
                <label>Resume</label>
                <input type="file" name="resume" id="resume"class="form-control" >
               </div>
                </div>
           
          
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- #############################   DELE MODAL   ########################### -->
<div class="modal fade" id="deldata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        
      <form  method="POST" action="delete.php" enctype="" >
      <div class="modal-body">
                <input type="hidden" name="del-id" id="del-id">
               <h3>Do you want Delete this Data</h3>
                </div>
           
          
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" name="delete" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ############################################### -->
    <h1>Display the Data</h1>
    <?php
    $conn=mysqli_connect("localhost:3306","root","");
    $db=mysqli_select_db($conn,"task");
    $sql="SELECT * FROM register";
    $query=mysqli_query($conn,$sql);
?>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>resume</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
        if ($query)
        {
        foreach($query as $row)
        {
        ?>
        <tbody>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['FirstName'];?></td>
                <td><?php echo $row['LastName'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['Password'];?></td>
                <td><a href="uploads/<?php echo $row['resume'];?>" target="_blank"><button class="btn btn-primary"> view</button></a></td>
                <td><button type="button" class="btn btn-success editbtn">Edit</button></td>
                <td><button type="button" class="btn btn-danger delbtn">Delete</button></td>
            </tr>
            
        </tbody>
        <?php    
        }
            }
        else
        {
            echo "No Record Found";
        }
        ?>
       
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        $('.delbtn').on('click',function(){
          $('#deldata').modal('show');
            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
              return $(this).text();
               }).get();
               console.log(data);
               $('#del-id').val(data[0]);
                });
      });
    </script>
    
    <script>
      $(document).ready(function(){
        $('.editbtn').on('click',function(){
          $('#editdata').modal('show');
            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
              return $(this).text();
               }).get();
               console.log(data);
               $('#up-id').val(data[0]);
               $('#fname').val(data[1]);
               $('#lname').val(data[2]);
               $('#email').val(data[3]);
               $('#pass').val(data[4]);
               $('#resume').val(data[5]);
                });
      });
    </script>

</body>
</html>