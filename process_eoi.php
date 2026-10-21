<?php
$config = require 'settings.php';
$conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("location: apply.php");
    exit();
}

$table_sql = "CREATE TABLE IF NOT EXISTS eoi (
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
)";

if (!mysqli_query($conn, $table_sql)) {
    die("<p>Error creating table: " . mysqli_error($conn) . "</p>");
}

function clean($data, $conn) {
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($data ?? '')));
}

// collects info
$ref  = clean($_POST['reference'] ?? '', $conn);
$fname = clean($_POST['first_name'] ?? '', $conn);
$surname = clean($_POST['surname'] ?? '', $conn);
$dob   = clean($_POST['dob'] ?? '', $conn);
$gender = clean($_POST['gender'] ?? '', $conn);
$street = clean($_POST['street'] ?? '', $conn);
$suburb = clean($_POST['suburb'] ?? '', $conn);
$state = clean($_POST['state'] ?? '', $conn);
$post  = clean($_POST['postcode'] ?? '', $conn);
$email = clean($_POST['email'] ?? '', $conn);
$phone = clean($_POST['phone'] ?? '', $conn);
$other = clean($_POST['other'] ?? '', $conn);

// server side validation 
$errors = [];
if (!preg_match("/^[a-zA-Z0-9]{6}$/", $ref)) $errors[] = "Invalid job reference format.";
if (!preg_match("/^[a-zA-Z]{1,20}$/", $fname)) $errors[] = "Invalid first name.";
if (!preg_match("/^[a-zA-Z]{1,20}$/", $surname)) $errors[] = "Invalid last name.";
if (!preg_match("/^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/(\d{4})$/", $dob)) $errors[] = "Invalid Date of Birth format.";
if (!in_array($gender, ['male', 'female', 'other'])) $errors[] = "Please select a valid gender.";
if (empty($street) || strlen($street) > 40) $errors[] = "Street address is required and cannot exceed 40 characters.";
if (empty($suburb) || strlen($suburb) > 40) $errors[] = "Suburb is required and cannot exceed 40 characters.";
if (!in_array(strtolower($state), ['vic', 'nsw', 'qld', 'nt', 'wa', 'sa', 'tas', 'act'])) $errors[] = "Please select a valid Australian state.";
if (!preg_match("/^[0-9]{4}$/", $post)) $errors[] = "Postcode must be exactly 4 digits.";
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email.";
if (!preg_match("/^[0-9]{8,12}$/", $phone)) $errors[] = "Phone number must be between 8 and 12 digits.";
$skills_arr = $_POST['category'] ?? [];
if (empty($skills_arr)) $errors[] = "You must select at least one skill from the list.";

if (!empty($errors)) {
    echo "<h3>Please fix the following fields:</h3><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul><p><a href='apply.php'>Return to Form</a></p>";
    exit();
}

$sanitised_skills = [];
foreach ($skills_arr as $skill) {
    $sanitised_skills[] = clean($skill, $conn);
}
$skills_string = implode(", ", $sanitised_skills);

?>