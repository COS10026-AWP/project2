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

// delete or update an EOI if requested
if (isset($_POST['action'])) {

    // delete all EOIs for a job reference
    if ($_POST['action'] == "delete_by_job") {
        $job = trim($_POST['job_reference']);
        if ($job == "") {
            $message = "Please enter a job reference to delete.";
        } else {
            $job = mysqli_real_escape_string($conn, $job);
            $query = "DELETE FROM eoi WHERE reference = '$job'";
            if (mysqli_query($conn, $query)) {
                $message = "Deleted " . mysqli_affected_rows($conn) . " EOI(s) for job reference " . htmlspecialchars($job) . ".";
            } else {
                $message = "Sorry, the EOIs could not be deleted.";
            }
        }
    }

    // change the status of one EOI
    if ($_POST['action'] == "update_status") {
        $id = intval($_POST['eoi_id']);
        $status = $_POST['status'];
        if ($id > 0 && in_array($status, $statuses)) {
            $query = "UPDATE eoi SET status = '$status' WHERE EOInumber = $id";
            if (mysqli_query($conn, $query)) {
                $message = "EOI number $id changed to " . htmlspecialchars($status) . ".";
            } else {
                $message = "Sorry, the status could not be updated.";
            }
        } else {
            $message = "Invalid status.";
        }
    }
}

