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

// sort column was checked against $sort_fields above
$query = $query . " ORDER BY $sort $dir";

$like_first = "%" . $first_name . "%";
$like_last = "%" . $last_name . "%";

$stmt = $conn->prepare($query);
if ($search == "job") {
    $stmt->bind_param("s", $job_ref);
} elseif ($search == "both") {
    $stmt->bind_param("ss", $like_first, $like_last);
} elseif ($search == "first") {
    $stmt->bind_param("s", $like_first);
} elseif ($search == "last") {
    $stmt->bind_param("s", $like_last);
}
$stmt->execute();
$result = $stmt->get_result();
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

    <!-- list, search, and sort -->
    <form method="post" action="manage.php">
        <fieldset>
            <legend>List EOIs</legend>
            <p>
                <input type="radio" name="filter" id="filter_all" value="all" <?php if ($filter == "all") { echo "checked"; } ?>>
                <label for="filter_all">All EOIs</label>
            </p>
            <p>
                <input type="radio" name="filter" id="filter_job" value="job" <?php if ($filter == "job") { echo "checked"; } ?>>
                <label for="filter_job">By job reference</label>
                <input type="text" name="job_ref" value="<?php echo htmlspecialchars($job_ref); ?>">
            </p>
            <p>
                <input type="radio" name="filter" id="filter_name" value="name" <?php if ($filter == "name") { echo "checked"; } ?>>
                <label for="filter_name">By applicant name</label>
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
    <form method="post" action="manage.php">
        <fieldset>
            <legend>Delete EOIs by job reference</legend>
            <input type="hidden" name="action" value="delete_by_job">
            <label for="delete_job_ref">Job reference</label>
            <input type="text" name="job_reference" id="delete_job_ref" required="required">
            <input type="checkbox" name="confirm_delete" id="confirm_delete" required="required">
            <label for="confirm_delete">Yes, delete all EOIs for this job reference</label>
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
$stmt->close();
mysqli_close($conn);
?>



