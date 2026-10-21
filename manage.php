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
// allowed values (stops anything else being used for sorting)
$statuses = array("New", "Current", "Final");
$sort_fields = array(
    "EOInumber" => "EOI Number",
    "reference" => "Job Reference",
    "first_name" => "First Name",
    "surname" => "Last Name",
    "status" => "Status"
);

$message = "";

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

// get search and sort parameters from the form
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

// build the query based on the filter and sort options
$query = "SELECT EOInumber, reference, first_name, surname, dob, gender, street, suburb, state, postcode, email, phone, skills, other, status FROM eoi";
$conditions = array();

if ($filter == "job" && $job_ref != "") {
    $safe = mysqli_real_escape_string($conn, $job_ref);
    $conditions[] = "reference = '$safe'";
}
if ($filter == "name") {
    if ($first_name != "") {
        $safe = mysqli_real_escape_string($conn, $first_name);
        $conditions[] = "first_name LIKE '%$safe%'";
    }
    if ($last_name != "") {
        $safe = mysqli_real_escape_string($conn, $last_name);
        $conditions[] = "surname LIKE '%$safe%'";
    }
}
if (count($conditions) > 0) {
    $query = $query . " WHERE " . implode(" AND ", $conditions);
}
$query = $query . " ORDER BY $sort $dir";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage EOIs</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>

    <h1>Manage Expressions of Interest</h1>

    <?php
    if ($message != "") {
        echo "<p><strong>" . $message . "</strong></p>";
    }
    ?>

    <!-- list, search, sort -->
    <form method="post" action="manage.php">
        <fieldset>
            <legend>List EOIs</legend>
            <p>
                <input type="radio" name="filter" id="f_all" value="all" <?php if ($filter == "all") { echo "checked"; } ?>>
                <label for="f_all">All EOIs</label>
            </p>
            <p>
                <input type="radio" name="filter" id="f_job" value="job" <?php if ($filter == "job") { echo "checked"; } ?>>
                <label for="f_job">By job reference</label>
                <input type="text" name="job_ref" value="<?php echo htmlspecialchars($job_ref); ?>">
            </p>
            <p>
                <input type="radio" name="filter" id="f_name" value="name" <?php if ($filter == "name") { echo "checked"; } ?>>
                <label for="f_name">By applicant name</label>
                <input type="text" name="first_name" placeholder="First name" value="<?php echo htmlspecialchars($first_name); ?>">
                <input type="text" name="last_name" placeholder="Last name" value="<?php echo htmlspecialchars($last_name); ?>">
                (one or both)
            </p>
            <p>
                <label for="sort">Sort by</label>
                <select name="sort" id="sort">
                    <?php
                    foreach ($sort_fields as $column => $label) {
                        echo "<option value='$column'";
                        if ($sort == $column) {
                            echo " selected";
                        }
                        echo ">$label</option>";
                    }
                    ?>
                </select>
                <select name="dir">
                    <option value="asc" <?php if ($dir == "ASC") { echo "selected"; } ?>>Ascending</option>
                    <option value="desc" <?php if ($dir == "DESC") { echo "selected"; } ?>>Descending</option>
                </select>
            </p>
            <input type="submit" value="Search">
        </fieldset>
    </form>

    <!-- Delete all EOIs for a job reference -->
    <form method="post" action="manage.php" onsubmit="return confirm('Delete ALL EOIs for this job reference?');">
        <fieldset>
            <legend>Delete EOIs by job reference</legend>
            <input type="hidden" name="action" value="delete_by_job">
            <label for="del_job">Job reference</label>
            <input type="text" name="job_reference" id="del_job" required="required">
            <input type="submit" value="Delete all">
        </fieldset>
    </form>

    <!-- Results -->
    <table>
        <thead>
            <tr>
                <th>EOI #</th>
                <th>Job Ref</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Skills</th>
                <th>Other Skills</th>
                <th>Status</th>
                <th>Change Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['EOInumber']) . "</td>";
                echo "<td>" . htmlspecialchars($row['reference']) . "</td>";
                echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['surname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
                echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                echo "<td>" . htmlspecialchars($row['street'] . ", " . $row['suburb'] . " " . strtoupper($row['state']) . " " . $row['postcode']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['skills']) . "</td>";
                echo "<td>" . htmlspecialchars($row['other']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";

                // status form: hidden fields remember the EOI and the current search
                echo "<td>";
                echo "<form method='post' action='manage.php'>";
                echo "<input type='hidden' name='action' value='update_status'>";
                echo "<input type='hidden' name='eoi_id' value='" . intval($row['EOInumber']) . "'>";
                echo "<input type='hidden' name='filter' value='" . htmlspecialchars($filter) . "'>";
                echo "<input type='hidden' name='job_ref' value='" . htmlspecialchars($job_ref) . "'>";
                echo "<input type='hidden' name='first_name' value='" . htmlspecialchars($first_name) . "'>";
                echo "<input type='hidden' name='last_name' value='" . htmlspecialchars($last_name) . "'>";
                echo "<input type='hidden' name='sort' value='" . htmlspecialchars($sort) . "'>";
                echo "<input type='hidden' name='dir' value='" . strtolower($dir) . "'>";
                echo "<select name='status'>";
                foreach ($statuses as $s) {
                    echo "<option value='$s'";
                    if ($row['status'] == $s) {
                        echo " selected";
                    }
                    echo ">$s</option>";
                }
                echo "</select> ";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
                echo "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No EOIs found.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>

</html>
<?php
mysqli_close($conn);
?>
