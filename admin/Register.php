<?php

session_start() ;

global $fname ;
global $lname ;
global $email ;
global $psw ;

if(isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['email']) || isset($_POST['passw']) || isset($_POST['mobile'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $mb = $_POST['mobile'] ;
    $psw = $_POST['passw'];
}

$conn = new mysqli("localhost","root","","customer");

if($conn -> connect_error){
    echo "connection failed" ;
    die;
}


$newrow = "INSERT INTO log_in_data(First_Name,Last_Name,Email,Mobile_Number,User_Password) VALUES('$fname','$lname','$email','$mb','$psw')" ;

$select = mysqli_query($conn, "SELECT * FROM log_in_data WHERE Email = '".$_POST['email']."'") ;

if(mysqli_num_rows($select)){
    exit("Email already exists.<a href='Register.html'> Try again </a>") ;
  
}

$result = mysqli_query($conn,$newrow);

header('location:login_1.php');

?>