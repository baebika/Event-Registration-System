<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Home page for Event Registration System. Register for events and manage your participation.">
    <meta name="keywords" content="events, event registration, PHP, MySQL, CRUD">
    <meta name="author" content="Your Name">
    <title>Home - Event Registration System</title>
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
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-family: 'Merriweather', serif;
            /* font-weight: 900; */
            font-size: 48px;
        }

        .home-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            /* text-align: center;
            position: relative; */
            margin: auto;
            margin-top: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
        }

        .switch-menu {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .switch-menu button {
            padding: 10px 20px;
            background-color: #4DA1A9;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .switch-menu button:hover {
            background-color: #2E5077;
        }

        .event-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .event-card {
            background-color: #F6F4F0;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .event-card h2 {
            margin-bottom: 10px;
            color: #2E5077;
            font-size: 22px;
        }

        .event-card p {
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }

        .event-card .event-date {
            font-weight: bold;
            color: #4DA1A9;
        }

        .register-button {
            padding: 10px 20px;
            background-color: #4DA1A9;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #2E5077;
        }

        .logout-link {
            margin-top: 20px;
            color: #555;
            font-size: 14px;
        }

        .logout-link a {
            color: #4DA1A9;
            text-decoration: none;
        }

        .logout-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php require 'navbar.php'; ?>
    <div class="home-container">
        <h1>Upcoming Events</h1>
        <div class="event-list">
            <!-- Event 1 -->
            <div class="event-card">
                <h2>Tech Conference 2023</h2>
                <p class="event-date">Date: October 15, 2023</p>
                <p>Location: Virtual</p>
                <p>Description: Join us for the biggest tech conference of the year, featuring top industry speakers and workshops.</p>
                <button class="register-button">Register Now</button>
            </div>

            <!-- Event 2 -->
            <div class="event-card">
                <h2>Music Festival 2023</h2>
                <p class="event-date">Date: November 5, 2023</p>
                <p>Location: Central Park, New York</p>
                <p>Description: Enjoy live performances from your favorite artists at this year's music festival.</p>
                <button class="register-button">Register Now</button>
            </div>

            <!-- Event 3 -->
            <div class="event-card">
                <h2>Startup Pitch Night</h2>
                <p class="event-date">Date: December 10, 2023</p>
                <p>Location: San Francisco, CA</p>
                <p>Description: Watch innovative startups pitch their ideas to a panel of investors.</p>
                <button class="register-button">Register Now</button>
            </div>
        </div>
    </div>
</body>

</html>