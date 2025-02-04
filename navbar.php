<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
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
            /* background-color: #f4f4f4; */
            font-size: 18px;
            padding-top: 60px;
        }

        h1 {
            font-family: 'Merriweather', serif;
            /* font-weight: 900; */
        }

        .hero {
            /* background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0');
            background-size: cover;
            background-position: center; */
            width: 100%;
            min-height: 100vh;
            z-index: 1000;

        }

        nav {
            background: #4DA1A9;
            width: 100%;
            padding: 15px 10%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .user-pic {
            width: 40px;
            border-radius: 50%;
            cursor: pointer;
            margin-left: 30px;
        }

        nav a {
            color: #F6F4F0;
            text-decoration: none;
        }

        nav ul {
            width: 100%;
            text-align: right;
        }

        nav ul li {
            display: inline-block;
            list-style: none;
            margin: 10px 20px;
        }

        nav ul li a {
            color: #F6F4F0;
            list-style: none;
            text-decoration: none;
            transition: transform 0.5s;
        }

        nav ul li:hover a {
            font-weight: 600;
            transform: translateX(5px);
        }

        .sub-menu-wrap {
            background: #ffffff;
            position: absolute;
            top: 100%;
            right: 10%;
            width: 300px;
            max-height: 0px;
            overflow: hidden;
            transition: max-height 0.5s;
        }

        .sub-menu-wrap.open-menu {
            max-height: 400px;
        }

        .sub-menu {
            /* background: #F6F4F0; */
            padding: 20px;
            margin: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info h3 {
            font-weight: 500;
        }

        .user-info img {
            width: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .sub-menu hr {
            border: 0;
            height: 1px;
            width: 100%;
            background: #4DA1A9;
            margin: 15px 0 10px 0;
        }

        .sub-menu-link {
            display: flex;
            align-items: center;
            margin: 12px 0;
            text-decoration: none;
            color: #000000;
        }

        .sub-menu-link p {
            width: 100%;
        }

        .sub-menu-link:hover p {
            font-weight: 600;
        }

        .sub-menu-link img {
            width: 40px;
            background-attachment: #2E5077;
            border-radius: 50px;
            padding: 8px;
            margin-right: 15px;
        }

        .sub-menu-link span {
            font-size: 22px;
            transition: transform 0.5s;
        }

        .sub-menu-link:hover span {
            transform: translateX(5px);
        }
    </style>

</head>

<body>
    <div class="hero">
        <nav>
            <a href="#">LOGO</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin.php">Switch to Admin Page</a></li>
            </ul>
            <img src="./img/profile.png" alt="Default Profile Image" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="sub-menu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="./img/profile.png" alt="Default Profile Image">
                        <h3>User Name</h3>
                    </div>
                    <hr>
                    <a href="profile.php" class="sub-menu-link">
                        <img src="./img/edit-profile.png" alt="Edit Profile Icon">
                        <p>Edit Profile</p>
                        <span> > </span>
                    </a>
                    <a href="login.php" class="sub-menu-link">
                        <img src="./img/logout.png" alt="Logout Icon">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>

    </div>


    <script>
        let subMenu = document.getElementById('sub-menu');

        function toggleMenu() {
            subMenu.classList.toggle('open-menu');
        }
    </script>
</body>

</html>