<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contacts WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $phone = $row['phone'];
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $sql = "UPDATE contacts SET name = '$name' , phone = '$phone' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact Info</title>
</head>

<body>
    <h2>Update Contact</h2>

    <form method="post">
        Name <input type="text" name="name" value="<?php echo $name; ?>">
        <br>
        <br>
        Phone <input type="text" name="phone" value="<?php echo $phone; ?>">
        <br>
        <br>
        <button type="submit" name="update">Update Data

        </button>
    </form>
</body>

</html>