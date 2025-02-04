<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
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
            padding-top: 60px;
        }

        footer {
            background-color: #2E5077;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
            margin-top: 30px;
        }

        .footer-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .social-icons img {
            width: 24px;
            margin: 0 5px;
            transition: transform 0.3s;
        }

        .social-icons a {
            text-decoration: none;
            color: white;
        }

        .social-icons img:hover {
            transform: scale(1.2);
        }
    </style>
</head>

<body>
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <p>&copy; <?php echo date("Y"); ?> Event Registration. All rights reserved.</p>
            </div>
            <div class="footer-links">
                <a href="index.php">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Terms & Privacy</a>
            </div>
            <div class="social-icons">
                <a href="#" target="_blank"><img src="icons/facebook.svg" alt="Facebook"></a>
                <a href="#" target="_blank"><img src="icons/instagram.svg" alt="Instagram"></a>
            </div>
        </div>
    </footer>
</body>

</html>