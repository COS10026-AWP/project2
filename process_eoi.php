<head><link rel="stylesheet" href="styles/styles.css"></head>
<?php
$config = require 'settings.php';
$conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);

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

$reference = $_POST["reference"];
$first_name = $_POST["first_name"];
$surname = $_POST["surname"];
$dob = $_POST["dob"];

$gender = $_POST["gender"];
$gender = "";
if ($gender == "male") {
    $gender = "Male";
} else if ($gender == "female") {
    $gender = "female";
} 

$address = $_POST["address"];
$suburb = $_POST["suburb"];
$state = $_POST["state"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$number = $_POST["number"];

?>