<?php
include '../config.php';

// Create Data --> POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo_url = $_POST['photo_url'];
    $news = $_POST['news'];

    $sql = "INSERT INTO news (photo_url, news) VALUES ('$photo_url', '$news')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-msg'>New record created successfully</div>";
        header("Location: ../adminnews.php");
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
    <title>Add News</title>
</head>
<body>
    <div class="form-container">
        <h2 class="header">Add News</h2>
        <form method="post" action="create.php">
            <div class="form-group">
                <label for="photo_url">Photo URL:</label>
                <input type="text" id="photo_url" name="photo_url" required>
            </div>
            <div class="form-group">
                <label for="news">News:</label>
                <textarea id="news" name="news" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Add news">
            </div>
        </form>
    </div>
</body>
</html>
