<?php
require_once 'database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eventID'])) {
    $eventID = $_POST['eventID'];
    $conn = new Database();
    $conn->delete("DELETE FROM events WHERE eventID = ?", [$eventID]);
    header('Location: admin.php');
} else{
    echo '<script>alert("Event deleted successfully."); window.location.href="admin.php";</script>';
}
?>
