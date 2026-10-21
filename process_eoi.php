<?php
$config = require 'settings.php';
$dconn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("location: apply.php");
    exit();
}

$table"CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(6),
    first_name VARCHAR(20),
    surname VARCHAR(20),
    dob VARCHAR(10),
    gender VARCHAR(10),
    street VARCHAR(40),
    suburb VARCHAR(40),
    state VARCHAR(3),
    postcode VARCHAR(4),
    email VARCHAR(100),
    phone VARCHAR(12),
    skills TEXT,
    other TEXT,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);"

if (!mysqli_query($conn, $table_sql)) {
    die("<p>Error creating table: " . mysqli_error($conn) . "</p>");
}

function clean($data, $conn) {
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($data ?? '')));
}

// collects info
$ref  = clean($_POST['reference'], $conn);
$fname = clean($_POST['first_name'], $conn);
$surname = clean($_POST['surname'], $conn);
$dob   = clean($_POST['dob'], $conn);
$gender = clean($_POST['gender'], $conn);
$street = clean($_POST['street'], $conn);
$suburb = clean($_POST['suburb'], $conn);
$state = clean($_POST['state'], $conn);
$post  = clean($_POST['postcode'], $conn);
$email = clean($_POST['email'], $conn);
$phone = clean($_POST['phone'], $conn);
$other = clean($_POST['other'], $conn);
?>