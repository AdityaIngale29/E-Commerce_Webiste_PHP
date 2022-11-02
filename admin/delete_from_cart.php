<?php

global $pid ;
$pid = $_GET['pid'] ;

global $conn ;
$conn = new mysqli("localhost","root","","customer") ;

if($conn -> connect_error){
    echo "Connection Failed" ;
    die ;
}

$cmd = "DELETE FROM cart WHERE Product_ID=$pid" ;
$sql_obj = mysqli_query($conn,$cmd) ;

if( $sql_obj ){
    header('location:viewcart.php') ;
}

else{
    echo "Error while removing from cart" ;
}

?>