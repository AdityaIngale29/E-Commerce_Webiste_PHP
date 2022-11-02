<?php
// defined variables
$name = $_GET['name'];
$age = $_GET['age'];
$total = $_GET['total'];
$gender = $_GET['gender'];

echo "The recieved data is Name: $name, Age: $age, Total Percentage: $total, Gender: $gender";

// linking database in sql with php file.
$conn = new mysqli("localhost","root","","first_practice");

// add the data obtained from the form submitted by the user
$cmd = "insert into student(name,age,total,gender) values('$name','$age','$total','$gender')";

echo "New data added is $cmd";

// adding the new data with the database file.
mysqli_query($conn,$cmd);

header('location:full_stack.html');
?>