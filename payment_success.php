<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #f0f8ff, #e6e6fa);
            color: #333;
        }

        /* Header Styles */
        header {
            background: #4caf50;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 1.8em;
            font-weight: bold;
            text-transform: uppercase;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styles */
        footer {
            background: #4caf50;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9em;
        }

        /* Content Styles */
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            color: #4caf50;
            font-size: 1.8em;
        }

        .container p {
            font-size: 1.2em;
            margin: 10px 0;
            line-height: 1.6;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            text-align: center;
            transition: background 0.3s ease;
        }

        .back-btn:hover {
            background: #45a049;
        }

        .back-btn:active {
            background: #39843c;
        }
    </style>
</head>
<body>
    <header>
        Payment Successful
    </header>

    <div class="container">
        <?php
        // Database connection
        $host = 'localhost';
        $db = 'test';
        $user = 'root';
        $pass = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Validate and retrieve order_id
            $orders_id = filter_input(INPUT_GET, 'orders_id', FILTER_VALIDATE_INT);
            if (!$orders_id) {
                echo "<p style='color: red;'>Invalid Order ID.</p>";
                exit;
            }

            // Fetch order details
            $sql = "SELECT * FROM ordernew WHERE orders_id = :orders_id"; // Replace order_id with your actual column name if different
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':orders_id' => $order_id]);
            $order = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($order) {
                echo "<h1>Payment Details</h1>";
                echo "<p><strong>Order ID:</strong> " . htmlspecialchars($order['order_id']) . "</p>";
                echo "<p><strong>Total Paid:</strong> $" . htmlspecialchars($order['total_price']) . "</p>";
            } else {
                echo "<p style='color: red;'>Order not found for Order ID: " . htmlspecialchars($order_id) . ".</p>";
            }
        } catch (PDOException $e) {
            die("<p style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>");
        }
        ?>
        <a href="index.php" class="back-btn">Go Back</a>
    </div>

    <footer>
        &copy; 2024 Payment Portal Inc. All Rights Reserved.
    </footer>
</body>
</html>
