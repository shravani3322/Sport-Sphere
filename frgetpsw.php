<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .forgot-password-form {
            background-color: #fff;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .forgot-password-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .forgot-password-form button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .forgot-password-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="forgot-password-form">
    <h2>Forgot Password</h2>
    <form action="frgetpsw.php" method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>

<?php
// forgot_password.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email exists in the users table
    $sql = "SELECT * FROM signup WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a random token
        $token = bin2hex(random_bytes(50));

        // Save the token and email to the password_resets table
        $sql = "INSERT INTO password_resets (email, token) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();

        // Send reset password link via email
        $reset_link = "http://localhost/resetpsw.php?token=$token";
        if (mail($email, "Reset Password", "Click the following link to reset your password: $reset_link")) {
            echo "An email has been sent to reset your password.";
        } else {
            echo "Failed to send email. Please try again.";
        }
    } else {
        echo "No account found with that email.";
    }

    $conn->close();
}
?>
