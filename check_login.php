<?php
// Start session to store user data
session_start();

// Database connection
include 'conn.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query to check if the email exists in the database
    $sql = "SELECT email, password, role, name FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the email exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify the password using password_verify() if password is hashed
        if (password_verify($password, $row['password'])) {
            // Password is correct, start the session
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['name']; // Store the user's name in the session

            // Redirect based on user role
            if ($row['role'] === 'admin') {
                header("Location: admin/index.php");
            } elseif ($row['role'] === 'user') {
                header("Location: user/index.php");
            } else {
                $_SESSION['alerts'] = "Invalid role assigned.";
                header("Location: login.php");
            }
            exit; // Make sure no further code is executed after the redirect
        } else {
            // Incorrect password
            $_SESSION['alerts'] = "Invalid email or password.";
            header("Location: login.php");
            exit;
        }
    } else {
        // No user found with that email
        $_SESSION['alerts'] = "Invalid email or password.";
        header("Location: login.php");
        exit;
    }

    // Close statement and connection
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
