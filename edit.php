<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit User</h1>
    </header>
    <div class="container">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'Lab_5b');
        if ($conn->connect_error) {
            die("<div class='message error'>Connection failed: " . $conn->connect_error . "</div>");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $accessLevel = $_POST['accessLevel'];

            $sql = "UPDATE users SET name='$name', accessLevel='$accessLevel' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='message success'>User updated successfully!</div>";
            } else {
                echo "<div class='message error'>Error: " . $conn->error . "</div>";
            }
        } else {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM users WHERE id=$id");
            $row = $result->fetch_assoc();
        }
        ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            <label for="accessLevel">Access Level</label>
            <select id="accessLevel" name="accessLevel" required>
                <option value="admin" <?php if ($row['accessLevel'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="user" <?php if ($row['accessLevel'] == 'user') echo 'selected'; ?>>User</option>
            </select>
            <button type="submit">Update</button>
        </form>
        <?php $conn->close(); ?>
    </div>
</body>
</html>
