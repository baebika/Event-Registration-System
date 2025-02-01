<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
        <form action="#" method="post">
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
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" class="signup-button">Register</button>
        </form>
        <p class="login-link">Already have an account? <a href="./login.php">Login</a></p>

        <!-- Attribution -->
        <div class="attribution">
            Icons made by <a href="https://www.flaticon.com/authors/catalin-fertu" title="Catalin Fertu">Catalin Fertu</a>
            from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
        </div>
    </div>
</body>

</html>