<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>User List</h1>
    </header>
    <div class="container">
        <?php
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit;
        }

        $conn = new mysqli('localhost', 'root', '', 'Lab_5b');
        if ($conn->connect_error) {
            die("<div class='message error'>Connection failed: " . $conn->connect_error . "</div>");
        }

        $sql = "SELECT id, matric, name, accessLevel FROM users";
        $result = $conn->query($sql);
        ?>
        <table>
            <thead>
                <tr>
                    <th>Matric</th>
                    <th>Name</th>
                    <th>Access Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['matric']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['accessLevel']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php $conn->close(); ?>
    </div>
</body>
</html>
