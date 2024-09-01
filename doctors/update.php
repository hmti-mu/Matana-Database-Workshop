<?php
include '../config.php';

// update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $photo_url = $_POST['photo_url'];

    $sql = "UPDATE doctors SET name='$name', specialty='$specialty', photo_url='$photo_url' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../admin.php");
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
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Specialty: <input type="text" name="specialty" value="<?php echo $row['specialty']; ?>"><br>
        Photo URL: <input type="text" name="photo_url" value="<?php echo $row['photo_url']; ?>"><br>
        <input type="submit" value="Update Doctor">
    </form>

    <?php
}
?>
