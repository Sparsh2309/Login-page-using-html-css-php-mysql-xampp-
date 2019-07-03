<?php
$password = filter_input(INPUT_POST, 'password');
 $password2 = filter_input(INPUT_POST, 'password2');
if (!empty($password)){
if (!empty($password2)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "spandan";
$dbname = "test";
$pass ="";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

  $sql = "INSERT INTO user (password,password2) VALUES ('$password','$password2')";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)==1) 
  {
		session_start();
     $_SESSION['auth']='true'; 
	 header('Location: http://localhost/test/login page.html');
     
	} 
	else {
		echo'Invalid Password!';
	}
$conn->close();
}
else{
  echo "Password2 should not be empty";
  die();
}
}
 else{
  echo "Password should not be empty";
  die();

}

?>