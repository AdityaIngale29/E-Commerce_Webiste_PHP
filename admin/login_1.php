<?php

session_start() ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <style>
        .box {
            border-radius: 40px;
        }
        section::before{
            background: url('5.jpg') no-repeat center center/cover;
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.7;
            z-index: -1;
        }
    </style>
</head>

<body>
        <section>
        <br><br><br>
        <div class="container m-2">
            <h2>Log In</h2><br>
            <form action="login.php" method="POST">
                    <div class="col-md-4">
                    <input type="email" name="mail" placeholder="Email_ID" class="form-control box"><br>
                    </div>
                    <div class="col-md-4">
                    <input type="password" name="psw" placeholder="Password" class="form-control box">
                    </div>
                    <input name = "submit_form" type="submit" value="Log-In" class="btn btn-success position-relative mt-3">
            </form>
            <p class="mt-3">Not yet Registered? <a href="Register.html">Create an Account</a></p>
        </div>
        </section>
</body>

</html>