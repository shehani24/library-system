<?php
// Include the database connection
include 'conn.php';

// Initialize error and success messages
$error = '';
$success = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role="user";

    // Check if email already exists
    $checkEmailSql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // If email already exists, redirect back with an error
        $error = "This email is already registered.";
    } elseif ($password !== $confirmPassword) {
        // Validate password match
        $error = "Passwords do not match.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to insert user into the database
        $sql = "INSERT INTO users (name, email, phone, password,role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $phone, $hashedPassword,$role);

        if ($stmt->execute()) {
            // If successful, redirect with a success message
            $success = "Registration successful! You can now log in.";
        } else {
            // In case of an error during insertion
            $error = "An error occurred while registering. Please try again.";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}

// Redirect back to the registration page with a success or error message
if ($error) {
    header("Location: register.php?error=" . urlencode($error));
} elseif ($success) {
    header("Location: register.php?success=" . urlencode($success));
}
exit;
?>
