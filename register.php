<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'database.php';
    $userName = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm-password']);

    //Validate form data
    if (empty($userName) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error'] = "All fields are required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email address.";
    } else if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $_SESSION['error'] = "Password must be at least 8 characters long, contain at least one letter, one number and one special character.";
    } else if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match.";
    } else {
        //Database connection
        $conn = new Database();

        //Check if user exists
        $sql = "SELECT usersId FROM users WHERE email = ?";
        $count = $conn->countRows($sql, [$email]);
        if ($count > 0) {
            $_SESSION['error'] = "The email address is already registered.";
        } else {
            //Insert user into the database
            $sql = "INSERT INTO users (userName, email, password) VALUES (?, ?, ?)";
            $hashed_password = sha1(md5($password));
            $returnID = $conn->create($sql, [$userName, $email, $hashed_password]);
            if ($returnID) {
                $_SESSION['success'] = "Registration successful! Please log in.";
                header('Location: login.php');
                exit();
            } else {
                $_SESSION['error'] = "Something went wrong. Please try again later.";
            }
        }
    }
}
?>
<!-- ✅ Display Error Messages in an Alert Box -->
<?php if (isset($_SESSION['error'])): ?>
    <script>alert("<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>");</script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            /* font-weight: 900; */
        }

        .back-icon {
            position: absolute;
            top: 32px;
            left: 25px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #4DA1A9;
            display: flex;
            align-items: center;
        }

        .back-icon a img {
            transition: transform 0.3s ease, opacity 0.3s ease;
            /* Smooth transition */
        }

        .back-icon a:hover img {
            transform: scale(1.1);
            /* Slightly enlarge the icon */
            opacity: 0.8;
            /* Slightly reduce opacity */
        }

        .signup-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            position: relative;
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

        .signup-button {
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

        .signup-button:hover {
            background-color: #2E5077;
        }

        .login-link {
            margin-top: 20px;
            color: #555;
            font-size: 14px;
        }

        .login-link a {
            color: #4DA1A9;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .attribution {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }

        .attribution a {
            color: #4DA1A9;
            text-decoration: none;
        }

        .attribution a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <div class="back-icon">
            <a href="./login.php"><img src="./img/arrow.png" alt="back icon" width="25px"></a>
        </div>
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                    title="Password must be at least 8 characters long, include at least one special character and one number.">
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" class="signup-button">Register</button>
        </form>
        <p class="login-link">Already have an account? <a href="./login.php">Login</a></p>
    </div>
    <script src="./assets/password-validation.js"></script>
</body>
</html>