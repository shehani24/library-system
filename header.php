<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar Navigation</title>
    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 0;
            padding-top: 80px;  
        }
        .header {
            width: 100%;
            padding: 15px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .brand-logo {
            display: flex;
            /* align-items: center; */
            /* gap: 10px; */
        }
        .brand-logo img {
            width: 260px;
            min-width: 50px;
        }
        .navbar-nav .nav-link {
            font-weight: bold;
            color: #545454;
            font-size: 18px;
        }
        .navbar-nav .nav-link:hover {
            color: rgb(14, 102, 60);
            text-shadow: 2px 2px 5px rgb(14, 102, 60);
        }
        .center-title {
            position: absolute;
            left: 50%;
            transform: translateX(-65%);
            font-weight: bold;
            font-size: 24px;
            color: #545454;
            border-left: 8px solid rgb(14, 102, 60);
            letter-spacing: 1px;
            padding: 20px 10px;
            line-height: 1;
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .center-title {
            position: absolute;
            left: 50%;
            transform: translateX(-140%);
            font-weight: bold;
            font-size: 24px;
            color: #545454;
            border-left: 8px solid rgb(14, 102, 60);
            letter-spacing: 1px;
            padding: 20px 10px;
            line-height: 1;
        }
        }


        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
        .center-title {
            position: absolute;
            left: 50%;
            transform: translateX(-80%);
            font-weight: bold;
            font-size: 24px;
            color: #545454;
            border-left: 8px solid rgb(14, 102, 60);
            letter-spacing: 1px;
            padding: 20px 10px;
            line-height: 1;
        }
        } 

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 650px) {
            .center-title {
                left: 55%;
            }
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .center-title {
                display:none;
            }
        }
 
    </style>
</head>
<body>

<!-- Header Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-white header">
    <div class="container-fluid">
        <!-- Logo aligned to the left -->
        <a class="navbar-brand brand-logo" href="index.php">
            <img src="img/logo/ousl.png" alt="OUSL Logo" class="me-2">

            <span class="center-title">OUSL Book Store</span>
        </a>
        
        <!-- Centered Title -->
        
        
        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>



<!-- Bootstrap JS and dependencies -->
<script src="vendor/js/bootstrap.bundle.min.js"></script>
</body>
</html>
