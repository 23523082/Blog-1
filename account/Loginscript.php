<?php
// process_login.php

require '../dbconnections.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username_input = trim($_POST['username']);
    $password_input = $_POST['password'];

    // Prepare the SQL statement to fetch user details
    $stmt = $conn->prepare("SELECT id, username_input, password_input, type FROM login WHERE username_input = ? LIMIT 1");
    $stmt->bind_param("s", $username_input);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Debugging: Display values for validation (remove in production)
        echo "Username from input: " . htmlspecialchars($username_input) . "<br>";
        echo "Hashed password from database: " . htmlspecialchars($user['password_input']) . "<br>";
        echo "Password input: " . htmlspecialchars($password_input) . "<br>";
        echo "User type: " . htmlspecialchars($user['type']) . "<br>";

        // Verify the password (assuming it's hashed)
        if (password_verify($password_input, $user['password_input'])) {
            // Start session and store user info
            session_start();
            $_SESSION['username'] = $user['username_input'];
            $_SESSION['user_id'] = $user['id']; // Store user ID for further use
            $_SESSION['user_type'] = $user['type']; // Store user type

            echo "Login successful. Redirecting...";
            
            // Redirect based on user type
            if ($user['type'] === 'admin') {
                header("Location: ../adminPage/adminDashboard.php");
            } else {
                header("Location: ../index.php"); // Redirect for non-admin users
            }
            exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that username.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
