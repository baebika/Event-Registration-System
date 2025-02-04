<?php
require_once 'database.php';

// Handle form submission for creating an event
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['event-name'] ?? null;
    $eventDate = $_POST['event-date'] ?? null;
    $eventTime = $_POST['event-time'] ?? null;
    $eventLocation = $_POST['event-location'] ?? null;
    $eventDescription = $_POST['event-description'] ?? null;

    if ($eventName && $eventDate && $eventTime && $eventLocation && $eventDescription) {
        $conn = new Database();
        $sql = "INSERT INTO events (eventName, eventDate, eventTime, eventLocation, eventDescription) VALUES (?, ?, ?, ?, ?)";
        $returnID = $conn->create($sql, [$eventName, $eventDate, $eventTime, $eventLocation, $eventDescription]);
        if ($returnID) {
            echo '<script>alert("Event created successfully."); window.location.href="admin.php";</script>';
        } else {
            echo '<script>alert("Something went wrong. Please try again later.");</script>';
        }
    } else {
        echo '<script>alert("All fields are required.");</script>';
    }
}

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
    <meta name="description" content="Admin interface for Event Registration System. Manage events and registrations.">
    <meta name="keywords" content="admin, event management, PHP, MySQL, CRUD">
    <meta name="author" content="Your Name">
    <title>Admin - Event Registration System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
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
            margin-bottom: 20px;
        }

        .admin-container {
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

        .event-form {
            margin-bottom: 5px;
            text-align: left;
        }

        .event-form h3 {
            margin-bottom: 30px;
        }

        .event-form label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .event-form input,
        .event-form textarea {
            font-family: 'Roboto', sans-serif;
            ;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
            outline: none;
        }

        .event-form input:focus,
        .event-form textarea:focus {
            border-color: #2E5077;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .event-form button {
            display: block;
            margin: 0 auto;
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

        .event-form button:hover {
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

        .event-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .event-actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .event-actions .edit-button {
            background-color: #4DA1A9;
            color: #fff;
        }

        .event-actions .edit-button:hover {
            background-color: #2E5077;
        }

        .event-actions .delete-button {
            background-color: #ff4d4d;
            color: #fff;
        }

        .event-actions .delete-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>

<body>
    <?php require 'navbar.php'; ?>
    <div class="admin-container">
        <h1>Admin - Event Management</h1>

        <!-- Form to Create New Event -->
        <div class="event-form">
            <h3>Create New Event</h3>
            <form action="#" method="post">
                <label for="event-name">Event Name</label>
                <input type="text" id="event-name" name="event-name" required>

                <label for="event-date">Event Date</label>
                <input type="date" id="event-date" name="event-date" required>

                <label for="event-time">Event Time</label>
                <input type="time" id="event-time" name="event-time" required>

                <label for="event-location">Event Location</label>
                <input type="text" id="event-location" name="event-location" required>

                <label for="event-description">Event Description</label>
                <textarea id="event-description" name="event-description" rows="4" required></textarea>

                <button type="submit">Create Event</button>
            </form>
        </div>

        <!-- List of Existing Events -->
        <div class="event-list">
            <h2>Existing Events</h2>
            <?php if (!empty($events)) : ?>
                <?php foreach ($events as $event) : ?>
                    <div class="event-card">
                        <h2><?php echo htmlspecialchars($event['eventName']); ?></h2>
                        <p class="event-date">Date: <?php echo htmlspecialchars($event['eventDate']); ?> | Time: <?php echo htmlspecialchars($event['eventTime']); ?></p>
                        <p>Location: <?php echo htmlspecialchars($event['eventLocation']); ?></p>
                        <p>Description: <?php echo htmlspecialchars($event['eventDescription']); ?></p>
                        <div class="event-actions">
                            <form action="edit.php" method="get" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($event['eventID']); ?>">
                                <button type="submit" class="edit-button">Edit</button>
                            </form>

                            <form action="delete.php" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                <input type="hidden" name="eventID" value="<?php echo htmlspecialchars($event['eventID']); ?>">
                                <button type="submit" class="delete-button">Delete</button>
                            </form>


                        </div>


                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>