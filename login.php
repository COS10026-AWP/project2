<?php
$login_error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = require(__DIR__ . '/settings.php');
    require(__DIR__ . '/src/services/process_login.php');

    $user = false;
    try {
        $db_conn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);
        $user = get_user_from_credentials($db_conn, $_POST['username'], $_POST['password']);
        mysqli_close($db_conn);
    } catch (mysqli_sql_exception $e) {
        error_log('Database connection error: ' . $e->getMessage());
        $login_error = 'Something went wrong. Please try again.';
    }

    if (!$login_error) {
        if ($user) {
            update_session_for_user($user);
            $return_url = ($user['user_role'] === 'admin') ?
                'manage.php' :
                ($_SERVER['HTTP_REFERER'] ?? 'index.php');
            header("Location: {$return_url}");
            mysqli_close($db_conn);
            exit();
        } else {
            $login_error = 'Invalid username or password.';
        }
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
                value=<?= htmlspecialchars($_POST["username"] ?? "")?>>

            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>

            <?php if ($login_error): ?>
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
