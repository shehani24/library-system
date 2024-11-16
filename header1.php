<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar Navigation</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 0;
            padding-top: 80px; /* Adjust for header height */
        }
        .header {
            width: 100%;
            padding: 5px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .container {
            display: flex;
            align-items: center;
        }
        .container h1 {
            font-size: 26px;
            padding: 25px 10px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-family: "Poppins", sans-serif;
            border-left: 8px solid rgb(14, 102, 60);
        }
        .container h1 a {
            color: #545454;
            text-decoration: none;
        }

        .container img {
            width: 30%;
            min-width: 250px;
        }
        .navi ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .navi ul li {
            margin-left: 20px;
            padding: 30px 20px;
        }
        .navi ul li a {
            text-decoration: none;
            color: #545454;
            font-weight: bold;
            font-size: 20px;
        }
        .navi ul li a:hover {
            text-decoration: none;
            color: rgb(14, 102, 60);
            text-shadow: 2px 2px 5px rgb(14, 102, 60);
        }

        /* Sidebar toggle button for mobile view */
        .menu-toggle {
            display: none;
            font-size: 30px;
            cursor: pointer;
            color: #545454;
        }

        /* Media Queries */
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .container img {
                display: none;
            }

            /* Hide the default navigation on extra small screens */
            .navi ul {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 10px;
                background: #fff;
                width: 200px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            /* Show the menu when toggle is active */
            .navi ul.active {
                display: flex;
            }

            /* Show the menu toggle button on extra small screens */
            .menu-toggle {
                display: block;
            }

            .navi ul li {
                margin: 0;
                padding: 10px;
                text-align: center;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .navi ul li a {
                font-size: 18px;
            }
            .container h1 {
                font-size: 18px;
            }
            .navi ul li {
                
                padding: 5px;
                
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .container h1 {
                font-size: 20px;
            }
            .navi ul li a {
                font-size: 20px;
            }
            .navi ul li {
                
                padding: 10px;
                
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .container h1 {
                font-size: 20px;
            }
            .navi ul li a {
                font-size: 22px;
            }

            .navi ul li {
                
                padding: 15px;
                
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .container h1 {
                font-size: 20px;
                padding: 100px 100px 100px -500px;
            }
            .navi ul li a {
                font-size: 24px;
            }
            .navi ul li {
                
                padding: 20px 50px 20px 0px;
                
            }
        }
    </style>
    <script>
        // Toggle function for sidebar menu
        function toggleMenu() {
            var navMenu = document.querySelector('.navi ul');
            navMenu.classList.toggle('active');
        }
    </script>
</head>
<body>

<!-- Header Start -->
<header class="header">
    <div class="container">
        <a href="index.php"><img src="img/logo/ousl.png" alt="OUSL Logo"></a>
        <h1><a href="index.php">OUSL Book Store</a></h1>
    </div>

    <!-- Menu Toggle Button for Small Screens -->
    <span class="menu-toggle" onclick="toggleMenu()">&#9776;</span>

    <nav class="navi">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Book Store</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
</header>

<!-- Placeholder content to demonstrate scrolling -->
<div style="padding: 20px;">
    <p>Content here...</p>
</div>

</body>
</html>
