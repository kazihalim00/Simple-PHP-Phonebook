<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contacts WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=deleted");
    } else {
        echo "Can't delete this contact: " . mysqli_error($conn);
    }

}


?>