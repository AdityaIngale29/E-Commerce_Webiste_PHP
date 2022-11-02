<?php

session_start() ;

?>

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
            padding: 10px ;
        }

        .navbar_1{
            margin-right: 30px;
            width: 500px ;
        }
        section::before {
                background: url(pexels.jpg) no-repeat center center/cover;
                position: absolute;
                top: 0;
                left: 0;
                content: "";
                z-index: -2;
                opacity: 0.8;
                width: 100%;
                height: 200%;
         }
         
        .marg{
            margin-left: 1060px ;
            margin-top: 50px ;
         }
         .marg1{
            margin-left: 1020px ;
         }

        .wid{
            width: 400px ;
         }
         .wid1{
            width: 500px
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
            position: absolute ;
            width: 400px ;
            top: 87px ;
            left: 1050px ;
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
</body>
</html>

<?php

global $conn ;
$conn = new mysqli("localhost","root","","customer") ;

if($conn -> connect_error){
    echo "Connection Failed" ;
    die ;
}
global $cmd1 ;
$cmd1 = "SELECT cart.*, products.* FROM cart LEFT JOIN products ON cart.Product_ID = products.id" ;

$sql_res = mysqli_query($conn,$cmd1) ;

global $total_price ;
global $cart_count ;
$cart_count = 0 ;
$_SESSION['cart_count'] = $cart_count ;

echo "<section> </section>" ;

while($row1 = mysqli_fetch_assoc($sql_res)){
    $cart_id = $row1['ID'] ;
    $name = $row1['Name'] ;
    $price = $row1['Price'] ;
    $impath = $row1['Path'] ;
    $pid = $row1['id'] ;
    if($cart_id>$_SESSION['cart_id']){
        $total_price += $price ;
        $cart_count++ ;
        $_SESSION['cart_count'] = $cart_count ;
        if($cart_count<4){
        echo "
            <div class='d-inline-block'>
            <div class='ms-3 me-3 d-inline-block'>
                <div class='d-inline-block border border-primary pd-2 m-2 shadow-lg d-inline-block container'> 
                <img src='$impath' class='img_1'><br>   
                <h3 class='mt-1'> Name: $name </h3><br>
                <h3> Price: $price </h3><br>
                <a href='delete_from_cart.php?pid=$pid' class='text-decoration-none'>
                <button class='btn btn-danger but'>Remove From Cart</button>
                </a>
                </div> 
            </div>
            </div>
        " ;
        }

        // Since we have only uploaded 5 products, the code is been hardcoded 

        elseif($cart_count==4){
        echo "
            <br>
            <div class='d-inline-block'>
            <div class='ms-3 me-3 d-inline-block'>
                <div class='d-inline-block border border-primary pd-2 m-2 shadow-lg d-inline-block container'> 
                <img src='$impath' class='img_1'><br>   
                <h3 class='mt-1'> Name: $name </h3><br>
                <h3> Price: $price </h3><br>
                <a href='delete_from_cart.php?pid=$pid' class='text-decoration-none'>
                <button class='btn btn-danger but'>Remove From Cart</button>
                </a>
                </div> 
            </div>
            </div>
        " ;
        }

        elseif($cart_count==5){
            echo "
                <br>
                <div class='d-inline-block'>
                <div class='ms-3 me-3 d-inline-block'>
                    <div class='d-inline-block border border-primary pd-2 m-2 shadow-lg d-inline-block container'> 
                    <img src='$impath' class='img_1'><br>   
                    <h3 class='mt-1'> Name: $name </h3><br>
                    <h3> Price: $price </h3><br>
                    <a href='delete_from_cart.php?pid=$pid' class='text-decoration-none'>
                    <button class='btn btn-danger but'>Remove From Cart</button>
                    </a>
                    </div> 
                </div>
                </div>
            " ;
            }
    }
}
echo "
<div class='sum1 d-inline-block '>
<div class='d-inline-block border border-dark container shadow-lg float-right'>
                <h2>Summary</h2>
                Sub Total : $total_price <br>
                Discount : 0 <br>
                Shipping Charges : 0 <br>
                Total : $total_price <br>
                <form action='place_order.php'>
                <input type='submit' value='Place Order' class='btn btn-success mt-3'>
                </form>
</div>
</div>
            " ;


?>