<?php

session_start();

global $em ;
global $psw ;

if(isset($_POST['submit_form'])){
    $em = $_POST['mail'];
    $psw = $_POST['psw'];
}

$conn = new mysqli("localhost","root","","customer");

if($conn->connect_error){
    echo "Connection failed";
    die ;
}

$cmd1 = "SELECT * FROM cart ORDER BY ID DESC LIMIT 1" ;
$sql_obj1 = mysqli_query($conn,$cmd1) ;
$row1 = mysqli_fetch_assoc($sql_obj1) ;

$cmd = "SELECT * FROM log_in_data WHERE Email='$em' AND User_Password='$psw' limit 1" ;
$sql_obj = mysqli_query($conn,$cmd) ;
$row = mysqli_fetch_assoc($sql_obj) ;
$total_rows = $sql_obj -> num_rows ;

if($total_rows==1){
    $_SESSION['cart_id'] = $row1['ID'] ;

    $_SESSION['client_id'] = $row['id'] ;
    $_SESSION['client_firstname'] = $row['First_Name'] ;
    $_SESSION['client_lastname'] = $row['Last_Name'] ;
    header('location:Main.php') ; 
}

else{
    echo "<h2> Invalid Credentials </h2>" ;
    echo "<a href='login_1.php'> Try again </a> " ;
} 

?>