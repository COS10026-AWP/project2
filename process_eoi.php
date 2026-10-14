<?php
$config = require 'settings.php';
$db_conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("location: apply.php");
    exit();
}

?>