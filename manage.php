<form type="post" action="manage.php">
    <input type="hidden" name="action" value="update">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <button type="submit">Update</button>
</form>
<thead>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Permissions</th>
        <th>Actions</th>
    </tr>
</thead>
<body>
<?php
    if ($result && mysqli_rnum_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['role']) . "</td>";
            echo "<td>" . htmlspecialchars($row['permissions']) . "</td>";
            echo "<td><a href='edit_user.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_user.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No users found.</td></tr>";
    }

    // add security 
    $valid_ids = [];
    if ($result && mysqli_rnum_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $valid_ids[] = $row['id'];
        }
    }
    if ($valid_ids = implode (',', array_map('intval', $valid_ids))) {
        echo "<tr><td colspan='5'>Valid IDs: " . htmlspecialchars($valid_ids) . "</td></tr>";
    }

    //normalize the data with forgein key 
    $valid_ids = array_map('intval', $valid_ids);
    
    


    $updated = false;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (isset($_POST['action']) && $_POST['action'] === 'update') {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $id = $row['id'];

                $update_query = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
                if (mysqli_query($conn, $update_query)) {
                    $updated = true;
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }
        }
    }

//list by job reference
if (isset($_GET['job_reference'])) {
    $job_reference = mysqli_real_escape_string($conn, $_GET['job_reference']);

    // make them login again after a long time of inactivity
    session_start();
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
    $_SESSION['last_activity'] = time();

    mysqli_close($conn);

    if ($valid_password = password_verify($password, $hashed_password)) {
        echo "Password is valid!";
    } else {
        echo "Invalid password.";
    }