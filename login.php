<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Demo login credentials
    if ($username === "admin" && $password === "Glow@123") {

        $_SESSION["admin_logged_in"] = true;

        header("Location: admin.php");
        exit;

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

    <title>Admin Login - Glow Beauty Salon</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 350px;
            box-shadow: 0 5px 20px #e8b8cd;
        }

        h2 {
            color: #d63384;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            box-sizing: border-box;
            border: 1px solid #e8b8cd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #d63384;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h2>Glow Beauty Salon</h2>
        <p style="text-align:center;">Admin Login</p>

        <form method="POST" action="login.php">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>

        </form>

        <p class="error">
            <?php echo htmlspecialchars($error); ?>
        </p>

    </div>

</body>
</html>