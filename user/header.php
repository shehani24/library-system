<?php
session_start();


// echo $_SESSION['email'];
// echo $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }
        #sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        #sidebar .nav-link {
            color: white;
        }
        #sidebar .nav-link.active, #sidebar .nav-link:hover {
            background-color: #495057;
        }
        #header {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="d-flex flex-column flex-shrink-0 p-3">
            <h3 class="text-white text-center mb-4">User Panel</h3>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Search Books</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Shopping Cart</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Delete Cart</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Settings</a>
                </li>
            </ul>
            <hr>
            <div>
                <a href="../logout.php" class="btn btn-danger w-100">Logout</a>
            </div>
        </nav>

</body>
</html>