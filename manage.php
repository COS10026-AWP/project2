<?php
session_start();

// only logged-in managers can see this page
if (!isset($_SESSION['user_role'])) {
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

// arrays
$statuses = array("New", "Current", "Final");
$sort_fields = array(
    "EOInumber" => "EOI Number",
    "reference" => "Job Reference",
    "first_name" => "First Name",
    "surname" => "Last Name",
    "status" => "Status"
);

// delete and update
if (isset($_POST['action'])) {

    // delete all EOIs for a job reference
    if ($_POST['action'] == "delete_by_job") {
        $job = trim($_POST['job_reference']);
        if ($job == "") {
            $message = "Please enter a job reference to delete.";
        } elseif (!isset($_POST['confirm_delete'])) {
            $message = "Please tick the box to confirm the delete.";
        } else {
            $stmt = $conn->prepare("DELETE FROM eoi WHERE reference = ?");
            $stmt->bind_param("s", $job);
            if ($stmt->execute()) {
                $message = "Deleted " . $stmt->affected_rows . " EOI(s) for job reference " . htmlspecialchars($job) . ".";
            } else {
                $message = "Sorry, the EOIs could not be deleted.";
            }
            $stmt->close();
        }
    }

    // change the status of one EOI
    if ($_POST['action'] == "update_status") {
        $eoi_id = intval($_POST['eoi_id']); // convert id to integer 
        $status = $_POST['status'];
        if ($eoi_id > 0 && in_array($status, $statuses)) {
            $stmt = $conn->prepare("UPDATE eoi SET status = ? WHERE EOInumber = ?");
            $stmt->bind_param("si", $status, $eoi_id);
            if ($stmt->execute()) {
                $message = "EOI number $eoi_id changed to " . htmlspecialchars($status) . ".";
            } else {
                $message = "Sorry, the status could not be updated.";
            }
            $stmt->close();
        } else {
            $message = "Invalid status.";
        }
    }


