<?php
// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'test'; // Change to your database name
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $client_name = $conn->real_escape_string($_POST['client_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $rating = intval($_POST['rating']);
    $comments = $conn->real_escape_string($_POST['comments']);

    // Insert data into database
    $sql = "
        INSERT INTO designer_feedback (client_name, email, rating, comments)
        VALUES ('$client_name', '$email', $rating, '$comments')
    ";

    if ($conn->query($sql)) {
        $message = "Feedback submitted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
} else {
    // Clear the message when the form is not submitted
    $message = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .message.success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        /* Icons */
        .fa {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-comments"></i> Feedback Form</h1>

        <!-- Display message only after submission -->
        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <!-- Feedback Form -->
        <form method="POST">
            <label for="client_name"><i class="fas fa-user"></i> Your Name:</label>
            <input type="text" id="client_name" name="client_name" required>

            <label for="email"><i class="fas fa-envelope"></i> Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="rating"><i class="fas fa-star"></i> Rating (1-5):</label>
            <select id="rating" name="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>

            <label for="comments"><i class="fas fa-comment"></i> Additional Comments:</label>
            <textarea id="comments" name="comments" rows="5" cols="30"></textarea>

            <button type="submit"><i class="fas fa-paper-plane"></i> Submit Feedback</button>
        </form><br><br><center><b>
           <a href="http://localhost/TY%20projrct/finalpro/webp.php">Go Back</a>
        <br>
        <br></marK>
    </div>

</body>
</html>
