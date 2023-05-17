<?php

$servername = "localhost";
$username = 'Batool';
$password = 'root2001';
$dbname = 'user_db';

$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn) {
    echo "connected Sucssefuly";
} else {
    die(" conection filed ");
}

?>