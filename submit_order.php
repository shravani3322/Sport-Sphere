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

    $sql = "INSERT INTO ordernew (customer_name, email, phone, address, order_items, total_price)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssd", $name, $email, $phone, $address, $order_items, $total_price);

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
        /* Global Styles */
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
    <!-- Include FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header>
   Visit Again
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

</body>
<center><b>
        <a href="http://localhost/TY%20projrct/finalpro/feedback.php">Send Feedback</a>
        <br>
        <br>
        <br>
        <br>
       
        <a href="http://localhost/TY%20projrct/finalpro/shopnow.php">Continue Shopping</a>
        <br>
        <br> <br>
        <br> <br>
        
    <marK>   <a href="http://localhost/TY%20projrct/finalpro/webp.php">Go Back</a>
        <br>
        <br></marK>