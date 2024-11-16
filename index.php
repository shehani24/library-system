<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Store</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .hero-section {
            background-image: url('img/bg/bg1.jpg'); /* Placeholder image */
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 200px 0;
            margin-top: 40px;
        }

        .hero-section h1 {
            font-size: 3rem;
        }
 
        .featured-books .book-card {
            margin-bottom: 30px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header Section (Navigation Bar) -->
    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to Our Online Bookstore</h1>
            <p>Find your next great read from our collection of books</p>
            <a href="#featured-books" class="btn btn-light btn-lg">Browse Books</a>
        </div>
    </div>

    <!-- Featured Books Section -->
    <div id="featured-books" class="container my-5">
        <h2 class="text-center mb-5">Featured Books</h2>
        <div class="row">
            <!-- Book Card 1 -->
            <div class="col-md-4">
                <div class="card book-card">
                    <img src="img/novels/1.jfif" class="card-img-top" alt="Book 1">
                    <div class="card-body">
                        <h5 class="card-title">Legendary</h5>
                        <p class="card-text">Caraval has always demanded bravery, cunning, 
                            and sacrifice, but now the game is asking for more. If Tella can't 
                            fulfill her bargain and deliver Legend's name, she'll lose everything she 
                            cares about—maybe even her life. But if she wins, Legend and Caraval will be 
                            destroyed forever...</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Book Card 2 -->
            <div class="col-md-4">
                <div class="card book-card">
                    <img src="img/novels/2.jfif" class="card-img-top" alt="Book 2">
                    <div class="card-body">
                        <h5 class="card-title">The Hidden People</h5>
                        <p class="card-text">The Hidden People is a historical fantasy and horror novel 
                            by English writer Alison Littlewood, first published in October 2016 in the 
                            United Kingdom by Jo Fletcher Books.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Book Card 3 -->
            <div class="col-md-4">
                <div class="card book-card">
                    <img src="img/novels/3.jfif" class="card-img-top" alt="Book 3">
                    <div class="card-body">
                        <h5 class="card-title">The House At The End Of The Moor</h5>
                        <p class="card-text">Opera star Maggie Lee escapes her opulent lifestyle when 
                            threatened by a powerful politician who aims to ruin her life. She runs off to 
                            the wilds of the moors to live in anonymity. All that changes the day she 
                            discovers a half-dead man near her house.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2024 Books Store. All Rights Reserved.</p>
        <div>
            <a href="#">Privacy Policy</a> | 
            <a href="#">Terms & Conditions</a> |
            <a href="#">Contact Us</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
