<?php

$conn = new mysqli("localhost","root","","customer");

if($conn->connect_error){
    echo "connection failed" ;
    die;
}

?>