<?php
$config = require 'settings.php';
$db_conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("location: apply.php");
    exit();
}

$table_sql = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(6) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    surname VARCHAR(20) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state VARCHAR(3) NOT NULL,
    postcode VARCHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    number VARCHAR(12) NOT NULL,
    skills TEXT NOT NULL,
    other TEXT,
    status ENUM('New', 'Current', 'Final') NOT NULL DEFAULT 'New'
);"

?>