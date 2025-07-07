<?php
// cart.php
include("dbconn.php");
session_start();
$conn = new mysqli('localhost', 'root', '', 'test');

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all items from the cart
$result = $conn->query("SELECT * FROM cart");

if ($result->num_rows > 0) {
    echo "<h1>Your Cart</h1>";

    // Display the cart items
    $total_price = 0;
    while ($row = $result->fetch_assoc()) {
        echo "<div class='menu-item'>";
        echo "<img src='Admin/uploads/{$row['image']}' alt='{$row['product_name']}' class='item-image'>";
        echo "<p><strong>{$row['product_name']}</strong></p>";
        echo "<p class='price'>Price: Rs. {$row['price']}</p>";
        echo "<p>Quantity: {$row['quantity']}</p>";
        echo "</div><hr>";

        // Calculate total price
        $total_price += $row['price'] * $row['quantity'];
    }

    // Display total price and checkout button
    echo "<p><strong>Total Price: Rs. $total_price</strong></p>";
    echo "<form method='POST' action='cart.php'>
            <input type='submit' name='checkout' value='Checkout'>
          </form>";
} else {
    echo "<p>Your cart is empty.</p>";
}

// Handle checkout process
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    // Fetch cart items again for saving in orders
    $result = $conn->query("SELECT * FROM cart");

    if ($result->num_rows > 0) {
        $conn->begin_transaction(); // Start a transaction
        try {
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $quantity = $row['quantity'];
                $price = $row['price'];
                $total = $quantity * $price;

                // Save the order details into the orders table
                $stmt = $conn->prepare("INSERT INTO orders (product_id, product_name, quantity, price, total) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("isidd", $product_id, $product_name, $quantity, $price, $total);
                $stmt->execute();

                // Update stock in the products table
                $stock_stmt = $conn->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
                $stock_stmt->bind_param("ii", $quantity, $product_id);
                $stock_stmt->execute();
            }

            // Clear the cart
            $conn->query("DELETE FROM cart");

            // Commit the transaction
            $conn->commit();

            echo "<p>Order placed successfully!</p>";
            echo "<p><a href='checkout.php'>Proceed to Payment</a></p>";
        } catch (Exception $e) {
            // Rollback the transaction on error
            $conn->rollback();
            echo "<p>Failed to place the order: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>Your cart is empty. Unable to checkout.</p>";
    }
}

$conn->close();
?>
