<?php 

global $pid ;
$pid = $_GET['pid'] ;

global $conn ;
$conn = new mysqli("localhost","root","","customer") ;

if($conn->connect_error){
    echo "Connection failed" ;
    die ;
}

global $cmd ;
$cmd = "delete from products where id=$pid " ;
$sql_result = mysqli_query($conn,$cmd) ;

if($sql_result){
    header('location:view.php') ;
}
else{
    echo "Error while deleting" ;
}

?>