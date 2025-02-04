<?php
session_start();
require 'database.php';

if (!isset($_SESSION['usersId'])) {
    echo "<script>alert('Please log in to access your profile.'); window.location.href='login.php';</script>";
    exit;
}

$userId = $_SESSION['usersId'];
$db = new Database();
$conn = $db->getConnection();

// Fetch user details
$query = "SELECT * FROM users WHERE usersId = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "<script>alert('User not found. Please log in again.'); window.location.href='login.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $contactNumber = $_POST['contact_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Handle profile picture upload
    $profile_pic = $user['profile_pic']; // Keep current profile picture if no new one is uploaded

    if (!empty($_FILES['profile-pic']['name'])) {
        $target_dir = "uploads/";
        $profile_pic = $target_dir . basename($_FILES["profile-pic"]["name"]);

        // Move uploaded file
        if (!move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $profile_pic)) {
            echo "<script>alert('Failed to upload the profile picture. Please try again.');</script>";
        }
    }

    // Prepare the update query
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE users SET userName = ?, first_name = ?, last_name = ?, contact_number = ?, email = ?, password = ?, profile_pic = ? WHERE usersId = ?";
        $params = [$username, $firstName, $lastName, $contactNumber, $email, $hashed_password, $profile_pic, $userId];
    } else {
        $query = "UPDATE users SET userName = ?, first_name = ?, last_name = ?, contact_number = ?, email = ?, profile_pic = ? WHERE usersId = ?";
        $params = [$username, $firstName, $lastName, $contactNumber, $email, $profile_pic, $userId];
    }

    $stmt = $conn->prepare($query);
    $updateResult = $stmt->execute($params);

    if ($updateResult) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('No changes were made or an error occurred.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .profile-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            margin-top: 280px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            font-size: 14px;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            margin-top: 6px;
        }

        .input-group input:focus {
            border-color: #2E5077;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .update-button {
            width: 100%;
            padding: 12px;
            background-color: #4DA1A9;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .update-button:hover {
            background-color: #2E5077;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <?php require 'navbar.php'; ?>
    </div>
    <div class="profile-container">
        <h2>Update Profile</h2>
        <img src="<?= !empty($user['profile_pic']) && file_exists($user['profile_pic']) ? $user['profile_pic'] : './img/default-profile.png'; ?>" alt="Profile Picture" class="profile-image" id="profilePic">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="profile-pic">Upload Profile Picture</label>
                <input type="file" id="profile-pic" name="profile-pic" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['userName']); ?>" required>
            </div>
            <div class="input-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($user['first_name'] ?? ''); ?>" required>
            </div>
            <div class="input-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($user['last_name'] ?? ''); ?>" required>
            </div>
            <div class="input-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" value="<?= htmlspecialchars($user['contact_number'] ?? ''); ?>" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="input-group">
                <label for="password">New Password (leave blank to keep current password)</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="update-button">Update Profile</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('profilePic').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
