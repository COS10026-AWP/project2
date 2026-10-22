<?php
$login_error = null;

if (($_SERVER['REQUEST_METHOD'] ?? '')  === 'POST') {
    $config = require(__DIR__ . '/settings.php');
    require(__DIR__ . '/src/services/process_login.php');

    $db_conn = false;
    try {
        $db_conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);
    } catch (mysqli_sql_exception $e) {
        error_log('Database connection error: ' . $e->getMessage());
        $login_error = 'Something went wrong. Please try again.';
    }

    $user = null;
    if ($login_error === null) {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            $login_error = 'Please provide both username and password.';
        } elseif (!is_string($_POST['username']) || !is_string($_POST['password'])) {
            $login_error = 'Invalid input. Please try again.';
        } elseif ($db_conn instanceof mysqli) {
            $user = get_user_from_credentials($db_conn, $_POST['username'], $_POST['password']);
            mysqli_close($db_conn);
        }
    }

    if ($login_error === null && is_array($user)) {
        update_session_for_user($user);
        redirect_by_role($user['user_role']);
    } else {
        $login_error = 'Invalid username or password.';
    }
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

    <main id="login">
        <h1>Login</h1>

        <form id="login-form" method="POST">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" required
                value=
                <?php
                if (isset($_POST["username"]) && is_string($_POST["username"])) {
                    echo htmlspecialchars($_POST["username"]);
                } else {
                    echo '""';
                }
                ?>
            >

            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>

            <?php if ($login_error) : ?>
                <p id="invalid-login"><?= $login_error ?></p>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>
    </main>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>

</html>
