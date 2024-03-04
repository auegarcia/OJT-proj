<?php
if (!isset($_SESSION)) {
  // no session has been started yet
  session_start();
}
//$conn = mysqli_connect("us-cdbr-east-06.cleardb.net",'b2f4b986604b45','0290b9ac','heroku_fadbb188c837616');

//NEW
$con = mysqli_connect("localhost",'root','','users');


//LOCAL
//$conn = mysqli_connect("localhost","root","","caremate");

if (!$con) {
    die("Connection Failed :-".mysqli_connect_error());
}
?>
