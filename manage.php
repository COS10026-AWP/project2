<?php
session_start();

// only logged-in managers can see this page
if (!isset($_SESSION['manager'])) {
    header("Location: login.php");
    exit();
}

// log the manager out after 30 minutes of inactivity
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
$_SESSION['last_activity'] = time();

// make connection to the database
$config = require "settings.php";
$conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);

if (!$conn) {
    echo "<p>Sorry, the database is not available right now.</p>";
    exit();
}
