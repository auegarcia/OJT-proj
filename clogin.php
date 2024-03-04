<?php
session_start();
$username = ($_POST['username']);
$password = ($_POST['password']);
$db_name = "users";
$db_username = "root";
$db_pass = "";
$db_host = "localhost";
$con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") 
or die(mysqli_error()); 
$query = "SELECT * from users WHERE username='$username'";
$results = mysqli_query($con, $query); 
$exists = mysqli_num_rows($results); 

$table_users = "";
$table_password = "";
if($results != "") 
{
    while($row = mysqli_fetch_assoc($results)) 
    {
        $table_users = $row['username']; 
        $table_password = $row['password']; 
    }
    if(($email == $table_users) && ($password == $table_password)) 
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