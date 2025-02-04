<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eventID'])) {
    $eventID = (int) $_POST['eventID']; // Cast to int for safety
    $conn = new Database();

    if ($conn->delete("DELETE FROM events WHERE eventID = ?", [$eventID])) {
        echo '<script>alert("Event deleted successfully."); window.location.href="admin.php";</script>';
    } else {
        echo '<script>alert("Failed to delete the event. Please try again."); window.location.href="admin.php";</script>';
    }
} else {
    echo '<script>alert("Invalid request."); window.location.href="admin.php";</script>';
}
?>
