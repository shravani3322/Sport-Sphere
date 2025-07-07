<?php
// Database connection
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $customer_name = $_POST['customer_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $order_items = $_POST['order_items']; // JSON format
        $total_price = $_POST['total_price'];

        // Insert data into the database
        $sql = "INSERT INTO ordernew (customer_name, email, phone, address, order_items, total_price) 
                VALUES (:customer_name, :email, :phone, :address, :order_items, :total_price)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':customer_name' => $customer_name,
            ':email'         => $email,
            ':phone'         => $phone,
            ':address'       => $address,
            ':order_items'   => $order_items,
            ':total_price'   => $total_price,
        ]);

        // Simulate payment success (or integrate with a real payment gateway)
        $order_id = $pdo->lastInsertId(); // Get the last inserted order ID

        // Redirect to success page
        header("Location: payment_success.php?order_id=$order_id");
        exit;
    } else {
        echo "Invalid request.";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
