<?php
// Include the database connection file
include("dbconn.php");

// Create the cart table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

$gym_id = "gym"; // Or from a form input
$sql = "SELECT * FROM products WHERE type = '$gym_id'";

$result = $conn->query($sql);

// Check if the connection is established and data is fetched
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Order</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
        }
        h1 {
            color: #B03A2E;
            margin-bottom: 20px;
        }
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .menu-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            padding: 15px;
            width: 250px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .item-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .price {
            color: #B03A2E;
            font-weight: bold;
            margin-top: 10px;
        }
        .add-to-cart-button {
            background-color: #B03A2E;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .remove-button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #f44336; /* Red background */
            color: white;
        }
        .remove-button:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <h1>Gym Order Here</h1>

    <div class="menu-container">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($product = $result->fetch_assoc()): ?>
                <div class="menu-item">
                    <img src="Admin/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="item-image">
                    <p><strong><?php echo htmlspecialchars($product['name']); ?></strong></p>
                    <p class="price">Price: Rs. <?php echo htmlspecialchars($product['price']); ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="productId" value="<?php echo $product['ID']; ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                        <button type="submit" class="add-to-cart-button">Add to Cart</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>

    <?php
    // Handle the POST request to add item to the cart
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate input
        if (isset($_POST['productId']) && isset($_POST['price'])) {
            $productId = intval($_POST['productId']);
            $price = floatval($_POST['price']);

            // Prepare and execute the insert statement
            $stmt = $conn->prepare("INSERT INTO cart (product_id, price) VALUES (?, ?)");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("id", $productId, $price);

            $response = [];
            if ($stmt->execute()) {
                echo "<script>
                        alert('Added to cart successfully!');
                        window.location.href = 'cartview.php';
                      </script>";
            } else {
                echo "<script>alert('Failed to add to cart.');</script>";
            }
            $stmt->close();}
            
    }

    // Close the database connection
    $conn->close();
    ?>
    <br>
 __________________________________________________________________________________________________________________________________________________________________
 <br>
 <br>
<section><center>
            <button class="remove-button" onclick="redirectToPage()" style="color: yellow; background-color:black">GO BACK</button>
        </section>
    </div>

    <script>
        function redirectToPage() {
            window.location.href = "http://localhost/TY%20projrct/finalpro/webp.php";
        }
    </script>
</body>
</html>
