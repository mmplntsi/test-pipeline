<?php


echo "Hello World!";

$a = $_GET['a'];
$sql = "$a";
mysqli_query($conn, $sql);
