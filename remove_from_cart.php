<?php
// Include the database connection file
include("dbconn.php");

// Check if product_id is set
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']); // Sanitize input

    // Remove the product from the cart
    $sql = "DELETE FROM cart WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        // Redirect back to the cart page
        header("Location: cartview.php"); // Replace 'cart.php' with your actual cart page filename
        exit();
    } else {
        echo "Error removing item: " . $stmt->error; // Debugging line
    }
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
