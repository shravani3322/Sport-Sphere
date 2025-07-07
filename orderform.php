<?php
// Include the database connection file
include("dbconn.php");

// Fetch cart data to prefill the order form
$sql = "SELECT cart.*, products.name, products.price 
        FROM cart 
        JOIN products ON cart.product_id = products.ID";
$result = $conn->query($sql);

$totalPrice = 0;
$orderItems = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $totalPrice += $row['price'];
        $orderItems[] = $row['name']; // Collect product names
    }
} else {
    echo "Error fetching cart items: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            margin-bottom: 20px;
            color: #4CAF50;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        textarea {
            resize: none;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        button:hover {
            background: #45A049;
        }

        /* Payment Section */
        

        .payment-options button:hover {
            background-color: #218838;
        }

        .payment-options .qr-code {
            display: none;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Place Your Order</h1>
        <form action="submit_order.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="customer_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="items">Order Items:</label>
            <textarea id="items" name="order_items" readonly><?php echo htmlspecialchars(implode(", ", $orderItems)); ?></textarea>

            <label for="price">Total Price:</label>
            <input type="text" id="price" name="total_price" value="<?php echo htmlspecialchars(number_format($totalPrice, 2)); ?>" readonly>

            
    </div>
     <!-- Payment Method Options -->
        <label for="payment_method">Select Payment Method:</label><br>
        <input type="radio" id="qr_code" name="payment_method" value="QR Code" required>
        <label for="qr_code">QR Code</label><br>
        <input type="radio" id="cod" name="payment_method" value="COD" required>
        <label for="cod">Cash on Delivery</label><br>

        <div class="payment-options">
            <div id="qr-code-section" class="qr-code">
                <!-- QR Code Image - Add actual QR code here -->
                <img src="http://localhost/TY%20projrct/finalpro/img/qr11.jpg" alt="QR Code" style="width: 200px; height: 200px;">
                <p>Scan this QR Code to make the payment.</p>
            </div>
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
               <button type="submit">Submit Order</button>
        </form>
</body>
</html>
