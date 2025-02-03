<?php
require_once 'database.php';

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

$eventId = $_GET['id'];
$conn = new Database();
$sql = "SELECT * FROM events WHERE eventID= ?";
$event = $conn->selectSingle($sql, [$eventId]);

if (!$event) {
    echo "<script>alert('Event not found.'); window.location.href='admin.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['event-name'];
    $eventDate = $_POST['event-date'];
    $eventTime = $_POST['event-time'];
    $eventLocation = $_POST['event-location'];
    $eventDescription = $_POST['event-description'];

    $updateSql = "UPDATE events SET eventName = ?, eventDate = ?, eventTime = ?, eventLocation = ?, eventDescription = ? WHERE eventID = ?";
    $result = $conn->update($updateSql, [$eventName, $eventDate, $eventTime, $eventLocation, $eventDescription, $eventId]);

    if ($result) {
        echo '<script>alert("Event updated successfully."); window.location.href="admin.php";</script>';
    } else {
        echo '<script>alert("Failed to update event.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edit Event - Event Registration System">
    <meta name="keywords" content="edit event, admin, event management, PHP, MySQL">
    <meta name="author" content="Your Name">
    <title>Edit Event - Event Registration System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
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
            margin-bottom: 20px;
        }

        .admin-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            margin: auto;
            left: 50%;
            margin-top: 20px;
        }

        .event-form {
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
    </style>
</head>

<body>
    <div class="navbar">
        <?php require 'navbar.php'; ?>
    </div>
    <div class="admin-container">
        <h1>Edit Event</h1>
        <div class="event-form">
            <h3>Update Event Details</h3>
            <form action="" method="post">
                <label for="event-name">Event Name</label>
                <input type="text" id="event-name" name="event-name" value="<?= htmlspecialchars($event['eventName']) ?>" required>

                <label for="event-date">Event Date</label>
                <input type="date" id="event-date" name="event-date" value="<?= htmlspecialchars($event['eventDate']) ?>" required>

                <label for="event-time">Event Time</label>
                <input type="time" id="event-time" name="event-time" value="<?= htmlspecialchars($event['eventTime']) ?>" required>

                <label for="event-location">Event Location</label>
                <input type="text" id="event-location" name="event-location" value="<?= htmlspecialchars($event['eventLocation']) ?>" required>

                <label for="event-description">Event Description</label>
                <textarea id="event-description" name="event-description" rows="4" required><?= htmlspecialchars($event['eventDescription']) ?></textarea>

                <button type="submit">Update Event</button>
            </form>
        </div>
    </div>
</body>

</html>