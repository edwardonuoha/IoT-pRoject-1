<?php
$username = "root";
$pass = "";
$host = "localhost";
$db_name = "esp32";
$con = mysqli_connect ($host, $username, $pass);
$db = mysqli_select_db ( $con, $db_name );
?>