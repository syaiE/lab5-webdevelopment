<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <div class="container">
        <?php
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matric = $_POST['matric'];
            $password = $_POST['password'];

            $conn = new mysqli('localhost', 'root', '', 'Lab_5b');
            if ($conn->connect_error) {
                die("<div class='message error'>Connection failed: " . $conn->connect_error . "</div>");
            }

            $sql = "SELECT * FROM users WHERE matric = '$matric'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user'] = $row['name'];
                    header("Location: display.php");
                } else {
                    echo "<div class='message error'>Invalid password.</div>";
                }
            } else {
                echo "<div class='message error'>User not found.</div>";
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <label for="matric">Matric</label>
            <input type="text" id="matric" name="matric" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
