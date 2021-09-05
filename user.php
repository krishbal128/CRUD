<?php
session_start();
if($_SESSION["email"]){
echo '<p>'."Welcome ".$_SESSION["email"].'</p>';
}else{
    header("Location:login.php");
}

?>
<html>
<head>
<title>User Page</title>
<style>
    body{
    background:url(back.jpg);
    background-attachment: fixed;
    background-size: cover;
    }
    h1{
        color:red;
        font-family: 'Times New Roman', Times, serif;
        font-weight: 300;
        text-align: center;
    }
    p{
        color:blue;
        font-size:50px;
    }
    button{
     position:absolute;
     top:20px;
     right:10;   
    color: #f2f2f2;
    padding: 10px 10px;
    text-decoration: none;
    font-size: 15px;
    background:white;
    border-radius:5px;
    }
</style>
</head>
<body >
    <h1>Have a Nice Day</h1>
    <button><a href="logout.php">Log out</a></button>
</body>
</html>