<?php
$usn = $_GET['username'];
$psw = $_GET['passw'];

$conn = new mysqli("localhost","root","","company");

if($conn->connect_error){
    echo "Connection Failed" . $conn->connect_error;
}

else{
    echo "Connection Successful";
}

$newrow = "insert into accounts(Username, User_Password) values('$usn','$psw')";

mysqli_query($conn,$newrow);

header("location:register.html");

?>