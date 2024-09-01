<?php
include 'config.php';

// Fetch all news records
$sql = "SELECT * FROM news";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin - Manage News</title>
</head>
<body>
    <?php include 'component/navbar.php'; ?> <!-- Include Navbar -->

    <div class="container">
        <h2 class="header">Manage News</h2>
        <a href="index.php" class="btn">Preview Apps</a>
        <a href="news/create.php" class="btn">Add New News</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>News</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . substr($row['news'], 0, 50) . "...</td>"; // Shorten content display
                        echo "<td><img src='" . $row['photo_url'] . "' width='50'></td>";
                        echo "<td>";
                        echo "<a href='news/update.php?id=" . $row['id'] . "' class='btn'>Edit</a>";
                        echo " | ";
                        echo "<a href='news/delete.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this news?\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No news found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
