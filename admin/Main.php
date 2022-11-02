<?php

session_start() ;

if(!isset($_SESSION['client_id'])){
    echo "Unauthorised Access <br>" ;
    echo "Login First <a href='login_1.php' color='red'> Log-In </a>" ;
    die ;
}

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
            width: 111px;
            height: 40px;
            margin: 3px;
            padding: 4px;
        }

        .container {
            width: 256px;
            height: 423px;
            background-color: #d9d8d8; /* #dfdfdf #d9d8d8 */ 
        }

        .navbar_1{
            margin-right: 30px;
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
                height: 100%;
         }
        .marg{
            margin-left: 900px ;
         }
         .marg1{
            margin-left: 1020px ;
         }

        .wid{
            width: 1500px ;
         }
         .hov{
            display: none ;
         }
         .hov:hover{
            display: inline-block ;
         }
         .stick-to-cart{
            position: absolute ;
            top: 22px ;
            left: 335px ;
            z-index: 10 ;
            background-color: tomato ;
            padding: 2px ;
        }
    </style>

</head>

<body>
    <div>
        <nav class="navbar navbar-dark b-dark ms-2 navbar_1 me-6">
            <span class="stick-to-cart rounded-circle"> 
                <?php
                        if(!isset($_SESSION['cart_count'])){
                            $_SESSION['cart_count'] = 0 ;
                            echo $_SESSION['cart_count'] ;
                        }

                        else{
                            echo $_SESSION['cart_count'] ;
                        }
                ?>
            </span>
            <ul class="d-flex list-unstyled box justify-content-space-evenly align-content-center p-3 navbar-dark wid">
                <li class="text-align-center align-self-center ms-3 me-2">
                    <a href="Main.php" class="text-decoration-none align-self-center text-white"> Home </a>
                </li>
                <li class="ms-2 me-2 lis align-self-center">
                    <a href="about_us.html" class="text-decoration-none align-self-center text-white"> About Us </a>
                </li>
                <li class="ms-2 me-2 lis_1 align-self-center">
                <a href="contact_us.html" class="text-decoration-none align-self-center text-white">Contact Us </a>
                </li>
                <li class="ms-2 me-2 lis_2 align-self-center">
                <a href="viewcart.php" class="text-decoration-none align-self-center text-white">View Cart </a>
                </li>
                <li class="marg1 ">
                        <a href="logout.php">
                        <form action="logout.php">
                            <input type="submit" name="sub1" value="Logout" class="btn btn-danger">
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <h3 class="ms-3">
        <?php echo '&nbsp;' ;
                                      echo $_SESSION['client_firstname']  ;
                                      echo '&nbsp;' ;
                                      echo $_SESSION['client_lastname']  ;
                         ?>
        </h1>
        <h1 class="ms-4">Products</h1>
    </div>
</body>

</html>

<?php

global $client_name ;

$client_name = $_SESSION['client_firstname'] ;

global $conn;
$conn = new mysqli("localhost", "root", "", "customer");

if ($conn->connect_error) {
    echo "Connection Failed";
    die;
}

global $sql_obj;
$sql_res = mysqli_query($conn, "select * from products");

global $row;
while ($row = mysqli_fetch_assoc($sql_res)) {
    $name = $row['Name'];
    $price = $row['Price'];
    $impath = $row['Path'];
    $pid = $row['id'];

    echo "
    <section class='d-inline-block'> 
    <div class='d-inline-block border border-primary pd-2 m-2 container shadow-lg'> 
    <img src='$impath' class='img_1'><br>   
    <h3 class='mt-1'> Name: $name </h3><br>
    <h3> Price: $price </h3><br>
    <a href='addtocart.php?pid=$pid' class='text-decoration-none'>
    <button class='btn btn-success but'>Add to Cart</button>
    </a>
    </div>
    </section>
    ";
}

?>