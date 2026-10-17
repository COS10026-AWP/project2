<?php
$invalid_login = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = require(__DIR__ . '/settings.php');

    $db_conn = false;
    try {
        $db_conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);
    } catch (mysqli_sql_exception $e) {
        error_log('Database connection error: ' . $e->getMessage());
    }

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $_POST['username']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($_POST['password'], $user['password_hash'])) {
            session_start();
            session_regenerate_id(true); // Regenerate session ID to prevent session fixation
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_role'] = $user['user_role'];

            if ($user['user_role'] === 'admin') {
                header('Location: manage.php');
                exit();
            } else {
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }
        }
    }
    $invalid_login = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="author" content="Nathan Yan">
    <meta name="keywords" content="tourism, travel, jobs, employment, career">
    <meta name="description" content="Login to access your account and manage your job applications.">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>

    <main id="job-content">
        <section id="login-section">
            <h1>Login</h1>
            <form id="login-form" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required
                    value=<?= htmlspecialchars($_POST["username"] ?? "")?>>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <?php if ($invalid_login): ?>
                    <p class="invalid-login">Invalid username or password.</p>
                <?php endif; ?>

                <button type="submit">Login</button>
            </form>
        </section>
    </main>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>

</html>

<?php
if (@$db_conn instanceof mysqli) {
    mysqli_close($db_conn);
}
?>