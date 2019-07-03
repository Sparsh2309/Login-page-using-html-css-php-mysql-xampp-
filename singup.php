<?php

$username = filter_input(INPUT_POST, 'username');
$email =filter_input(INPUT_POST,'email');
 $password = filter_input(INPUT_POST, 'password');
 $password2 =filter_input(INPUT_POST, 'password2');
if (!empty($username)){
if (!empty($email)){
if (!empty($password)){
if (!empty($password2)){
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
if($password!=$password2)
  {
	  echo "password not match";
  }
else{
$sql = "INSERT INTO user (username, email, password, password2)
  values ('$username','$email','$password','$password2')";
}
  if ($conn->query($sql)){
    echo "New record is inserted sucessfully";	
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  
  $conn->close();
}
else
{
  echo "password should not be empty";
  die();
}
}
else
{
  echo "email should not be empty";
  die();
}
 }
 else
 {
  echo "Username should not be empty";
  die();
 }
}

 ?>