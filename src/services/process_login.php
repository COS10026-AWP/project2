<?php
function get_user_from_credentials(mysqli $db_conn, string $username, string $password): ?array
{
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password_hash'])) {
            return $user;
        }
    }
    return null;
}

function update_session_for_user(array $user): void
{
    session_start();
    session_regenerate_id(true); // Regenerate session ID to prevent session fixation
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_role'] = $user['user_role'];
}
