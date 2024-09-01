<?php
include '../config.php';

// Create Data --> POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $photo_url = $_POST['photo_url'];

    $sql = "INSERT INTO doctors (name, specialty, photo_url) VALUES ('$name', '$specialty', '$photo_url')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-msg'>New record created successfully</div>";
        header("Location: ../admin.php");
        exit();
    } else {
        echo "<div class='error-msg'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add New Doctor</title>
</head>
<body>
    <div class="form-container">
        <h2 class="header">Add New Doctor</h2>
        <form method="post" action="create.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="specialty">Specialty:</label>
                <input type="text" id="specialty" name="specialty" required>
            </div>
            <div class="form-group">
                <label for="photo_url">Photo URL:</label>
                <input type="text" id="photo_url" name="photo_url" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Doctor">
            </div>
        </form>
    </div>
</body>
</html>
