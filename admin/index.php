<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

<?php
include 'header.php';
?>


            <!-- Main Dashboard Content -->
            <div class="container mt-4">
                <h2 class="text-center mb-4">Manage Books</h2>

                <!-- Alert Container -->
                <div id="alertContainer"></div>

                <!-- Add Book Button -->
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBookModal">Add Book</button>

                <!-- Books Table -->
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bookTableBody">
                        <!-- Dynamic rows populated via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addBookForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" id="author" name="author" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" id="genre" name="genre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="publication_year" class="form-label">Year</label>
                            <input type="number" id="publication_year" name="publication_year" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Book</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Update Book Modal -->
    <div class="modal fade" id="updateBookModal" tabindex="-1" aria-labelledby="updateBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="updateBookForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateBookModalLabel">Update Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="updateBookId">
                        <div class="mb-3">
                            <label for="updateTitle" class="form-label">Title</label>
                            <input type="text" id="updateTitle" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateAuthor" class="form-label">Author</label>
                            <input type="text" id="updateAuthor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateGenre" class="form-label">Genre</label>
                            <input type="text" id="updateGenre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="updatePublicationYear" class="form-label">Year</label>
                            <input type="number" id="updatePublicationYear" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="updatePrice" class="form-label">Price</label>
                            <input type="number" id="updatePrice" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Book</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this book?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmDeleteButton" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin_dashboard.js"></script>



    <script>
$(document).ready(function () {
    loadBooks();

    // Function to display Bootstrap alerts
    function showAlert(message, type) {
        const alertHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
        $('#alertContainer').html(alertHTML);
        setTimeout(() => {
            $('.alert').alert('close');
        }, 3000); // Auto-close alert after 3 seconds
    }

    // Load books into table
    function loadBooks() {
        $.ajax({
            url: 'fetch_books.php',
            type: 'GET',
            success: function (response) {
                $('#bookTableBody').html(response);
            }
        });
    }

    // Add Book
    $('#addBookForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'add_book.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                showAlert(response, 'success');
                $('#addBookModal').modal('hide');
                loadBooks();
            },
            error: function () {
                showAlert('An error occurred while adding the book.', 'danger');
            }
        });
    });

    // Edit Book
    $(document).on('click', '.edit-btn', function () {
        $('#updateBookId').val($(this).data('id'));
        $('#updateTitle').val($(this).data('title'));
        $('#updateAuthor').val($(this).data('author'));
        $('#updateGenre').val($(this).data('genre'));
        $('#updatePublicationYear').val($(this).data('year'));
        $('#updatePrice').val($(this).data('price'));
        $('#updateBookModal').modal('show');
    });

    // Update Book
    $('#updateBookForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'update_book.php',
            type: 'POST',
            data: {
                id: $('#updateBookId').val(),
                title: $('#updateTitle').val(),
                author: $('#updateAuthor').val(),
                genre: $('#updateGenre').val(),
                publication_year: $('#updatePublicationYear').val(),
                price: $('#updatePrice').val(),
            },
            success: function (response) {
                showAlert(response, 'success');
                $('#updateBookModal').modal('hide');
                loadBooks();
            },
            error: function () {
                showAlert('An error occurred while updating the book.', 'danger');
            }
        });
    });

    // Delete Book
    $(document).on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this book?')) {
            $.ajax({
                url: 'delete_book.php',
                type: 'POST',
                data: { id: id },
                success: function (response) {
                    showAlert(response, 'success');
                    loadBooks();
                },
                error: function () {
                    showAlert('An error occurred while deleting the book.', 'danger');
                }
            });
        }
    });
});


    </script>
</body>
</html>
