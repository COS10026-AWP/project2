<?php
$config = require(__DIR__ . '/settings.php');

$db_conn = false;
try {
    $db_conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);
} catch (mysqli_sql_exception $e) {
    error_log('Database connection error: ' . $e->getMessage());
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
            <form id="login-form" action="https://mercury.swin.edu.au/it000000/formtest.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

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
if ($db_conn instanceof mysqli) {
    mysqli_close($db_conn);
}
?>