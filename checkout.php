<?php
// Include database connection
include("dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $order_items = $_POST['order_items'];
    $total_price = $_POST['total_price'];
    $payment_method = $_POST['payment_method']; // Get selected payment method

    $sql = "INSERT INTO ordernew (customer_name, email, phone, address, order_items, total_price, payment_method)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $phone, $address, $order_items, $total_price, $payment_method);

    if ($stmt->execute()) {
        $message = "Order placed successfully!";
        $message_type = "success";  // Message type for success
        // Clear the cart after placing the order
        $conn->query("DELETE FROM cart");
    } else {
        $message = "Error: " . $stmt->error;
        $message_type = "error";  // Message type for error
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Your Order</title>
    <style>
        /* Add your styles here */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            color: #333;
        }

        header {
            background: #4caf50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2em;
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Message Box */
        .message-box {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 1.2em;
        }

        .message-box.success {
            background-color: #d4edda;
            color: #155724;
            border: 2px solid #28a745;
        }

        .message-box.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 2px solid #dc3545;
        }

        .message-box i {
            font-size: 2em;
            margin-right: 10px;
        }

        /* Payment Section */
        .payment-options {
            margin-top: 20px;
            text-align: center;
        }

        .payment-options button {
            padding: 10px 20px;
            margin: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            font-size: 1.2em;
            cursor: pointer;
        }

        .payment-options button:hover {
            background-color: #218838;
        }

        .payment-options .qr-code {
            display: none;
        }

        /* Footer */
        footer {
            background: #4caf50;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9em;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header>
    Place Your Order
</header>

<?php if (isset($message)): ?>
    <div class="message-box <?php echo $message_type; ?>">
        <?php if ($message_type == 'success'): ?>
            <i class="fas fa-check-circle"></i> <!-- Success Icon -->
        <?php else: ?>
            <i class="fas fa-times-circle"></i> <!-- Error Icon -->
        <?php endif; ?>
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<!-- Your Form Here -->
<div class="form-container">
    <h2>Order Details</h2>
    <form method="POST" action="">
        <label for="customer_name">Name:</label>
        <input type="text" id="customer_name" name="customer_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>

        <label for="order_items">Order Items:</label>
        <textarea id="order_items" name="order_items" required></textarea>

        <label for="total_price">Total Price (Rs):</label>
        <input type="number" id="total_price" name="total_price" required>

        <!-- Payment Method Options -->
        <label for="payment_method">Select Payment Method:</label><br>
        <input type="radio" id="qr_code" name="payment_method" value="QR Code" required>
        <label for="qr_code">QR Code</label><br>
        <input type="radio" id="cod" name="payment_method" value="COD" required>
        <label for="cod">Cash on Delivery</label><br>

        <div class="payment-options">
            <div id="qr-code-section" class="qr-code">
                <!-- QR Code Image - Add actual QR code here -->
                <img src="your-qrcode-image.jpg" alt="QR Code" style="width: 200px; height: 200px;">
                <p>Scan this QR Code to make the payment.</p>
            </div>
            <button type="submit">Place Order</button>
        </div>
    </form>
</div>

<footer>
    &copy; 2024 Your Company. All Rights Reserved.
</footer>

<script>
    // Show QR Code when QR payment is selected
    document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (document.getElementById('qr_code').checked) {
                document.getElementById('qr-code-section').style.display = 'block';
            } else {
                document.getElementById('qr-code-section').style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
