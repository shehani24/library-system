<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: white;
        }
        .login-form {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 50px 50px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="login-form">
    <h3 class="text-center mb-4">Login Form</h3>

    <!-- Display error message if available -->
    <?php if (isset($_SESSION['alerts'])): ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['alerts']; 
            unset($_SESSION['alerts']); // Unset the alert after displaying it
            ?>
        </div>
    <?php endif; ?>

    <!-- Login form -->
    <form id="loginForm" method="POST" action="check_login.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Log In</button>
    </form>

    <p class="text-center mt-3">Don't have an account? <a href="register.php">Sign up</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
