<?php
include 'config.php';

// Fetch all records
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin - Manage Doctors</title>
</head>
<body>
    <?php include 'component/navbar.php'; ?> <!-- Include Navbar -->

    <div class="container">
        <h2 class="header">Manage Doctors</h2>
        <a href="index.php" class="btn">Preview Apps</a>
        <a href="doctors/create.php" class="btn">Add New Doctor</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['specialty'] . "</td>";
                        echo "<td><img src='" . $row['photo_url'] . "' alt='" . $row['name'] . "' width='50'></td>";
                        echo "<td>";
                        echo "<a href='doctors/update.php?id=" . $row['id'] . "' class='btn'>Edit</a>";
                        echo " | ";
                        echo "<a href='doctors/delete.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
