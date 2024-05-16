<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = md5($password);
        
        // Prepare a statement
        $stmt = $con->prepare("INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, 0)");
        
        // Bind parameters
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        
        // Execute the statement
        $result = $stmt->execute();
        
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Registration failed.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>try again</a>.</p>
                  </div>";
        }
        
        // Close the statement
        $stmt->close();
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input autocomplete="off" type="text" class="login-input" name="username" placeholder="Username" required />
        <input autocomplete="off" type="email" class="login-input" name="email" placeholder="Email Address" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>