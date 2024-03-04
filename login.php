<?php
include ('dbcon.php');


if($_SERVER["REQUEST_METHOD"]=="POST")
{
 $username=$_POST["username"];	
 $password=$_POST["password"];
 
 $sql="select * from users where username= '". $username."' AND password= '". $password."' ";
 
 $result=mysqli_query($data,$sql);
 
 $row=mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
<title> Login Form </title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100" >
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-secondary text-white">
					<h2>Login Form</h2>
				</div>
				<div class="card-body">
				<form action="clogin.php" method="POST">
					<div class="form-group">
					<label for=""> Username</label>
					<input type="text" id="username" class="form-control" name="username" required/>
					</div>
					<div class="form-group">
					<label for=""> Password</label>
					<input type="password" id="password" class="form-control" name="password" required/>
					</div>
					<input type="submit" class="btn btn-secondary w-100" value="Login" name="">
					</br>
					</br>
					<a href="register.php" >Reigster</a>
					</br>			
					<a href="home.php" >Return to Home page</a>
				</form>
				</div>
			</div>
		</div>
	</div>
</body> 
</html>