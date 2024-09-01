<?php
include '../config.php';

// update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo_url = $_POST['photo_url'];
    $news = $_POST['news'];

    $sql = "UPDATE news SET photo_url='$photo_url', news='$news' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../adminnews.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM doctors WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Photo URL: <input type="text" name="photo_url" value="<?php echo $row['photo_url']; ?>"><br>
        News: <textarea name="news" value="<?php echo $row['news']; ?>"><br>
        <input type="submit" value="Update Doctor">
    </form>

    <?php
}
?>
