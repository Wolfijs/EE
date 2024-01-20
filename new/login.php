<?php
session_start();

include("connections.php");
include("functions.php");

$error = "";  // Initialize error variable

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        $query = "SELECT * FROM login WHERE username = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if (password_verify($password, $user_data['password'])) {
                $_SESSION['id'] = $user_data['id'];
                header("Location: index.php");
                die;
            } else {
                $error = "Wrong password!";
            }
        } else {
            $error = "Wrong username!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Task Management</title>
</head>
<body>
    <div class="main">
        <form method="post" class="forma" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username">
            <span id="username-val" style="color: red;"><?php if(isset($error) && $error == 'Wrong username!') echo "Wrong username!"; ?></span>

            <label for="pass">Password:</label>
            <input type="password" id="pass" name="password" placeholder="Enter your password">
            <span id="pass-val" style="color: red;"><?php if(isset($error) && $error == 'Wrong password!') echo "Wrong password!"; ?></span>

            <button type="submit">Login</button>
        </form>

        <div class="already-account">
            <p class="account">Don't have an account? <a class="rede" href="register.php">Register here</a>.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
