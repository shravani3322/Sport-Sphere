<?php
session_start();
include("dbconn.php");

if (!isset($_SESSION['customer_id'])) {
    header("Location: custlogin.php");
    exit;
}

$customer_id = $_SESSION['customer_id'];
$order_id = $_GET['order_id'];

// Fetch the order details
$sql = "SELECT * FROM customers WHERE id = ? AND customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $order_id, $customer_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    echo "Order not found.";
    exit;
}

// Fetch order items
$sql_items = "SELECT * FROM order_items WHERE order_id = ?";
$stmt_items = $conn->prepare($sql_items);
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$items = $stmt_items->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Order Details</h1>
    <p><strong>Order ID:</strong> <?php echo $order['id']; ?></p>
    <p><strong>Order Date:</strong> <?php echo $order['order_date']; ?></p>
    <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
    <p><strong>Total Price:</strong> Rs. <?php echo number_format($order['total_price'], 2); ?></p>

    <h2>Items</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = $items->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $item['product_name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>Rs. <?php echo number_format($item['price'], 2); ?></td>
                    <td>Rs. <?php echo number_format($item['quantity'] * $item['price'], 2); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
