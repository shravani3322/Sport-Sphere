
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Styling the main container */
        .container {
            text-align: center;
            margin-top: 50px;
        }

        /* Styling the box around the form and video */
        .box {
            display: inline-block;
            padding: 20px;
            border: 2px solid #333; /* Border thickness and color */
            border-radius: 10px; /* Rounded corners */
            background-color: #f9f9f9; /* Light background color */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for 3D effect */
            width: 320px; /* Set a fixed width */
        }

        /* Styling the form inputs */
        input[type="text"], input[type="password"] {
            width: 90%; /* Full width inputs */
            padding: 10px;
            margin: 8px 0;
            display: block;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Styling the submit button */
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50; /* Button color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker shade on hover */
        }

        /* Styling the error message */
        .error {
            color: red;
        }

        /* Add margin to the top of the form */
        .login-form {
            margin-top: 20px;
        }

    </style>
</head>
<body>

<div class="container">
    <!-- Add a border and box around the form and video -->
    <div class="box">
        <!-- Add the MP4 video (looping and muted) -->
        <video width="100%" autoplay loop muted>
            <source src="http://localhost/TY%20projrct/finalpro/img/gif3.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Display the login form -->
        <div class="login-form">
            <h2>Login</h2>

            <!-- Display error message if login fails -->
            <?php if (!empty($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="login1.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password:</label>
                <input type="password" name="pass" id="pass" required>

                <input type="submit" value="Login">
                 <center>
      <br>
      <a href="http://localhost/TY%20projrct/finalpro/frgetpsw.php">Forgot Password !</a>
      <br>
      <br>

 *****************************************
      <br>
      <br>
    <span class="psw">Dont Have <a href="http://localhost/TY%20projrct/finalpro/signup.php">an Account?</a></span></center>
            </form>
        </div>
    </div>
</div>

</body>
</html>


<?php

 include_once('dbconn.php'); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM signup WHERE username='$username' AND pass='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<script>alert("Login successful!"); window.location.href = "webp.php";</script>';
    exit();
  } else {
    echo '<script>alert("Something wrong! Please Check your username and password.");</script>';
  }
}
$conn->close();

?>