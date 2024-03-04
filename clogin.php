<?php
session_start();
include ('dbcon.php');

$username = ($_POST['username']);
$password = ($_POST['password']);

$query = "SELECT * from users WHERE username='$username'";
$results = mysqli_query($con, $query); 
$exists = mysqli_num_rows($results); 

$table_username = "";
$table_password = "";
if($results != "") 
{
    while($row = mysqli_fetch_assoc($results)) 
    {
        $table_username = $row['username']; 
        $table_password = $row['password']; 
    }
    if(($email == $table_username) && ($password == $table_password)) 
    {
        if($password == $table_password)
        {
        $_SESSION['user'] = $username; 
        Print '<script>alert("Successfully Logged In!");</script>'; 
        header("location: home.php"); 
        }
    }
    else
    {
        Print '<script>alert("Incorrect Password!");</script>'; 
        Print '<script>window.location.assign("login.php");</script>'; 
    }
}
else {
    Print '<script>alert("Incorrect Username!");</script>'; 
    Print '<script>window.location.assign("login.php");</script>'; 
    }
?>