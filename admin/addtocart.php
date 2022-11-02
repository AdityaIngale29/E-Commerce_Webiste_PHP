<?php 
session_start() ;

global $client_id ;
global $prod_id ;

$client_id = $_SESSION['client_id'] ;
$prod_id = $_GET['pid'] ;

global $conn ;

$conn = new mysqli("localhost","root","","customer") ;

if($conn -> connect_error){
    echo "Connection Failed" ;
    die ;
}

global $cmd1 ;
$cmd1 = "INSERT INTO cart(Product_ID, Client_ID) VALUES('$prod_id','$client_id')" ;
$sql_obj = mysqli_query($conn,$cmd1) ;

if($sql_obj){
    header('location:Main.php') ;
}
else{
    echo "Error occured during uploading data" ;
}

?>