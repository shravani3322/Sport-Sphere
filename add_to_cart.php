<?php
session_start();
include("dbconn.php");

// Fetch product details
$product_id = $_POST['product_id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE ID = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to the cart
$cart_item = [
    'product_name' => $product['name'],
    'price' => $product['price'],
    'quantity' => $_POST['quantity'],
    'total' => $product['price'] * $_POST['quantity']
];

// Add to session cart or update existing item
$_SESSION['cart'][] = $cart_item;

// Redirect to checkout page
header("Location: checkout.php");
exit;
?>
