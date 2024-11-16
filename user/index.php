<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

<?php
include 'header.php';
?>


        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <nav id="header" class="navbar navbar-expand-lg navbar-dark px-4">
                <span class="navbar-brand mb-0 h1">User Dashboard</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Profile</a>
                        </li>
                    </ul>
                </div>
            </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bookstore</h1>

        <!-- Search Section -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by title, author, or genre">
            <button class="btn btn-primary" id="searchButton">Search</button>
        </div>

        <!-- Books List -->
        <div class="row" id="booksContainer">
            <!-- Books will be populated dynamically -->
        </div>

        <!-- Shopping Cart -->
        <div class="mt-5">
            <h3>Shopping Cart</h3>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="cartTableBody">
                    <!-- Cart items will be populated dynamically -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Grand Total:</strong></td>
                        <td id="grandTotal">$0.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <button class="btn btn-success" id="checkoutButton">Checkout</button>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="customer_panel.js"></script>
</body>
</html>
