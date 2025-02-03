<?php
require_once 'database.php';

// Ensure 'id' is retrieved correctly
if (!isset($_GET['eventID'])) {
    die("Error: No event ID provided.");
}

$eventId = $_GET['eventID'];
$conn = new Database();

// Use the correct column name (Check your database structure)
$sql = "DELETE FROM events WHERE eventID = ?";

$result = $conn->delete($sql, [$eventId]);

if ($result) {
    echo '<script>alert("Event deleted successfully."); window.location.href="admin.php";</script>';
} else {
    echo '<script>alert("Failed to delete event."); window.location.href="admin.php";</script>';
}
?>
