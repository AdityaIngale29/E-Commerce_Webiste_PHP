<?php
// mysqki(host_name,username,password,database_name);
$conn = new mysqli("localhost","root","","first_practice");

if($conn->connect_error){        // $conn->connect_error this checks connection error.
    echo "Connection Failed";
}

else{
    echo "DB connection success";
}
// with the help of below statement, one can change data in sql from php file.
mysqli_query($conn,"insert into student(name) values('php') "); 

//  if database is not mentioned then do this.
// mysqli_query($conn, "insert into first_practice.student(name) values('php written') ");



?>