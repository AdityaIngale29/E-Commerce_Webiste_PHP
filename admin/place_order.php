<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        .box {
            background-color: black;
            color: white;
            border-radius: 40px;
        }

        .img_1 {
            width: 230px;
            height: 230px;
            margin-top: 4px;
        }

        .but {
            width: 147px;
            height: 40px;
            margin: 3px;
            padding: 4px;
        }

        .container {
            background-color: #d9d8d8; /* #dfdfdf #d9d8d8 */ 
        }

        .navbar_1{
            margin-right: 30px;
            width: 500px ;
        }
        section::before {
                background: url(wave-haikei.svg) no-repeat center center/cover;
                position: absolute;
                top: 0;
                left: 0;
                content: "";
                z-index: -2;
                opacity: 0.8;
                width: 100%;
                height: 100%;
         }
         
        .marg{
            margin-left: 460px ;
            margin-top: 50px ;
         }
         .marg1{
            margin-top: 150px ;
            padding: 10px ;
         }

        .wid{
            width: 400px ;
         }
         .hov{
            display: none ;
         }
         .hov:hover{
            display: inline-block ;
         }

        .box1{
            width: 65% ;
        }
        .box2{
            width: 30% ;
        }
        .wid1{
            width: 1500px ;
        }
        .sum1{
            position: relative ;
            bottom: 210px ;
            padding: 10px ;
        }
    </style>
</head>
<body>
<div>
    <nav class="navbar navbar-dark b-dark ms-2 navbar_1 me-6 wid1">
            <ul class="d-flex list-unstyled box justify-content-space-evenly align-content-center p-3 navbar-dark wid1">
                <li class="text-align-center align-self-center ms-3 me-2">
                    <a href="Main.php" class="text-decoration-none align-self-center text-white"> Home </a>
                </li>
            </ul>
        </nav>
    </div>
    <section>
    <div class='d-flex justify-content-center align-items-center'>
    <h1 class='align-items-center marg1 text-center text-white'>
        Your order has been placed <br>
        Thank You for Shopping
    </h1>
    </div>
    </section>
</body>
</html>

<?php

session_start() ;

global $conn ;
$conn = new mysqli("localhost","root","","customer") ;
if($conn -> connect_error){
    echo "Connection Failed" ;
    die ;
}

$cmd = "SELECT * FROM cart" ;
$sql_obj = mysqli_query($conn,$cmd) ;

while( $row = mysqli_fetch_assoc($sql_obj) ){
    $cart_id = $row['ID'] ;
    $prod_id = $row['Product_ID'] ;
    $clnt_id = $row['Client_ID'] ;
    if($cart_id>$_SESSION['cart_id']){
        $cmd1 = "INSERT INTO orders(Product_ID,Client_ID) VALUES('$prod_id','$clnt_id')" ;
        $select = mysqli_query($conn,$cmd1) ;
    }
} 


unset($_SESSION['cart_count']) ;
unset($_SESSION['cmd']) ;

?>