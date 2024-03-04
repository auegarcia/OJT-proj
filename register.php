<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = ($_POST['username']);
$password = ($_POST['password']);
echo "Username entered is: " . $username. "<br/>";
echo "Password entered is: " . $password;
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = ($_POST['username']);
$password = ($_POST['password']);
$usertype = "user";
$bool = true;

$dbName = "users";
$dbUser = "root";
$dbPass = "";
$dbHost = "localhost";

$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
$query = "SELECT * from users";
$results = mysqli_query($con, $query); //Query the users table
while($row = mysqli_fetch_array($results)) //display all rows from query
{
$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
if($username == $table_users) // checks if there are any matching fields
{
$bool = false; // sets bool to false
Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
Print '<script>window.location.assign("register.php");</script>'; // redirects toregister.php
}
}
if($bool) // checks if bool is true
{
mysqli_query($con, "INSERT INTO users (username, password) VALUES
('$username','$password')"); //Inserts the value to table users
Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
}
}
?>
<html>
 <head>
  <style>

 </style>
 <title>My Online Store</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 </head>
 <body>
<div class="container vh-100">
		<div class="row justify-content-center h-100" >
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-secondary text-white">
				<h2>DXC Intern Registration Page</h2>
				</div>
				<div class="card-body">
				<form action="register.php" method="POST">
				<table>
					<div class="form-group">
					<label> Enter Username</label>
					<input type="text" name="username" class="form-control" required="required" />
					</div>
					<div class="form-group">
					<label > Enter Password</label>
					<input type="password" name="password" class="form-control" required="required" />
					</div>

					<input type="submit" class="btn btn-secondary w-100" value="Register" >
					</br>
					</br>
					<a href="login.php" >Have an Account? Login Here!</a>
				</table>
				</form>
			</div>
		</div>
	</div>
 </body>
</html>
