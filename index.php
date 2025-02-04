<?php
require_once 'database.php';

// Fetch all events from the database
$conn = new Database();
$sql = "SELECT * FROM events";
$events = $conn->SELECT($sql);
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-family: 'Roboto', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #f4f4f4;
            margin: 0;
        }

        .home-container {
            flex: 1;
            padding: 30px;
            background-color: #fff;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
        }

        .footer-container {
            width: 100%;
            background-color: #2E5077;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            left: 0;
        }

        .footer-content p {
            margin: 0;
        }

        h1 {
            font-family: 'Merriweather', serif;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
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
            <?php if (!empty($events)) : ?>
                <?php foreach ($events as $event) : ?>
                    <div class="event-card">
                        <h2><?php echo htmlspecialchars($event['eventName']); ?></h2>
                        <p class="event-date">Date: <?php echo htmlspecialchars($event['eventDate']); ?></p>
                        <p>Location: <?php echo htmlspecialchars($event['eventLocation']); ?></p>
                        <p>Description: <?php echo htmlspecialchars($event['eventDescription']); ?></p>
                        <button class="register-button">Register Now</button>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Include Footer -->
    <?php require 'footer.php'; ?>
</body>

</html>