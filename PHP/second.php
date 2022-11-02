<?php

if( !isset($_GET['age']) )
{
    echo "<h1>Age query params is missing</h1>";
}
else
{
    $age=$_GET['age'];

    if($age>=18)
    {
        echo "<h1 style='color:green'> Major </h1>";
    }
    else
    {
        echo "<h1 style='color:blue'> Minor </h1>";
    }
}

?>