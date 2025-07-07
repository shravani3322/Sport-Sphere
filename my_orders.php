<?php
// Database connection settings
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'test'; // Use your actual database name

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you're fetching the customer's name from a session or logged-in user
$customerName = "shravani"; // Replace this with the session variable or actual logged-in user

// Initialize orderHistory to an empty array to avoid undefined variable errors
$orderHistory = [];

// Fetch orders for the logged-in customer (excluding the 'status' column)
$sqlOrders = "SELECT order_id, customer_name, email, phone, address, total_price, order_date 
              FROM ordernew 
              WHERE customer_name = ? 
              ORDER BY order_date DESC";
$stmtOrders = $conn->prepare($sqlOrders);
$stmtOrders->bind_param("s", $customerName);
$stmtOrders->execute();
$resultOrders = $stmtOrders->get_result();

if ($resultOrders->num_rows > 0) {
    // If we have orders, loop through and fetch data
    while ($order = $resultOrders->fetch_assoc()) {
        // Add the order to the orderHistory array (without the status column)
        $orderHistory[] = $order;
    }
} else {
    // If no orders found, set orderHistory to an empty array
    $orderHistory = [];
}

// Close the database connections
$stmtOrders->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #eef2f3;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffc107;
        }

        .container {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="my_orders.php">My Orders</a></li>
                <li><a href="support.php">Support</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>My Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($orderHistory)): ?>
                    <tr><td colspan="3">No orders found</td></tr>
                <?php else: ?>
                    <?php foreach ($orderHistory as $order): ?>
                        <tr>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                            <td><?php echo $order['total_price']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>Privacy Policy | Terms of Service | Customer Support</p>
    </footer>
</body>
</html>
