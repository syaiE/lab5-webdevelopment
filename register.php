<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Register New User</h1>
    </header>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matric = $_POST['matric'];
            $name = $_POST['name'];
            $accessLevel = $_POST['accessLevel'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $conn = new mysqli('localhost', 'root', '', 'Lab_5b');
            if ($conn->connect_error) {
                die("<div class='message error'>Connection failed: " . $conn->connect_error . "</div>");
            }

            $sql = "INSERT INTO users (matric, name, accessLevel, password) VALUES ('$matric', '$name', '$accessLevel', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='message success'>Registration successful!</div>";
            } else {
                echo "<div class='message error'>Error: " . $conn->error . "</div>";
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <label for="matric">Matric</label>
            <input type="text" id="matric" name="matric" required>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="accessLevel">Access Level</label>
            <select id="accessLevel" name="accessLevel" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
