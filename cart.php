<?php
session_start();
include("dbconn.php");

// Get user_id from session (ensure user is logged in)
$user_id = $_SESSION['user_id']; // Assuming user_id is set in the session after login

// Fetch items from the cart for this user
$sql = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);  // Bind the user_id to the query
$stmt->execute();
$result = $stmt->get_result();

// Check if cart is empty
if ($result->num_rows > 0) {
    echo "<h1>Your Cart</h1>";
    $total_price = 0;
    
    while ($row = $result->fetch_assoc()) {
        echo "<div class='menu-item'>";
        echo "<p><strong>Product Name:</strong> {$row['product_name']}</p>";
        echo "<p><strong>Price:</strong> Rs. {$row['price']}</p>";
        echo "<p><strong>Quantity:</strong> {$row['quantity']}</p>";
        echo "</div>";
        
        // Calculate total price
        $total_price += $row['price'] * $row['quantity'];
    }
    
    echo "<p><strong>Total Price: Rs. $total_price</strong></p>";
    echo "<form method='POST' action='payment.php'>
            <input type='submit' value='Proceed to Payment'>
          </form>";
} else {
    echo "<p>Your cart is empty.</p>";
}

$conn->close();
?>
