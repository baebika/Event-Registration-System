<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'database.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database connection
    $conn = new Database();

    //Check if user exists
    $sql = "SELECT * FROM users WHERE email = ? or userName = ?";
    $hashed_password = sha1(md5($password));
    $result = $conn->SELECT($sql, [$email, $hashed_password]);
    if (!empty($result) && count($result) === 1) {
        $user = $result[0];
        $_SESSION['usersId'] = $user['usersId'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['userName'] = $user['userName'];
        header('Location: index.php');
        exit();
    } else {
        echo 'Invalid email or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            font-family: 'Merriweather', serif;
        }

        .container {
            display: flex;
            background: #F6F4F0;
            width: 65%;
            border-radius: 10px;
            justify-content: center;
            align-items: center;
            height: 75vh;
            margin: 20px;
        }

        .display-text {
            width: 50%;
            text-align: right;
            margin-left: 125px;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            margin-top: 6px;
        }

        .input-group input:focus {
            border-color: #2E5077;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #4DA1A9;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .login-button:hover {
            background-color: #2E5077;
        }

        .signup-link {
            margin-top: 20px;
            color: #555;
            font-size: 14px;
        }

        .signup-link a {
            color: #4DA1A9;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Glitch Animation for "Event Registration Project" */
        .glitch-text {
            font-size: 2.5rem;
            font-weight: bold;
            position: relative;
            color: #333;
            animation: glitch 2s infinite;
            display: inline-block;
        }

        .glitch-text::before,
        .glitch-text::after {
            content: 'Event Registration Project';
            /* Updated content */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            clip-path: polygon(0 0, 100% 0, 100% 30%, 0 30%);
            animation: glitch 2s infinite;
        }

        .glitch-text::before {
            color: #79D7BE;
            /* Light green color */
            z-index: -1;
        }

        .glitch-text::after {
            color: #79D7BE;
            /* Dark blue color */
            clip-path: polygon(0 70%, 100% 70%, 100% 100%, 0 100%);
            z-index: -2;
        }

        @keyframes glitch {

            0%,
            100% {
                transform: translate(0);
            }

            20% {
                transform: translate(-2px, 2px);
            }

            40% {
                transform: translate(2px, -2px);
            }

            60% {
                transform: translate(-1px, 1px);
            }

            80% {
                transform: translate(1px, -1px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="display">
            <div class="display-text">
                <h2>
                    <span class="glitch-text">Event Registration Project</span>
                </h2>
            </div>
            <div class="display-image">
                <img src="./img/login1.png" alt="Login illustration" width="500">
            </div>
        </div>
        <div class="login-container">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
            <p class="signup-link">Don't have an account? <a href="./register.php">Register</a></p>
        </div>
    </div>
</body>

</html>