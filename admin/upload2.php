<?php

global $name ;
global $price ;
global $details ;

if( isset($_POST['product_name']) || isset($_POST['descrip']) || isset($_POST['price'])){
    $name = $_POST['product_name'] ;
    $price = $_POST['price'] ;
    $details = $_POST['descrip'] ;
}

global $conn ;
if(isset($conn)){

    if($conn->connect_error){
        echo "Connection Failed" ;
        die ;
    }
}
$conn = new mysqli("localhost","root","","customer") ;

global $filename ;
global $target_path ;
global $unique_name ;

date_default_timezone_set('Asia/Kolkata');
$unique_name = date('Y_m_d_H_i_s');

$filename = $unique_name . $_FILES['imgname']['name'] ;

$target_path = "images/" . $filename ;

if(isset($_POST['s'])){
    move_uploaded_file($_FILES['imgname']['tmp_name'] , $target_path) ;
    global $cmd ;
    $cmd = "INSERT INTO products(Name,Price,Details,Path) VALUES('$name','$price','$details','$target_path')" ;
}
global $sql_result ;
if(isset($sql_result)){

    $sql_result = mysqli_query($conn,$cmd);
}

if($conn->query($cmd) == TRUE){
    echo "Product uploaded successfully" ;
    echo "<a href='upload.html'> Go Back </a>" ;
}
else{
    echo "Product upload failed. Query = $cmd " ;
}

?>