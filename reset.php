<?php
$username = filter_input(INPUT_POST, 'username');
 $email = filter_input(INPUT_POST, 'email');
 $message =filter_input(INPUT_POST, 'message');
if (!empty($username)){
if (!empty($email)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "spandan";
$dbname = "test";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "SELECT * FROM user WHERE username= '$username' and email= '$email'";
  $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)!=0) 
  {
		session_start();
     $_SESSION['auth']='true';
	 header('Location: http://localhost/test/welcome.html');
     
	} 
	else {
		echo'Invalid Username or email!';
	}
$conn->close();
}
}
else{
	echo("Email is empty");
}
}
else{
	echo("Username is empty");
}
?>