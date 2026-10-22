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

}
 // initialize search and sort variables, which will be used to build the SQL query
$filter = "all";
$job_ref = "";
$first_name = "";
$last_name = "";
$sort = "EOInumber";
$dir = "ASC";

if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];
}
if (isset($_POST['job_ref'])) {
    $job_ref = trim($_POST['job_ref']);
}
if (isset($_POST['first_name'])) {
    $first_name = trim($_POST['first_name']);
}
if (isset($_POST['last_name'])) {
    $last_name = trim($_POST['last_name']);
}
if (isset($_POST['sort']) && array_key_exists($_POST['sort'], $sort_fields)) {
    $sort = $_POST['sort'];
}
if (isset($_POST['dir']) && $_POST['dir'] == "desc") {
    $dir = "DESC";
}

// build the query
$query = "SELECT EOInumber, reference, first_name, surname, dob, gender, street, suburb, state, postcode, email, phone, skills, other, status FROM eoi";

// decide which search to run
$search = "all";
if ($filter == "job" && $job_ref != "") {
    $search = "job";
    $query = $query . " WHERE reference = ?";
} elseif ($filter == "name" && $first_name != "" && $last_name != "") {
    $search = "both";
    $query = $query . " WHERE first_name LIKE ? AND surname LIKE ?";
} elseif ($filter == "name" && $first_name != "") {
    $search = "first";
    $query = $query . " WHERE first_name LIKE ?";
} elseif ($filter == "name" && $last_name != "") {
    $search = "last";
    $query = $query . " WHERE surname LIKE ?";
}

