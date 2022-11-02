<?php

$conn = new mysqli("localhost","root","","first_practice");

$sql_obj = mysqli_query($conn,"select * from student");

$numofrows = mysqli_num_rows($sql_obj);

for($i=1;$i<=$numofrows;$i++){
    $row = mysqli_fetch_assoc($sql_obj);
    echo "<br>";
    print_r($row);
}

?>