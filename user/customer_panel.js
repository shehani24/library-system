$(document).ready(function () {
    const cart = [];

    // Load books dynamically
    function loadBooks(query = '') {
        $.ajax({
            url: 'fetch_books.php',
            type: 'GET',
            data: { search: query },
            success: function (response) {
                $('#booksContainer').html(response);
            },
            error: function () {
                $('#booksContainer').html('<p class="text-danger">Failed to load books. Please try again.</p>');
            }
        });
    }

    // Initial load of books
    loadBooks();

    // Live Search: Trigger search on input
    $('#searchInput').on('input', function () {
        const query = $(this).val().trim();
        loadBooks(query); // Fetch and display filtered books
    });

    // Add book to cart
    $(document).on('click', '.add-to-cart', function () {
        const book = {
            id: $(this).data('id'),
            title: $(this).data('title'),
            price: parseFloat($(this).data('price')),
        };

        const existingItem = cart.find(item => item.id === book.id);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ ...book, quantity: 1 });
        }

        updateCart();
    });

    // Update cart display
    function updateCart() {
        let rows = '';
        let grandTotal = 0;

        cart.forEach((item, index) => {
            const total = item.price * item.quantity;
            grandTotal += total;

            rows += `
                <tr>
                    <td>${item.title}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>${item.quantity}</td>
                    <td>$${total.toFixed(2)}</td>
                    <td>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-index="${index}">Remove</button>
                    </td>
                </tr>`;
        });

        $('#cartTableBody').html(rows);
        $('#grandTotal').text(`$${grandTotal.toFixed(2)}`);
    }

    // Remove book from cart
    $(document).on('click', '.remove-from-cart', function () {
        const index = $(this).data('index');
        cart.splice(index, 1);
        updateCart();
    });

    // Checkout process
    $('#checkoutButton').click(function () {
        if (cart.length === 0) {
            alert('Your cart is empty!');
            return;
        }

        $.ajax({
            url: 'process_order.php',
            type: 'POST',
            data: { cart: JSON.stringify(cart) },
            success: function (response) {
                alert(response);
                cart.length = 0; // Clear the cart after successful checkout
                updateCart();
            },
            error: function () {
                alert('Checkout failed. Please try again.');
            }
        });
    });
});
