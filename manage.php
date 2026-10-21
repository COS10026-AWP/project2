<?php
// manage.php - HR manager page for EOIs
session_start();
// only managers can see this page
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

require_once "settings.php"; 

// allowed values (stops anything else being used for sorting)
$statuses = array("New", "Current", "Final");
$sort_fields = array(
    "EOInumber" => "EOI Number",
    "reference" => "Job Reference",
    "first_name" => "First Name",
    "surname" => "Last Name",
    "status" => "Status"
);

