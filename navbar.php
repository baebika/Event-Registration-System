<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Event Registration System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        .navbar {
            background-color: #4DA1A9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-links {
            display: flex;
            gap: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .navbar a:hover {
            /* background-color: #2E5077; */
            text-decoration: underline;
            /* font-weight: 700; */
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .navbar .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile img {
            width: 30px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .profile img:hover {
            transform: scale(1.1);
        }

        .admin-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-links">
            <a href="./index.php">Home</a>
            <a href="./event-page.php">Switch to User Interface</a>
        </div>
        <div class="profile">
            <a href="./profile.php">Profile</a>
            <a href="./login.php"><img src="./img/logout2.png" alt="Logout"></a>
        </div>
    </nav>
</body>

</html>