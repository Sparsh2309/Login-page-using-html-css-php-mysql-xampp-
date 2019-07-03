<?php
$username = filter_input(INPUT_POST, 'username');
 $password = filter_input(INPUT_POST, 'password');
if (!empty($username)){
if (!empty($password)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "spandan";
$dbname = "test";
$pass ="";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

  $sql = "SELECT * FROM user WHERE username='$username' and password = '$password'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)==1) 
  {
		session_start();
     $_SESSION['auth']='true';
	 header('Location: http://localhost/test/welcome.html');
     
	} 
	else {
		echo'Invalid Username or Password!';
	}
$conn->close();
}
else{
  echo "Password should not be empty";
  die();
}
}
 else{
  echo "Username should not be empty";
  die();

}

?>