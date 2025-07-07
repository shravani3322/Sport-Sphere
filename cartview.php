<?php
// Include the database connection file
include("dbconn.php");

// Fetch cart data by joining with products table
$sql = "SELECT cart.*, products.name, products.price, products.image 
        FROM cart 
        JOIN products ON cart.product_id = products.ID";
$result = $conn->query($sql);

// Initialize total quantity and total price
$totalQty = 0;
$totalPrice = 0.0;

// Check if the query was successful
if ($result) {
    // Count total quantity
    $totalQty = $result->num_rows;

    // Loop to calculate total price and prepare product data
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $totalPrice += $row['price'];
        $products[] = $row; // Store each product in an array
    }
} else {
    echo "Error fetching cart items: " . $conn->error; // Debugging line
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Order</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
            padding-bottom: 60px; /* Space for fixed footer */
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

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            border-top: 1px solid #ddd;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }
        .nav-item {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <h1>Your Cart</h1>

    <div class="menu-container">
        <?php if ($totalQty > 0): ?>
            <?php foreach ($products as $row): ?>
                <div class="menu-item">
                    <img src="Admin/uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="item-image">
                    <p><strong><?php echo htmlspecialchars($row['name']); ?></strong></p>
                    <p class="price">Price: Rs. <?php echo htmlspecialchars($row['price']); ?></p>
                    <form method="post" action="remove_from_cart.php">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['product_id']); ?>">
                        <button type="submit" class="remove-button">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No items in the cart.</p>
        <?php endif; ?>
    </div>

    <div class="bottom-nav">
        <div class="nav-item">Total Quantity: <?php echo $totalQty; ?></div>
        <div class="nav-item">Total Price: Rs. <?php echo number_format($totalPrice, 2); ?></div>
        <section><center>
            <button class="remove-button" onclick="redirectToPagePayment()" style="color: yellow; background-color:brown;">Place order</button>
        </section>
    </div>

    <script>
        function redirectToPagePayment() {
            window.location.href = "http://localhost/TY%20projrct/finalpro/orderform.php";
        }
    </script>
    _____________________________________________________________________________________________________________________________________________________________<br>
<br>
<section><center>
            <button class="remove-button" onclick="redirectToPage()" style="color: yellow; background-color:brown;">Continue <br>Shopping</button>
        </section>
    </div>

    <script>
        function redirectToPage() {
            window.location.href = "http://localhost/TY%20projrct/finalpro/shopnow.php";
        }
    </script>
    <?php
    // Close the database connection
    $conn->close();
    ?>
</center>
</section>

</body>
</html>
