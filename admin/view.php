<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <style>
            img{
                width: 235px;
                height: 235px;
                display: inline-block;
                padding: 5px;
            }
            h3{
                display: inline-block;
            }
            .box{
                width: 250px;
                background-color: #7993ba;
            }
            section::before {
                background: url(low-poly-grid-haikei.svg) no-repeat center center/cover;
                position: absolute;
                top: 0;
                left: 0;
                content: "";
                z-index: -2;
                opacity: 0.9;
                width: 100vw;
                height: 100vh;
            }
            
        </style>
</head>
<body>
    
</body>
</html>

<?php

include 'navbar.php' ;


global $conn ;
$conn = new mysqli("localhost","root","","customer");

if($conn->connect_error){
    echo "Connection Failed" ;
    die ;
}

global $sql_obj ;
$sql_obj = mysqli_query($conn, "select * from products") ;

while($row = mysqli_fetch_assoc($sql_obj)){
    $name = $row['Name'] ;
    $impath = $row['Path'];
    $price = $row['Price'];
    $pid = $row['id'] ;

    echo "
    <section class='d-inline-block'> 
    <div class='d-inline-block border border-primary pd-2 m-2 shadow-lg box'> 
    <img src='$impath'><br>   
    <h3> Name: $name </h3><br>
    <h3> Price: $price </h3><br>
    <a href='delete.php?pid=$pid'> <button class='btn btn-danger bi-trash-fill m-1'></button></a>
    </div>
    </section>
    " ;
}

?>